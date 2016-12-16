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
};