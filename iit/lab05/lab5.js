/* Lab 5 JavaScript File 
   Place variables and functions in this file */

//Need to place the variables:
//Using const so the variable never changes.
const firstName = document.getElementById("firstName");
const lastName = document.getElementById("lastName");
const pseudonym = document.getElementById("pseudonym");
const nicknameBtn = document.getElementById("nicknameBtn");
const addForm = document.getElementById("addForm");
const comments = document.getElementById("comments");

nicknameBtn.addEventListener("click", function() {
   //Get the value of the first, and last name along with the nickname
   let firstNametext = firstName.value;
   let lastNametext = lastName.value;
   let pseudonymtext = pseudonym.value;
   //Need to build the structure: FirstName LastName is Nickname
   let message = firstNametext + " " + lastNametext + " is " + pseudonymtext;
   alert(message);
});

addForm.addEventListener("submit", function(event) {
   let isValid = validate(addForm);
   if (!isValid) {
      event.preventDefault();
   }
});

comments.addEventListener("focus",function() {
   if (comments.value == "Please enter your comments") {
      //Clear the textbox:
      comments.value = ""; 
   }
});

comments.addEventListener("blur", function() {
   if (comments.value == "") {
      //Add the text back:
      comments.value = "Please enter your comments";
   }
});


function validate(formObj) {
   // put your validation code here
   // it will be a series of if statements
   //If statements are used to make sure it's not blank text being submitted
   if (formObj.firstName.value.trim() == "") {
      alert("You must enter a first name.");
      formObj.firstName.focus();
      return false;
   }
   if (formObj.lastName.value.trim() == "") {
      alert("You must enter a last name.");
      formObj.lastName.focus();
      return false;
   }
   if (formObj.title.value.trim() == "") {
      alert("You must enter a title.");
      formObj.title.focus();
      return false;
   }
   if (formObj.org.value.trim() == "") {
      alert("You must enter a organization.");
      formObj.org.focus();
      return false;
   }
   if (formObj.pseudonym.value.trim() == "") {
      alert("You must enter a pseudonym.");
      formObj.pseudonym.focus();
      return false;
   }
   if (formObj.comments.value.trim() == "" || formObj.comments.value == "Please enter your comments") {
      alert("You must enter a comment.");
      formObj.comments.focus();
      return false;
   }
   alert("Form submitted successfully");
   return true;
}

