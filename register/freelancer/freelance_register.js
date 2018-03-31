
//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

	
$(".next").click(function(){

var name = document.forms.msform.f_name.value;  	
var email = document.forms.msform.f_email.value;  	
var password = document.forms.msform.f_password.value;  	
var cpassword = document.forms.msform.f_cpassword.value;  	
var phone = document.forms.msform.f_phone.value;  	
var age = document.forms.msform.f_age.value;  	
var gender = document.forms.msform.f_gender.value;  	
var firm = document.forms.msform.f_firm.value;  	
var work = document.forms.msform.f_work.value;  	

var f=document.getElementsByClassName('field');

function abc(){
						if(animating) return false;
					animating = true;
					current_fs = $(this).parent();
					next_fs = $(this).parent().next();
					$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
					current_fs.removeClass();
					current_fs.addClass("field");
					next_fs.show();
					next_fs.addClass("act");
					current_fs.animate({opacity: 0}, {
						step: function(now, mx) {
							scale = 1 - (1 - now) * 0.2;
							left = (now * 50)+"%";
							opacity = 1 - now;
							current_fs.css({
				        'transform': 'scale('+scale+')',
				        'position': 'absolute'
				      });
							next_fs.css({'left': left, 'opacity': opacity});
						}, 
						duration: 800, 
						complete: function(){
							current_fs.hide();
							animating = false;
						}, 
						easing: 'easeInOutBack'
					});

};
	if(name==""||email==""||password==""||cpassword=="")	
		{
			console.log("1");
			var err=document.getElementById("err");
			if(name==""){document.forms.msform.f_name.style.border="1px solid red";}
			if(email==""){document.forms.msform.f_email.style.border="1px solid red";}
			if(password==""){document.forms.msform.f_password.style.border="1px solid red";}
			if(cpassword==""){document.forms.msform.f_cpassword.style.border="1px solid red";}
			err.innerHTML="* fields cannot be blank";

		}
	else if(password!=cpassword)	
		{
			document.forms.msform.f_name.style.border="1px solid lightgrey";
			document.forms.msform.f_email.style.border="1px solid lightgrey";
			var err=document.getElementById("err");
			err.innerHTML="Confirm password doesn't match :(";
		}
		
	else if(f[1].className=="field act"){
			if(phone==""||age==""||gender=="")
			{
				console.log("2");
				var err2=document.getElementById("err2");
				if(phone==""){document.forms.msform.f_phone.style.border="1px solid red";}
				if(age==""){document.forms.msform.f_age.style.border="1px solid red";}
				if(gender==""){document.forms.msform.f_gender.style.border="1px solid red";}
				err2.innerHTML="* fields cannot be blank";
			}

			else{
					if(animating) return false;
					animating = true;
					current_fs = $(this).parent();
					next_fs = $(this).parent().next();
					$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
					current_fs.removeClass();
					current_fs.addClass("field");
					next_fs.show();
					next_fs.addClass("act");
					current_fs.animate({opacity: 0}, {
						step: function(now, mx) {
							scale = 1 - (1 - now) * 0.2;
							left = (now * 50)+"%";
							opacity = 1 - now;
							current_fs.css({
				        'transform': 'scale('+scale+')',
				        'position': 'absolute'
				      });
							next_fs.css({'left': left, 'opacity': opacity});
						}, 
						duration: 800, 
						complete: function(){
							current_fs.hide();
							animating = false;
						}, 
						easing: 'easeInOutBack'
					});

			}
	}
	
	else{
		
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	
	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	//show the next fieldset
	
	current_fs.removeClass();
	current_fs.addClass("field");
	next_fs.show();
	next_fs.addClass("act");
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({
        'transform': 'scale('+scale+')',
        'position': 'absolute'
      });
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
}});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset

	current_fs.removeClass();
	current_fs.addClass("field");
	previous_fs.show(); 
	previous_fs.addClass("act");	
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});
