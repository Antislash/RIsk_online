
function addAmi(id_user1, id_user2) {

	var requette = "INSERT INTO user1_has_user2 VALUES("+ id_user1+", " + id_user2 + ")";
	db.executeInsertQuery(requette);
}

function delAmi(id_user1, id_user2) {

	var requette = "DELETE FROM user1_has_user2 WHERE id_user1=" + id_user1 + "AND id_user2=" + id_user2 +")"
	db.executeDeleteQuery(requette);
}