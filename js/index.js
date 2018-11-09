let toggleNavStatus = false;

let toggleNav = function ()
{
	let getSidebar = document.querySelector(".nav-sidebar");
    let getSidebarU1 = document.querySelector(".nav-sidebar ul");
    let getSidebarTitle = document.querySelector(".nav-sidebar span");
    let getSidebarLinks = document.querySelectorAll(".nav-sidebar a");
    
    if (toggleNavStatus == false)
    {
    	getSidebarU1.style.visibility = "visible";
    	getSidebar.style.width = "272px";
    	getSidebarTitle.style.opacity = "0.5";

    	let arrayLength = getSidebarLinks.length;
    	for (var i = 0; i < arrayLength; i++)
    	{
           getSidebarLinks[i].style.opacity = "1";
    	}

    	toggleNavStatus == true;
    }
    else if( toggleNavStatus == true )
    {
    	
    	getSidebar.style.width = "50px";
    	getSidebarTitle.style.opacity = "0";

    	let arrayLength = getSidebarLinks.length;
    	for (var i = 0; i < arrayLength; i++)
    	{
           getSidebarLinks[i].style.opacity = "0";
    	}
        
        getSidebarU1.style.visibility = "hidden";
    	toggleNavStatus == false;
    }
} 