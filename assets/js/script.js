function showContent(){
    document.getElementById("dropcontent").classList.toggle("show");
}

window.onclick = function(event){
    if(!event.target.matches(".dropbtn")){
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for(i = 0; i < dropdowns.length; i++){
            var openDropDown = dropdowns[i];
            if(openDropDown.classList.contains("show")){
                openDropDown.classList.remove("show");
            }
        }
    }
}
function printDoc(){
    this.window.print();
}