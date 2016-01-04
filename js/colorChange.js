var topbar, containtogrid, yPos, search1;
function yScroll(){
    topbar = document.getElementById('topbar');
    containtogrid = document.getElementById('containtogrid');
    search1 = document.getElementById('search1');
   
    yPos = window.pageYOffset;
    if(yPos > 60){
        topbar.style.boxShadow = "0px 2px 51px #000";
        topbar.style.backgroundColor = "#fff";
        search1.style.display = "none";
        containtogrid.style.backgroundColor = "transparent";
    } else {
        topbar.style.backgroundColor = "transparent";
        topbar.style.boxShadow = "0px 0px 0px transparent";
        containtogrid.style.boxShadow = "0px 0px 0px transparent";
        search1.style.display = "inline";
        containtogrid.style.backgroundColor = "transparent";
        
    }
}
 
window.addEventListener("scroll", yScroll);