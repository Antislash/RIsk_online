<div id="chat_game">
	<div id="languette">
		<span id="deroule" onclick="deroulerChat(document.getElementById('chat_game'));">Chat</span>
	</div>
	<div id="chat_game_scroll" class="null">
		<div class="chat" id="chat-room">
		</div>
		<form id="chat-message">
			<input class="textbox" onclick="if(event.keyCode==13){saveMessage(); clear();}" type="textarea" name="msg_chat" id="barre-msg"/>
			<input class="button" onClick="saveMessage(), clear()" value="Envoyer" id="send-msg"/>
		</form>
		</table>
	</div>
</div>
<script>
function deroulerChat(elm){
	if(elm.className == "unwrap_chat"){
		elm.className = "wrapped_chat";
	}
	else{
		elm.className = "unwrap_chat";
	}
}
</script>