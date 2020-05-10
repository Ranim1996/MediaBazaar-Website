//confirm order-----------
function change(){
    var button = document.getElementById("confirmButton");
    if(button.textContent == "Confirm")
    {
        button.innerHTML = "Confirmed";
    }
}
document.getElementById("confirmButton").click = change;
//--------------------------