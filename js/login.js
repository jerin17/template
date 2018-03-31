	var modal=document.getElementById('simplemodal');
	var modalbtn=document.getElementById('modalbtn');
	var closebtn=document.getElementsByClassName('closebtn')[0];

	modalbtn.addEventListener('click',openmodal);
	closebtn.addEventListener('click',closemodal);
	window.addEventListener('click',closemodal_out);

	function openmodal(){
		modal.style.display='block';
	}
	function closemodal(){
		modal.style.display='none';
	}
	function closemodal_out(e){
		if(e.target==modal)	
		modal.style.display='none';
	}	