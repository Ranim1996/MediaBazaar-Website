function validate() {
  var x = document.forms["SignUpForm"]["name"].value;
  var y = document.forms["SignUpForm"]["mail"].value;
  var z = document.forms["SignUpForm"]["pass"].value;

  if (x == "") {
    alert("username must be filled out.");
    return false;
  }

  if (y == "") {
    alert("email must be filled out.");
    return false;
  }

  if (z == "") {
    alert("password must be filled out.");
    return false;
  }

}
