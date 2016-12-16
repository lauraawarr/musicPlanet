window.addEventListener('load', init);

function init(){

	var hiddenBar = document.querySelector('#hidden-bar');
	var showHidden = document.querySelector('#show-hidden');

	showHidden.addEventListener('click', showHiddenContent);
	var hiddenBarState = 'closed';

	function showHiddenContent(){
		if (hiddenBarState == 'closed'){
				hiddenBarState = 'open';
				hiddenBar.classList.add('visible');
				hiddenBar.classList.remove('hidden');
		} else {
			hiddenBarState = 'closed';
			hiddenBar.classList.remove('visible');
			hiddenBar.classList.add('hidden');
		}
	};

	var header = document.querySelector('.wrap-head > h1');
	var visible = true;

	setInterval(pulse, 800);

	function pulse(){
		if (visible){
			//header.classList.remove('visible');
			header.style.opacity = 0.4;
			visible = false;
		} else {
			//header.classList.add('visible');
			header.style.opacity = 1;
			visible = true;
		}
	}

	window.addEventListener('mousemove', follow);

	function follow(ev){

		var x = ev.clientX;
		var y = ev.clientY;

		//defines stars
		var stars = document.querySelectorAll('#stars > *');
		var currentX;

		//move stars with mouse
		for (var i = 0; i < stars.length; i++){
			stars[i].style.left = 25 + x*0.02 + '%';
		}; //end for loop

	};

};