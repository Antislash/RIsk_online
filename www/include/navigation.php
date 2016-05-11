<div class="container-info">
	<div class="div-info-base">
		<span class="txt-info"></span>
		<img class="img-info" onclick="closeInfoMsg();" onchange="var info = document.getElementsByClassName('div-info-base');	info[0].className = 'div-info-actif';" height="15px" src="images/close.png"/>
	</div>
</div>
<nav id="top_navigation">
	<img id="logo_risk" src="images/logo_risk.png"/>
	<a href="#"><img class="icon_menu" src="images/profil.png" onmouseover="this.src='images/profil_hover.png'" onmouseout="this.src='images/profil.png'"/></a>
	<a href="#"><img class="icon_menu" src="images/stats.png" onmouseover="this.src='images/stats_hover.png'" onmouseout="this.src='images/stats.png'"/></a>
	<a href="#"><img class="icon_menu" src="images/news.png" onmouseover="this.src='images/news_hover.png'" onmouseout="this.src='images/news.png'"/></a>
	<a href="#"><img class="icon_menu" src="images/help.png" onmouseover="this.src='images/help_hover.png'" onmouseout="this.src='images/help.png'"/></a>
	<div id="table_login">
		<table>
			<tr>
				<td class="button" id="button_game">New Game</td>
				<td class="button" id="button_game">Join Game</td>
			</tr>
		</table>
	</div>
</nav>
<script>
function closeInfoMsg(){
	var info = document.getElementsByClassName('div-info-actif');
	info[0].className = 'div-info-base';
}
</script>
