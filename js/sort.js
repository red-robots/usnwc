/* 
 * @author: Fritz Healy
 * @version: 1.0
 *
 * This script sorts the tiles and icons on the usnwc site by width and height. 
 * The sort is performed by putting as many tiles in a row as possible then repeating the 
 * process with the next row.
 * 
 * NOTE: This function cannot size tiles and icons based on percentage widths due to the 
 * fact that the container uses auto margins to center itself in the process decreasing 
 * it's width meaning the tiles will be smaller after the margins for the container are added
 * which must be done last after the tiles are sorted. Thus, there is no way to place the 
 * tiles next to each other as their width will shrink after placement leaving gaps. 
 * NOTE: The above mentioned sizing issue based on percentages could be solved by 
 * calculating the percentage of the tile width from the container width and then using that to set
 * the width of each tile from the container width (before adding margins). This would prevent 
 * the resizing later of the tiles as the container shrinks. This was not put in place due to 
 * the fact that a flag would have to be added to the function to indicate whether or not
 * the user wanted to size by percentages. Otherwise implementing this wouldn't allow 
 * the user to keep a fixed width tile on screen because of the sizing based on percentage (thus 
 * the need for the flag). This problem and the original problem can be solved by the below operation/other option.
 * NOTE: The above mentioned sizing issue based on percentages could also be solved by placing 
 * the sorted items in the center of the container (add a margin equal to the gap between 
 * the last tile in the row and the end of the container, to each tile)(and keep the 
 * container a fixed width so tiles don't resize) but this wasn't necessary for the function needed for the site
 * currently so it was not implemented.
 */
 
/*
 * start the script once all the images are loaded, otherwise you can't sort reliably
 */
jQuery(window).load(function(){
	(function($){
		$.fn.totalWidth=function(){
			//get all width data for the current tile/icon
			var thisWidth=Number(this.css('width').replace(/[^0-9\.-]/g,""));					
			var thisMarginRight=Number(this.css('margin-right').replace(/[^0-9\.-]/g,""));
			var thisMarginLeft=Number(this.css('margin-left').replace(/[^0-9\.-]/g,""));
			var thisPaddingLeft=Number(this.css('padding-left').replace(/[^0-9\.-]/g,""));
			var thisPaddingRight=Number(this.css('padding-right').replace(/[^0-9\.-]/g,""));
			var thisBorderLeft=Number(this.css('border-left-width').replace(/[^0-9\.-]/g,""));
			var thisBorderRight=Number(this.css('border-right-width').replace(/[^0-9\.-]/g,""));
			//return sum
			return thisWidth+thisMarginLeft+thisMarginRight+thisPaddingLeft+
				thisPaddingRight+thisBorderLeft+thisBorderRight;
		};
		$.fn.totalHeight=function(){
			//get all height data for the current tile/icon
			var thisHeight=Number(this.css('height').replace(/[^0-9\.-]/g,""));
			var thisMarginTop=Number(this.css('margin-top').replace(/[^0-9\.-]/g,""));
			var thisMarginBottom=Number(this.css('margin-bottom').replace(/[^0-9\.-]/g,""));
			var thisPaddingTop=Number(this.css('padding-top').replace(/[^0-9\.-]/g,""));
			var thisPaddingBottom=Number(this.css('padding-bottom').replace(/[^0-9\.-]/g,""));
			var thisBorderTop=Number(this.css('border-top-width').replace(/[^0-9\.-]/g,""));
			var thisBorderBottom=Number(this.css('border-bottom-width').replace(/[^0-9\.-]/g,""));
			//return sum
			return thisHeight+thisMarginTop+thisMarginBottom+thisPaddingTop+thisPaddingBottom+
				thisBorderTop+thisBorderBottom;
		};
	})(jQuery);
	//since this function is used initially and after every screen resize don't use it anonymously
	function sort(){
		var $container=jQuery('.tile.container, .icon.container');
		if($container.length>0){	//if there are containers on the page
			$container.each(function(){		//loop through the containers
				var $singleContainer=jQuery(this); //create a jquery object for the container
				var $items=$singleContainer.find('.tile, .icon'); //find all the tiles or icons in the container
				if($items.length>0){	//if there are tiles or icons
					/*
					 * This next line is important and necessary because it allows for the sorted row 
					 * to size for the entire container width. Otherwise the container can only get smaller
					 * by adding margins.
					 */
					$singleContainer.css({'position':'relative','width':'100%'});
					//get the container data and set up tracking variables
					//all css values have to be parsed to remove "px", etc. from the values
					var singleContainerWidth=Number($singleContainer.css('width').replace(/[^0-9\.-]/g,""));
					var runningTop=Number($singleContainer.css('top').replace(/[^0-9\.-]/g,""));
					var singleContainerLeft=Number($singleContainer.css('left').replace(/[^0-9\.-]/g,""));
					//runnning left and running top are the variables used to set the tile position
					//so initially they are set to the container upper left values
					var runningLeft=singleContainerLeft;
					//have to keep track of the max values so the container can be sized later (maxWidthRow)
					//and so that each row can be placed below the previous row (maxHeightRow)
					var maxHeightRow=0;
					var maxWidthRow=0;
					$items.each(function(){ //loop through each tile/icon
						var $item=jQuery(this); //get each as a jquery object
						//if the current tile to be placed will exceed container width 
						//this operation has to be performed before the tile is placed
						if(runningLeft+$item.totalWidth()>singleContainerWidth){
							runningTop+=maxHeightRow;	//move the tile down a row
							runningLeft=singleContainerLeft;	//move the tile to the first position in the row
							maxHeightRow=0; //set the max height of the row back to zero
						}
						//if the height of the current tile is greater than all the other tiles in it's row
						//this must be done after the calculation for surpassing the end of the row
						//so that max height isn't updated based on a tile not placed in that row (in case the 
						//tile isn't placed in that row
						if($item.totalHeight()>maxHeightRow){
							maxHeightRow=$item.totalHeight(); //update this tile height to the max row Height
						}
						//place the tile/icon
						$item.css({
							position:'absolute',
							top:runningTop+"px",
							left:runningLeft+"px"
						});
						//increment the current left position by the values for the current tile/icon
						//this has to be done after the tile is placed
						runningLeft+=$item.totalWidth();
						//if the current tile is placed further down a row than any other row
						//this has to be done after running left is updated.
						if(runningLeft>maxWidthRow){
							maxWidthRow=runningLeft; //update the max width of the row
						}
					});
					//finally add the last row height to the current top value
					//this is used for setting the container height
					runningTop+=maxHeightRow;
				}
				//size the container based on the width and height kept track of before
				$singleContainer.css({
					'width':maxWidthRow,
					'height':runningTop
				});
			});
			return true;
		}
		return false;
	}
	//call the function initially
	if(sort()){
		var t, $window=jQuery(window); //variable for timeout
		var prevWindowWidth=$window.width();
		//on resize clear timeout variable and prevent any previous resize from calling the sort function 
		//until no more resizes are called aka. the user stops resizing. Then call the sort function.
		//the effect is the sort function is called only once. 
		$window.on('resize',function(){
			if($window.width()!==prevWindowWidth){
				prevWindowWidth=$window.width();
				clearTimeout(t);
				t=setTimeout(sort,200);
			}
		});
	}
});