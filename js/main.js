$(document).ready(function(){
	$('.menu').click(function(e){
		e.stopPropagation();
		$('#main_nav').toggleClass('active');
	});
	$(document).click(function(){
		$('#main_nav').removeClass('active');
	});
});

function show_video(id){
            var video = document.getElementById(id);
			var content = document.getElementById('content');
			var poster = document.getElementById('poster');
            if (video.style.display == 'inline'){
				 video.style.display = 'none';
			} else{
                video.style.display = 'inline';
				video.autoplay = true;
				video.load();
				content.style.display = 'none';
				poster.style.display = 'none';
            }
			$('video').on('ended',function(){
				$(this).hide();
				content.style.display = 'inline';
				poster.style.display = 'inline';
			});
        }
