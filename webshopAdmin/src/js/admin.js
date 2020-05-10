function activeMenu(active, inactive1, inactive2){
    document.getElementById(active).className = "active";
    document.getElementById(inactive1).classList.remove("active");
    document.getElementById(inactive2).classList.remove("active");
}


//change active menu -----------
document.getElementById("orders-sidebar").addEventListener('click', 
function(){
    activeMenu("orders-sidebar", "dashboard-sidebar", "contact-sidebar");
});
document.getElementById("dashboard-sidebar").addEventListener('click', 
function(){
    activeMenu("dashboard-sidebar", "orders-sidebar", "contact-sidebar");
});
document.getElementById("contact-sidebar").addEventListener('click', 
function(){
    activeMenu("contact-sidebar", "dashboard-sidebar", "orders-sidebar");
});
//--------------------------

