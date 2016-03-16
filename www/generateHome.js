function generateFriends(){
	var friends = [{avatar:"images/avatar.png", pseudo:"Busquets91", status:"En ligne"},{avatar:"images/avatar2.png", pseudo:"Gatafdu42", status:"En ligne"},{avatar:"images/avatar3.png", pseudo:"Vivou", status:"Gros pd"}
	var elm = getElementById("list_friends");
	var ctn = "";
	for each(friend in friends){
		ctn += "<tr class=\"bloc_friends\"><td class=\"avatar_friends\"><img src=\"" + friend.avatar + "\"/></td><td class=\"info_friends\">" + friend.pseudo + "<br/>" + friend.status + "</td></tr>"
	}
	elm.innerHtml = ctn;
}
