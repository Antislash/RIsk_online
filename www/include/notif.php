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
function notif(chaine, codeColor){
	document.getElementsByClassName('txt-info')[0].innerHTML = chaine;
	var color;
	switch(codeColor) {
    case 1:
        color = 'rgba(90, 200, 90, 0.7)';
        break;
    case 2:
        color = 'rgba(90, 200, 90, 0.7)';
        break;
    default:
        color = 'rgba(90, 200, 90, 0.7)';
}
	document.getElementsByClassName('div-info-base')[0].style.backgroundColor = color;
	document.getElementsByClassName('div-info-base')[0].className = 'div-info-actif';
}
</script>