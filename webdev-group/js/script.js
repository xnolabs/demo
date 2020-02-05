function formValidation() {
	var name = document.forms["comments-section"]["name"].value;
	var rating = document.forms["comments-section"]["ratingRange"].value;
	if (name == "") {
		alert("Please enter your name");
	}
	else {
		return true;
	}
}

function displayComment() {
	var name = document.getElementById("name").value;
	var rating = document.getElementById("ratingRange").value;
	var comment = document.getElementById("user-comment").value;

	alert("Your Review: \n\nHi, " + name + "." + "\n" + "You rated us: " + rating + "\nYour Comment: " + comment + "\n\n Thanks for leaving us your feedback!")
}

function validationCheck() {
	if (formValidation() == true) {
		displayComment();
	}
	else {
		alert("Please enter the required information.");
	}
}




