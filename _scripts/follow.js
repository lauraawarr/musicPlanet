window.addEventListener('mousemove', follow);

function follow(ev){

	var x = ev.clientX;
	var y = ev.clientY;

	//defines stars
	var stars = document.querySelectorAll('#stars > *');
	var currentX;

	//move stars with mouse
	for (var i = 0; i < stars.length; i++){
		stars[i].style.left = 20 + x*0.02 + '%';
	}; //end for loop

	// circle.style.right = 10 - x* 0.01 + '%';
	// line1.style.right = 10 - x* 0.005 + '%';
	// line2.style.right = 10 - x* 0.005 + '%';
	// line3.style.right = 10 - x* 0.0025 + '%';

};