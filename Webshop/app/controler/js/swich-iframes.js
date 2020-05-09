function addIframe(id) 
{
    var x = document.getElementById("myFrame");        
    if (id=='pd')
    { 		
        x.src = "PersonalInfo.php";
        
    }
    else if (id=='myp') 
    {       
        x.src = "CartInfo.php";   	  
    }
}