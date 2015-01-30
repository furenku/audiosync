$(document).foundation();






$(document).ready(function() {


    var url = $('#themeUrl').html();

	// $("#select_audio a").click(function () {
	// 	var a = $(this);
	// 	var i = a.index();

	// 	console.log("IMPLEMENT: stop all");
	// });


	function playTextAudios( text ) {

		// revisar si ya hay un audio con este id
		var otherAudios = text.siblings().find('audio');

		textAudios = text.find('audio');

		if( textAudios.length > 0 ) {


			textAudios.each(function() {

				var audio = $(this);
				
				
				//audio.get(0).loop = true;

				if( ! audio.hasClass('active') ) {

					// otherAudios.each(function(){
					// 	var otherAudio = $(this);
					// 	var fadeOut = 1 + parseFloat( otherAudio.attr('data-fadeout') ) * 1000;
					// 	if( otherAudio.hasClass('active') ) {
					// 		console.log("FO: ", otherAudio.parent().attr('id'), fadeOut );
					// 		otherAudio.animate({ volume: 0 }, fadeOut, function(){
					// 			// otherAudio.removeClass('active');
					// 			// otherAudio.trigger('pause');
					// 			// audio.get(0).currentTime=0;
					// 		});
					// 	}
					// });
					


					var fadeIn = 1 + ( audio.attr('data-fadein') ) * 1000;
					console.log("FI: ", text.attr('id'), fadeIn );

					audio.trigger('load');
					audio.trigger('play');
					audio.get(0).volume=0;
					audio.animate({ volume:1 }, fadeIn );

					audio.addClass('active');

				}

			});

			
		}

	}

	/*
	setInterval(
		function() {
			if( $('#texts .text audio.active').length > 0 )
			console.log( "playing: ", $('#texts .text audio.active').get(0).currentTime );
		},
		200
	);
	*/



	// Object.keys(textAudios).forEach(function(key) {
	//     console.log(key, textAudios[key]);
	//     var file = url + "/txt/" + key + ".txt";
	// 	$.ajax({
	//         url : file,
	//         dataType: "text",
	//         success : function (data) {
	//             var textDiv = $('<div>');
	//             textDiv.html( data );
	//             textDiv.attr('class','text_div');
	//             textDiv.attr('id','text_'+key);
	//             $('#text').append( textDiv );
	//         }
	//     });

	// });

	// $('#text_holder .text').each(function(){
	// 	$(this).prepend( $(this).position().top );
	// });

	// $('#text_holder').css({paddingBottom:200});
	var textodiv = $('#text_holder');

	var line = $('<div>').width('100%').height(2);
	
	textodiv.scroll(function(){
		var texts = textodiv.find('.text');

		$('#counter').html(textodiv.scrollTop())
		texts.each(function(){
			
			var text = $(this);

			if( textodiv.scrollTop() > text.position().top
				&&
				textodiv.scrollTop() < text.height() + text.position().top ) {
				// text.css({border:'1px solid orange'});
				playTextAudios( text );
			} else {
				// text.css({border:'1px dotted blue'});
			}

		});

	});

});
