var lastScrollTop = 0;
navbar = document.getElementById("navbar");
window.addEventListener("scroll", function ()
{
    var scrollTp = window.pageYOffset || document.documentElement.scrollTop;
    if(scrollTp > lastScrollTop)
    {
        navbar.style.top="-800px";
    }
    else
    {
        navbar.style.top="0px";
    }
    lastScrollTop = scrollTp;
})