window.onscroll = function(){headerscroll()};


headerscroll =() =>{

    if (document.documentElement.scrollTop > 0) {
        document.getElementById("upper-header").style.height = "0px";
        document.getElementById("upper-header").style.transition = ".3s";
    } else{
        document.getElementById("upper-header").style.transition = ".3s";
        document.getElementById("upper-header").style.height  ="170px";
    }
}
changelocation = () =>{
    location.href="about_us.php";
}