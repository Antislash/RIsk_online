<div class="container-info">
	<div class="div-info-base">
		<span class="txt-info"></span>
		<img class="img-info" onclick="closeInfoMsg();" height="15px" src="images/close.png"/>
	</div>
</div>
<script>
function closeInfoMsg(){
	var info = document.getElementsByClassName('div-info-actif');
	info[0].className = 'div-info-base';
}
function notif(chaine){
	var color = chaine.split(";")[0];
	var txt = chaine.split(";")[1];
	document.getElementsByClassName('txt-info')[0].innerHTML = txt;
	document.getElementsByClassName('div-info-base')[0].style.backgroundColor = color;
	document.getElementsByClassName('div-info-base')[0].className = 'div-info-actif';
}
</script>