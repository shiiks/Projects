/**
*	Author-Shikhar Saran Srivastava
*	Only for Sencha Animator
*	Play and Pause Functionality
**/
function dofirst()
{
    playButton.addEventListener('click',playOrPause, false);
}

function playOrPause() {
		if (!mysound.isPaused() && !mysound.isEnded()) {
			mysound.pause();
			var id = document.querySelectorAll(".p5pg5QXlX-an-stage > div");
			[].forEach.call(id, function(el, i) {
				el.style.WebkitAnimationPlayState = "paused";
				el.style.animationPlayState = "paused";
			});
			playButton.getElementsByTagName('img')[0].src = "assets/play-icon.png";
			playButton.style.opacity=1;
			setTimeout(function(){playButton.style.opacity=0;}, 2000);
			
			
		} else {
			mysound.play();
			var id = document.querySelectorAll(".p5pg5QXlX-an-stage > div");
			[].forEach.call(id, function(el, i) {
				el.style.WebkitAnimationPlayState = "running";
				el.style.animationPlayState = "running";
			});
			playButton.getElementsByTagName('img')[0].src = "assets/pause-icon.png";
			playButton.style.opacity=1;
			setTimeout(function(){playButton.style.opacity=0;}, 2000);
		}
	}