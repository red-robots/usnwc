//Global Variables for Peoplematter
var sNoJobs = "Sorry, no job openings match the criteria in which you entered.";
var sAlias = 'usnwc';
var aAlias = ['usnwc'];
var bUseCategoryAPI = true;
var bShowLocationsWithNoJobs = false;
var sCategoryFilter = ['seasonal'];
var sPeoplematterAPIURL = "https://api.peoplematter.com";

//Gets Query String Varialbes in Javascript
//Example: $.QueryString["unitid"] or $.QueryString.unitid
(function($) {
    $.QueryString = (function(a) {
        if (a == "") return {};
        var b = {};
        for (var i = 0; i < a.length; ++i)
        {
            var p=a[i].split('=');
            if (p.length != 2) continue;
            b[p[0]] = decodeURIComponent(p[1].replace(/\+/g, " "));
        }
        return b;
    })(window.location.search.substr(1).split('&'))
})(jQuery);


//Global Variables for Page Load
var aCategories = [], aBusinessUnitsAjax = [], aBusinessUnits = [], aJobOpenings = [];
var iJobOpeningsAjaxCount = 0, sPreviousTab = "", sTab = ""; bUseGeoLocation = false, oGeoPosition = {};

/*
// Logic for getting data based off of Geolocation
*/
function getGeoPositionAJAX(){
    $.ajax({
        url: 'http://freegeoip.net/json/',
        type: "GET",
        dataType: "jsonp",
        success: function(data) {
          bUseGeoLocation = true;

          oGeoPosition.latitude = data.latitude;
          oGeoPosition.longitude = data.longitude;

          jQuery(document).ready(function(){
            jQuery('.tab6link').show();
          });
        },
        error: function(jqXHR, textStatus, errorThrown){
          jQuery(document).ready(function(){
            jQuery('.tab6link').hide();
          });

          console.error(errorThrown);
        }
    });
}

function getHTML5GeoPosition(position){
  bUseGeoLocation = true;

  oGeoPosition.latitude = position.coords.latitude;
  oGeoPosition.longitude = position.coords.longitude;

  jQuery(document).ready(function(){
    jQuery('.tab6link').show();
  });

  runControllers();
}

function showHTML5GeoError(error){
  bUseGeoLocation = false;

  jQuery(document).ready(function(){
    jQuery('.tab6link').hide();
  });

  runControllers();

  switch(error.code) {
    case error.PERMISSION_DENIED:
        console.error("User denied the request for Geolocation.")
        break;
    case error.POSITION_UNAVAILABLE:
        console.error("Location information is unavailable.")
        break;
    case error.TIMEOUT:
        console.error("The request to get user location timed out.")
        break;
    case error.UNKNOWN_ERROR:
        console.error("An unknown error occurred.")
        break;
  }
}

/*
// Data Models
*/

//Builds a unique list of Categories
function getJobCategories(sAlias){
  return jQuery.ajax({
    url: sPeoplematterAPIURL + '/api/JobCategory',
    data: 'BusinessAlias=' + sAlias,
    type: 'GET',
    async: true,
    dataType: 'jsonp',
    beforeSend: function(jqXHR){
      //aCategories = [];
    },
    success: function(oData){
      if(!jQuery.isEmptyObject(oData.JobCategories)){
        var aCategoriesTemp = [];
        var bCategoryExists = false;
        //Filter out categories with Category Code "Corporate:"
        for(var oCategory in oData.JobCategories){
          if(typeof sCategoryFilter !== "undefined"){
            if(sCategoryFilter !== ''){

                var temp_category = oData.JobCategories[oCategory].Code.trim().toLowerCase();

                if (sCategoryFilter.indexOf(temp_category) >= 0) {
                    console.log('adding', temp_category)
                    aCategoriesTemp.push(oData.JobCategories[oCategory]);
                }

            }else{
              aCategoriesTemp.push(oData.JobCategories[oCategory]);
            }
          }else{
            aCategoriesTemp.push(oData.JobCategories[oCategory]);
          }
        }

        //Build a Unique array of Categories
        for(var oCategoryIndex in aCategoriesTemp){
          bCategoryExists = false;

          for(var oCategory in aCategories){
            if(aCategoriesTemp[oCategoryIndex].Name == aCategories[oCategory].Name){
              bCategoryExists = true;
              break;
            }
          }

          if(!bCategoryExists){
            aCategories.push(aCategoriesTemp[oCategoryIndex]);
          }
        }

        //Sort Categories by Category Name
        sortByKey(aCategories, "Name", "")
      }
    }
  });
}

//Gets All Business Units for an Alias
function getBusinessUnits(sAlias){
  return jQuery.ajax({
    url: sPeoplematterAPIURL + '/api/applicationbusinessunit/',
    data: 'alias=' + sAlias,
    type: 'GET',
    async: true,
    dataType: 'jsonp',
    beforeSend: function(){
      //aBusinessUnitsAjax = [];
    },
    success: function(oData){
      for (var i = oData.length - 1; i >= 0; i--) {
        aBusinessUnitsAjax.push(oData[i]);
      }
    }
  });
}

//Gets all related business unit information for a list of Job Openings
//Also builds a unique list of locations (city and state combinations)
function fixBusinessUnitsData(aJobOpenings){
  if(!jQuery.isEmptyObject(aJobOpenings)){
      aBusinessUnits = [];

      for(var oJobOpening in aJobOpenings){
        var bLocationFound = false;
        var bBusinessUnitFound = false;
        var sSavedoBusinessUnitIndex = '';

        var oAddress = {};
        oAddress.LocationAddress1 = aJobOpenings[oJobOpening].LocationAddress1.trim();
        oAddress.LocationCity = aJobOpenings[oJobOpening].LocationCity.trim();
        oAddress.LocationState = aJobOpenings[oJobOpening].LocationState.trim().toUpperCase();

        var oBusinessUnit = {};
        oBusinessUnit.BusinessUnitId = aJobOpenings[oJobOpening].BusinessUnitId;
        oBusinessUnit.LocationName = aJobOpenings[oJobOpening].LocationName.trim();
        oBusinessUnit.Address = oAddress;
        oBusinessUnit.JobOpenings = [];
        oBusinessUnit.JobOpenings.push(aJobOpenings[oJobOpening]);

        for(var oBusinessUnitIndex in aBusinessUnits){
          if(aBusinessUnits[oBusinessUnitIndex].LocationName.trim() === aJobOpenings[oJobOpening].LocationName.trim()){
            sSavedoBusinessUnitIndex = oBusinessUnitIndex;
            bBusinessUnitFound = true;
            break;
          }
        }

        if(!bBusinessUnitFound){
          aBusinessUnits.push(oBusinessUnit);
        }else{
          aBusinessUnits[sSavedoBusinessUnitIndex].JobOpenings.push(aJobOpenings[oJobOpening]);
        }
      }

      if(bShowLocationsWithNoJobs){
        for (var i = aBusinessUnitsAjax.length - 1; i >= 0; i--) {
          bBusinessUnitFound = false;

          for (var i2 = aBusinessUnits.length - 1; i2 >= 0; i2--) {
            if(aBusinessUnits[i2].BusinessUnitId === aBusinessUnitsAjax[i].Id){
              bBusinessUnitFound = true;
              break;
            }
          }

          if(!bBusinessUnitFound){
            var oAddress = {};
            oAddress.LocationAddress1 = aBusinessUnitsAjax[i].Address.StreetAddress1.trim();
            oAddress.LocationCity = aBusinessUnitsAjax[i].Address.City.trim();
            oAddress.LocationState = aBusinessUnitsAjax[i].Address.State.trim().toUpperCase();

            var oBusinessUnit = {};
            oBusinessUnit.BusinessUnitId = aBusinessUnitsAjax[i].Id;
            oBusinessUnit.LocationName = aBusinessUnitsAjax[i].Name.trim();
            oBusinessUnit.Address = oAddress;
            oBusinessUnit.JobOpenings = [];

            aBusinessUnits.push(oBusinessUnit);
          }
        }
      }

      sortByKey(aBusinessUnits, "LocationName", "")
  }else if(bShowLocationsWithNoJobs){
    for (var i = aBusinessUnitsAjax.length - 1; i >= 0; i--) {
      var oAddress = {};
      oAddress.LocationAddress1 = aBusinessUnitsAjax[i].Address.StreetAddress1.trim();
      oAddress.LocationCity = aBusinessUnitsAjax[i].Address.City.trim();
      oAddress.LocationState = aBusinessUnitsAjax[i].Address.State.trim().toUpperCase();

      var oBusinessUnit = {};
      oBusinessUnit.BusinessUnitId = aBusinessUnitsAjax[i].Id;
      oBusinessUnit.LocationName = aBusinessUnitsAjax[i].Name.trim();
      oBusinessUnit.Address = oAddress;
      oBusinessUnit.JobOpenings = [];

      aBusinessUnits.push(oBusinessUnit);
    }
  }
}

//Gets Job Openings based on Specific Category
function getJobOpeningsAjax(oBusinessUnit, oCategory){
  if(bUseCategoryAPI){
    var sCategoryCode = "&jobcategorycode=" + encodeURIComponent(oCategory.Code);
  }else{
    var sCategoryCode = "";
  }

  return jQuery.ajax({
    url: sPeoplematterAPIURL + '/api/applicationjobopening/',
    data: 'businessunitid=' + oBusinessUnit.Id + sCategoryCode,
    type: 'GET',
    async: true,
    dataType: 'jsonp',
    beforeSend: function(){
      //iJobOpeningsAjaxCount++;
    },
    error: function(jqXHR, textStatus, errorThrown){
      if(textStatus == 500){
        //alert('Failed to load Job Openings for ' + oCategory.Code);
        //iJobOpeningsAjaxCount++;
      }
    },
    success: function(oData){
      if(!jQuery.isEmptyObject(oData)){
        for(var oJobOpening in oData){

          if(bUseGeoLocation){
            oData[oJobOpening].MilesAway = getRadiusInMiles(oGeoPosition.latitude, oGeoPosition.longitude, oBusinessUnit.Address.Latitude, oBusinessUnit.Address.Longitude);
          }

          if(bUseCategoryAPI){
            oData[oJobOpening].Category = oCategory;
          }

          oData[oJobOpening].BusinessUnitId = oBusinessUnit.Id;

          aJobOpenings.push(oData[oJobOpening]);
        }
      }
    }
  });
}

//Gets Radius In Miles for a Business Unit
function getRadiusInMiles(centerlatitude, centerlongitude, pointlatitude, pointlongitude){
  if(bUseGeoLocation){
    //Conversion of Meters to Miles
    var meterToMile = 0.000621371;

    var center = new google.maps.LatLng(centerlatitude, centerlongitude);
    var point = new google.maps.LatLng(pointlatitude, pointlongitude);

    return Math.round(google.maps.geometry.spherical.computeDistanceBetween(center, point) * meterToMile);
  }
}


/*
// Controllers
*/

//Get the User's Current Geo Location
// navigator.geolocation.getCurrentPosition(getHTML5GeoPosition, showHTML5GeoError);

runControllers();

function runControllers(){
  jQuery(document).ready(function(){
    jQuery('.tab7link').hide();
  });

  for (var i = aAlias.length - 1; i >= 0; i--) {
    if(bUseCategoryAPI){
      var _alias = aAlias[i];
      $.when(getJobCategories(_alias)).done(function(a1){
        $.when(getBusinessUnits(_alias)).done(function(a2){
          $.when(getJobOpenings(aCategories)).done(function(a3){
          });
        });
      });
    }else{
      $.when(getBusinessUnits(aAlias[i])).done(function(a2){
        $.when(getJobOpenings(aCategories)).done(function(a3){
        });
      });
    }
  }

  return true;
}

//This sets up links so that you can go back to list without starting over
function bindAllLinks(){
  jQuery('.tabbable a[class^=tab]').click(function(){
    if(jQuery(this).attr('class') === "tab5link"){
        sPreviousTab = sTab;
    }else{
      sPreviousTab = sTab;
      sTab = jQuery(this).attr('class');
    }
  });
}

function showPreviousTab(){
  if(sPreviousTab === ""){
    jQuery('.tab1link').tab('show');
  }else{
    jQuery('.' + sPreviousTab).tab('show');
  }
}

//Gets Job Positions based from list of Categories
function getJobOpenings(aCategories){
  if(bUseCategoryAPI && !jQuery.isEmptyObject(aCategories)){
    for(var oCategory in aCategories){
      for(var oBusinessUnit in aBusinessUnitsAjax){
        $.when(getJobOpeningsAjax(aBusinessUnitsAjax[oBusinessUnit], aCategories[oCategory])).done(function(a3){
            iJobOpeningsAjaxCount++;

            if(iJobOpeningsAjaxCount === (aBusinessUnitsAjax.length * aCategories.length)){
              fixBusinessUnitsData(aJobOpenings);

              drawModel();
              return aJobOpenings;
            }
          }, function(){
            //This if the ajax call fails to continue on
            if(iJobOpeningsAjaxCount === (aBusinessUnitsAjax.length * aCategories.length)){
              fixBusinessUnitsData(aJobOpenings);

              drawModel();
              return aJobOpenings;
            }
        });
      }
    }
  }else{
    for(var oBusinessUnit in aBusinessUnitsAjax){
      $.when(getJobOpeningsAjax(aBusinessUnitsAjax[oBusinessUnit], null)).done(function(a3){
          iJobOpeningsAjaxCount++;

          if(iJobOpeningsAjaxCount === aBusinessUnitsAjax.length){
            fixBusinessUnitsData(aJobOpenings);

            drawModel();
            return aJobOpenings;
          }
        }, function(){
          //This if the ajax call fails to continue on
          if(iJobOpeningsAjaxCount === aBusinessUnitsAjax.length){
            fixBusinessUnitsData(aJobOpenings);

            drawModel();
            return aJobOpenings;
          }
      });
    }

    return aJobOpenings;
  }
}

function drawModel(){
  drawAllJobOpenings();
  drawJobsByMeJobOpenings();
  drawBusinessJobOpenings();
  drawLocationJobOpenings();

  if(bUseCategoryAPI){
    drawCategoryJobOpenings();
  }

  //Enables Bootstrap Sortable
  if(jQuery.isFunction(jQuery.bootstrapSortable)){
      $.bootstrapSortable(true);
    }

  //Makes Location Name and Business Name Links clickable
  $('.tab4link').click(function(e){
    e.preventDefault();

    sLocationName = $(this).attr('data');
    oFilteredBusinessUnit = {};

    for(var oBusinessUnit in aBusinessUnits){
      if(aBusinessUnits[oBusinessUnit].LocationName === sLocationName){
        oFilteredBusinessUnit = aBusinessUnits[oBusinessUnit];
        break;
      }
    }

    drawBusinessFilter(oFilteredBusinessUnit);
    bindDetailLinks();

    if(jQuery(this).attr('class') === "tab5link"){
        sPreviousTab = sTab;
    }else{
      sPreviousTab = sTab;
      sTab = jQuery(this).attr('class');
    }

    $(this).tab('show');
  });

  //Makes Job Opening Detail links clickable
  bindDetailLinks();

  //Bind all links to make a previous list button
  bindAllLinks();

  return true;
}

function bindDetailLinks(){
  $('.tab5link').click(function(e){
    e.preventDefault();

    sId = $(this).attr('data');
    oFilteredJobOpening = {};

    for(var oJobOpening in aJobOpenings){
      if(aJobOpenings[oJobOpening].Id === sId){
        oFilteredJobOpening = aJobOpenings[oJobOpening];
        break;
      }
    }

    drawJobOpening(oFilteredJobOpening);
    $(this).tab('show');
  });
}

function checkEmptyObject(oObject, sTableId, sColSpan, sErrorMessage){
  if(jQuery.isEmptyObject(oObject)){
    jQuery('#' + sTableId).append('<tr><td colspan="' + sColSpan + '">' + sErrorMessage + '</td></tr>');
    return false;
  }

  if(oObject.length == 0){
    jQuery('#' + sTableId).append('<tr><td colspan="' + sColSpan + '">' + sErrorMessage + '</td></tr>');
    return false;
  }

  return true;
}




/*
// View Models
*/
function drawAllJobOpenings(){
  sortByKey(aJobOpenings, "Title", "")
  jQuery('#table-body-all').html('');

  if(!checkEmptyObject(aJobOpenings, "table-body-all", "4", sNoJobs)){
    return false;
  }

  for(var oJob in aJobOpenings){
    jQuery('#table-body-all').append('<tr><td><a class="tab5link" href="#tab5" data-toggle="tab" data="' + aJobOpenings[oJob].Id + '">' + aJobOpenings[oJob].Title.trim() + '</a></td><td>' + aJobOpenings[oJob].LocationName.trim() + '</td><td>' + aJobOpenings[oJob].LocationAddress1.trim() + ' ' + toTitleCase(aJobOpenings[oJob].LocationCity.trim()) + ', ' + aJobOpenings[oJob].LocationState.trim() + '</td><td>' + createShareLinks(aJobOpenings[oJob].ApplyUrl, aJobOpenings[oJob].Title) + '</td></tr>');
  }

  return true;
}

function drawJobsByMeJobOpenings(){
  sortByKey(aJobOpenings, "MilesAway", "")
  jQuery('#table-body-jobsbyme').html('');

  if(!checkEmptyObject(aJobOpenings, "table-body-jobsbyme", "5", sNoJobs)){
    return false;
  }

  for(var oJob in aJobOpenings){
    jQuery('#table-body-jobsbyme').append('<tr><td><a class="tab5link" href="#tab5" data-toggle="tab" data="' + aJobOpenings[oJob].Id + '">' + aJobOpenings[oJob].Title.trim() + '</a></td><td>' + aJobOpenings[oJob].LocationName.trim() + '</td><td>' + aJobOpenings[oJob].LocationAddress1.trim() + ' ' + toTitleCase(aJobOpenings[oJob].LocationCity.trim()) + ', ' + aJobOpenings[oJob].LocationState.trim() + '</td><td>' + aJobOpenings[oJob].MilesAway + '</td><td>' + createShareLinks(aJobOpenings[oJob].ApplyUrl, aJobOpenings[oJob].Title) + '</td></tr>');
  }

  return true;
}

function drawBusinessJobOpenings(){
  sortByKey(aBusinessUnits, "LocationName", "")
  jQuery('#table-body-business').html('');

  if(!checkEmptyObject(aBusinessUnits, "table-body-business", "3", sNoJobs)){
    return false;
  }

  for(var oBusinessUnit in aBusinessUnits){
    jQuery('#table-body-business').append('<tr><td><a class="tab4link" href="#tab4" data-toggle="tab" data="' + aBusinessUnits[oBusinessUnit].LocationName + '">' + aBusinessUnits[oBusinessUnit].LocationName + '</a></td><td>' + aBusinessUnits[oBusinessUnit].JobOpenings.length + '</td><td>' + aBusinessUnits[oBusinessUnit].Address.LocationAddress1 + ' ' + toTitleCase(aBusinessUnits[oBusinessUnit].Address.LocationCity) + ', ' + aBusinessUnits[oBusinessUnit].Address.LocationState + '</td></tr>');
  }

  return true;
}

function drawLocationJobOpenings(){
  sortByKey(aBusinessUnits, "Address", "")
  jQuery('#table-body-locations').html('');

  if(!checkEmptyObject(aBusinessUnits, "table-body-locations", "4", sNoJobs)){
    return false;
  }

  for(var oBusinessUnit in aBusinessUnits){
    jQuery('#table-body-locations').append('<tr><td><a class="tab4link" href="#tab4" data-toggle="tab" data="' + aBusinessUnits[oBusinessUnit].LocationName + '">' + toTitleCase(aBusinessUnits[oBusinessUnit].Address.LocationCity) + ', ' + aBusinessUnits[oBusinessUnit].Address.LocationState + '</a></td><td>' + aBusinessUnits[oBusinessUnit].LocationName + '</td><td>' + aBusinessUnits[oBusinessUnit].Address.LocationAddress1 + ' ' + toTitleCase(aBusinessUnits[oBusinessUnit].Address.LocationCity) + ', ' + aBusinessUnits[oBusinessUnit].Address.LocationState + '</td><td>' + aBusinessUnits[oBusinessUnit].JobOpenings.length + '</td></tr>');
  }

  return true;
}

function drawCategoryJobOpenings(){
  sortByKey(aJobOpenings, "Category", "")
  jQuery('#table-body-categories').html('');

  if(!checkEmptyObject(aJobOpenings, "table-body-categories", "4", sNoJobs)){
    return false;
  }

  for(var oJob in aJobOpenings){
    jQuery('#table-body-categories').append('<tr><td>' + aJobOpenings[oJob].Category.Name + '</td><td><a class="tab5link" href="#tab5" data-toggle="tab" data="' + aJobOpenings[oJob].Id + '">' + aJobOpenings[oJob].Title.trim() + '</a></td><td>' + aJobOpenings[oJob].LocationName.trim() + '</td><td>' + aJobOpenings[oJob].LocationAddress1.trim() + ' ' + toTitleCase(aJobOpenings[oJob].LocationCity.trim()) + ', ' + aJobOpenings[oJob].LocationState.trim() + '</td><td>' + createShareLinks(aJobOpenings[oJob].ApplyUrl, aJobOpenings[oJob].Title) + '</td></tr>');
  }

  return true;
}

function drawBusinessFilter(oBusinessUnit){
  jQuery('#table-body-business-filter').html('');

  if(!checkEmptyObject(oBusinessUnit.JobOpenings, "table-body-business-filter", "3", sNoJobs)){
    return false;
  }

  for(var oJob in oBusinessUnit.JobOpenings){
    jQuery('#table-body-business-filter').append('<tr><td><a class="tab5link" href="#tab5" data-toggle="tab" data="' + oBusinessUnit.JobOpenings[oJob].Id + '">' + oBusinessUnit.JobOpenings[oJob].Title.trim() + '</a></td><td>' + oBusinessUnit.JobOpenings[oJob].LocationName.trim() + '</td><td>' + oBusinessUnit.JobOpenings[oJob].LocationAddress1.trim() + ' ' + toTitleCase(oBusinessUnit.JobOpenings[oJob].LocationCity.trim()) + ', ' + oBusinessUnit.JobOpenings[oJob].LocationState.trim() + '</td><td>' + createShareLinks(oBusinessUnit.JobOpenings[oJob].ApplyUrl, oBusinessUnit.JobOpenings[oJob].Title) + '</td></tr>');
  }

  return true;
}

function drawJobOpening(oJobOpening){
  jQuery('#detail-load td').html('Please Wait.  Loading Available Job Details.....');
  jQuery('#detail-row').hide();
  jQuery('#detail-data').hide();
  jQuery('#detail-load').show();
  jQuery('#business').html('');
  jQuery('#location').html('');
  jQuery('.title').html('');
  jQuery('.jobdescription').html('');
  jQuery('.requirements').html('');
  jQuery('.addinfo').html('');

  if(!jQuery.isEmptyObject(oJobOpening)){

    if(oJobOpening.LocationName !== null){
      jQuery('#business').html(oJobOpening.LocationName.trim());
    }

    if(oJobOpening.LocationAddress1 !== null){
      jQuery('#location').html(oJobOpening.LocationAddress1.trim() + ' ' + toTitleCase(oJobOpening.LocationCity.trim()) + ', ' + oJobOpening.LocationState.trim());
    }

    //Sets Share Buttons on Detail View
    jQuery('#share').html(createShareLinks(oJobOpening.ApplyUrl, oJobOpening.Title.trim()));

    if(oJobOpening.Title !== null){
      jQuery('.title').html(oJobOpening.Title.trim() + ' Information');
      jQuery('.joblink').html(oJobOpening.Title.trim());
    }else{
      jQuery('.title').html('');
    }

    if(oJobOpening.Description !== null){
      jQuery('.jobdescription').html(oJobOpening.Description.trim().replace(/\n/g , "<br>"));
    }else{
      jQuery('.jobdescription').html('No Description Available');
    }

    if(oJobOpening.Requirements !== null){
      jQuery('.requirements').html('<br><br>Requirements<br>' + oJobOpening.Requirements.trim().replace(/\n/g , "<br>"));
    }else{
      jQuery('.requirements').html('');
    }

    if(oJobOpening.AdditionalInformation !== null){
      jQuery('.addinfo').html('<br><br>Additional Info<br>' + oJobOpening.AdditionalInformation.trim().replace(/\n/g , "<br>"));
    }else{
      jQuery('.addinfo').html('');
    }

    if(oJobOpening.ApplyUrl !== null){
      jQuery('.applyurl').attr('href', oJobOpening.ApplyUrl);
    }else{
      jQuery('.applyurl').attr('href', '#');
    }
  }else{
    jQuery('#detail-load td').html(sNoJobs);
    return false;
  }

  jQuery('#detail-load').hide();
  jQuery('#detail-row').show();
  jQuery('#detail-data').show();

  return true;
}

/*
// Other Functions
//
*/
function createShareLinks(ApplyUrl, Title){
  if(Title !== null){
    sTitle = Title.trim();
  }else{
    sTitle = '';
  }

  if(ApplyUrl !== null){
    sApplyUrl = ApplyUrl;
  }else{
    return '';
  }

  return '<a href="http://www.facebook.com/share.php?u=' + sApplyUrl + '&text=' + sTitle + '" data-text="' + sTitle + '" target="_blank" class="icon fa fa-facebook"></a> \
                                <a href="https://twitter.com/share?url=' + sApplyUrl + '&text=' + sTitle + '" data-text="' + sTitle + '" target="_blank" class="icon fa fa-twitter"></a> \
                                <a href="https://linkedin.com/shareArticle?mini=true&summary=' + sTitle + '&title=Apply At ' + sTitle + '&url=' + sApplyUrl + '" target="_blank" class="icon fa fa-linkedin"></a> \
                                <a href="https://plus.google.com/share?url=' + sApplyUrl + '" target="_blank" class="icon fa fa-google"></a>';
}

function toTitleCase(str){
    return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
}

function sortByKey(array, sortkey1, sortkey2) {
  return array.sort(function(a, b) {
    if(sortkey1 == 'Category'){
      if(a[sortkey1].Name.toLowerCase() < b[sortkey1].Name.toLowerCase()) {return -1;}
      if(a[sortkey1].Name.toLowerCase() > b[sortkey1].Name.toLowerCase()) {return 1;}
    }else if(sortkey1 == 'Address'){
      if(a[sortkey1].LocationState.toLowerCase() < b[sortkey1].LocationState.toLowerCase()) {return -1;}
      if(a[sortkey1].LocationState.toLowerCase() > b[sortkey1].LocationState.toLowerCase()) {return 1;}
      if(a[sortkey1].LocationState.toLowerCase() == b[sortkey1].LocationState.toLowerCase() && a[sortkey1].LocationCity.toLowerCase() < b[sortkey1].LocationCity.toLowerCase()) {return -1;}
      if(a[sortkey1].LocationState.toLowerCase() == b[sortkey1].LocationState.toLowerCase() && a[sortkey1].LocationCity.toLowerCase() > b[sortkey1].LocationCity.toLowerCase()) {return 1;}
    }else if(sortkey1 == 'MilesAway'){
      if(a[sortkey1] < b[sortkey1]) {return -1;}
      if(a[sortkey1] > b[sortkey1]) {return 1;}
      if(sortkey2 != ""){
        if(a[sortkey1] == b[sortkey1] && a[sortkey2] < b[sortkey2]) {return -1;}
        if(a[sortkey1] == b[sortkey1] && a[sortkey2] > b[sortkey2]) {return 1;}
      }
    }else{
      if(a[sortkey1].toLowerCase() < b[sortkey1].toLowerCase()) {return -1;}
      if(a[sortkey1].toLowerCase() > b[sortkey1].toLowerCase()) {return 1;}
      if(sortkey2 != ""){
        if(a[sortkey1].toLowerCase() == b[sortkey1].toLowerCase() && a[sortkey2].toLowerCase() < b[sortkey2].toLowerCase()) {return -1;}
        if(a[sortkey1].toLowerCase() == b[sortkey1].toLowerCase() && a[sortkey2].toLowerCase() > b[sortkey2].toLowerCase()) {return 1;}
      }
    }
  });
}
