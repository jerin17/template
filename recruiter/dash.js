	var closebtn=document.getElementById('closebtn');
//*****************************************************************************************************

	var picturemodal=document.getElementById('picturemodal');
	var picturebtn=document.getElementById('picturebtn');
	picturebtn.addEventListener('click',openpicture);
	closebtn.addEventListener('click',closepicture);

	function openpicture(){
		picturemodal.style.display='block';
	}
	function closepicture(){
		picturemodal.style.display='none';
	}
//*****************************************************************************************************

	var biomodal=document.getElementById('biomodal');
	var biobtn=document.getElementById('biobtn');
	biobtn.addEventListener('click',openbio);
	closebtn.addEventListener('click',closebio);

	function openbio(){
		biomodal.style.display='block';
	}
	function closebio(){
		biomodal.style.display='none';
	}
//*****************************************************************************************************

	var det1modal=document.getElementById('det1modal');
	var det1btn=document.getElementById('det1btn');
	det1btn.addEventListener('click',opendet1);
	closebtn.addEventListener('click',closemodal);

	function opendet1(){
		det1modal.style.display='block';
	}
	function closemodal(){
		det1modal.style.display='none';
	}
//*****************************************************************************************************

	var det2modal=document.getElementById('det2modal');
	var det2btn=document.getElementById('det2btn');
	det2btn.addEventListener('click',opendet);
	closebtn.addEventListener('click',closemodal);

	function opendet(){
		det2modal.style.display='block';
	}
	function closemodal(){
		det2modal.style.display='none';
	}
//*****************************************************************************************************

	var det3modal=document.getElementById('det3modal');
	var det3btn=document.getElementById('det3btn');
	det3btn.addEventListener('click',opendet3);
	closebtn.addEventListener('click',closemodal);

	function opendet3(){
		det3modal.style.display='block';
	}
	function closemodal(){
		det3modal.style.display='none';
	}
//*****************************************************************************************************


	var passwordmodal=document.getElementById('passwordmodal');
	var passwordbtn=document.getElementById('passwordbtn');
	passwordbtn.addEventListener('click',openpassword);
	closebtn.addEventListener('click',closemodal);

	function openpassword(){
		passwordmodal.style.display='block';
	}
	function closemodal(){
		passwordmodal.style.display='none';
	}
//*****************************************************************************************************