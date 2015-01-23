$(document).foundation();


$(document).ready(function() {

	$("#select_audio a").click(function () {
		var a = $(this);
		var i = a.index();

		console.log("stop all");
		/*
		$('#audios audio').each( function() {
			$(this).stop();
		})
		*/
		var audio = $('<audio>');
		var src = $('<source>').attr('src','audio/bt'+(i+1)+'.mp3');

		audio.append( src );

		$('#audios audio').each(function(){
			$( this ).trigger( 'pause' );
		});
		$('#audios').append( audio );
		audio.trigger('play');
	});



});
