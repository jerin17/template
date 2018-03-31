<!DOCTYPE html>
<html>
<head>
	<title>Hireling</title>
    <link rel="icon" type="image/gif" href="css/images/logo.png"/>
<style>
body{margin: 0;padding: 0;background: url(css/background/back5.jpg);background-size: cover;}
#loader-container{background: rgba(0,0,0,0.5);height: 100vh;}
#loader{
	position: absolute;top: 50%;left: 50%;
	transform: translate(-50%,-50%)rotate(45deg);
	width: 150px;
	height: 150px;
	display: block;
	transition: 1s;
}	
#loaderspan{
	width: 50px;height: 50px;
	background: #262626;
	display: block;
	float: left;
	animation: animate 1s linear 2.5s;
}

#loaderspan:nth-child(3){
	animation-delay: 0.8s;
	background: #003d79;
}
#loaderspan:nth-child(2),#loaderspan:nth-child(6){
	animation-delay: 0.6s;
	background: #003d79;
}
#loaderspan:nth-child(1),#loaderspan:nth-child(5),#loaderspan:nth-child(9){
	animation-delay: 0.4s;
	background: #fdb913;
}
#loaderspan:nth-child(4),#loaderspan:nth-child(8){
	animation-delay: 0.2s;
	background: #003d79;
}
#loaderspan:nth-child(7){
	animation-delay: 0s;
	background: #003d79;
}

@keyframes animate{
	0%{
		transform: scale(1);
	}
	25%{
		transform: scale(0);
	}
	50%{
		transform: scale(0);
	}
	75%{
		transform: scale(1);
	}
	100%{
		transform: scale(1);
	}
}

</style>

</head>
<body>
<div id="loader-container">
<div id="loader">
	<span id="loaderspan"></span>
	<span id="loaderspan"></span>
	<span id="loaderspan"></span>
	<span id="loaderspan"></span>
	<span id="loaderspan"></span>
	<span id="loaderspan"></span>
	<span id="loaderspan"></span>
	<span id="loaderspan"></span>
	<span id="loaderspan"></span>
</div>
</div>

<script>

var l1=document.getElementById("loader");
var l2=document.getElementById("loader-container");

function load(){
l1.style.display="none";
l2.style.display="none";
window.location.href = "http://localhost/project/template/home.php";
}

setInterval(load,2000);

</script>
</body>
</html>