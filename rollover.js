jQuery(function($) {
$(document).ready(function() {

		// Preload all rollovers
		$("#hoverlink img").each(function() {
			// Set the original src
			rollsrc = $(this).attr("src");
			if (rollsrc.replace(/.jpg$/ig,"_over.jpg")) {
				rollON = rollsrc.replace(/.jpg$/ig,"_over.jpg");
			}
			else {
				rollON = rollsrc;
			}
			$("<img>").attr("src", rollON);
		});

		// Navigation rollovers
		$("#hoverlink a").mouseover(function(){
			imgsrc = $(this).children("img").attr("src");
			matches = imgsrc.match(/_over/);

			// don't do the rollover if state is already ON
			if (!matches) {
			imgsrcON = imgsrc.replace(/.jpg$/ig,"_over.jpg"); // strip off extension
			$(this).children("img").attr("src", imgsrcON);
			}

		});
		$("#hoverlink a").mouseout(function(){
			$(this).children("img").attr("src", imgsrc);
		});

	});
});