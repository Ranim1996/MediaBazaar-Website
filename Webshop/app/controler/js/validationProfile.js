function checkCity() {
  var cityInput = document.getElementById("new-city").value;
  var message = "Enter a valid city";

  if (cityInput == "") {
    var element = document.getElementById("errorMessageCity");
    element.innerHTML = message;
    element.style.color = "red";
    document.getElementById("changeCity").setAttribute("type", "button");
  } else {
    document.getElementById("changeCity").setAttribute("type", "submit");
    alert("City has been successfully updated!");
  }
}

function checkPhoneNumber() {
  var phone = document.getElementById("new-phone").value;

  var message = "Enter a valid phone number";
  if (!/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/.test(phone)) {
    var element = document.getElementById("errorMessagePhone");
    element.innerHTML = message;
    element.style.color = "red";
    document.getElementById("changePhone").setAttribute("type", "button");
  } else {
    document.getElementById("changePhone").setAttribute("type", "submit");
    alert("Phone number has been successfully updated!");
  }
}

function checkEmail(){
    var email = document.getElementById("new-email").value;
    var message = "Enter a valid Email address";

    if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)))
    {
        var element = document.getElementById("errorMessageEmail");
        element.innerHTML = message;
        element.style.color = "red";
        document.getElementById("changeEmail").setAttribute("type", "button");
    }
    else{
        document.getElementById("changeEmail").setAttribute("type", "submit");
        alert("Email address has been successfully updated!");
    }
}

function checkPassword(){
    var Password = document.getElementById("new-password").value;
    document.getElementById("changeEmail").setAttribute("type", "submit");
    alert("Password has been successfully updated!");
}

document.getElementById("changePassword").addEventListener(
  "click",
  function () {
    checkPassword();
  },
  false
);

document.getElementById("changeCity").addEventListener(
  "click",
  function () {
    checkCity();
  },
  false
);

document.getElementById("changePhone").addEventListener(
  "click",
  function () {
    checkPhoneNumber();
  },
  false
);

document.getElementById("changeEmail").addEventListener(
    "click",
    function () {
      checkEmail();
    },
    false
  );

