$('#menu').on('click', function(){
    let check = true;
    if (check) {
        sideBar.style.transform = "translateX(0px)";
        menu.classList.add("hidden");
        cross.classList.remove("hidden");
    } else {
        sideBar.style.transform = "translateX(-100%)";
        menu.classList.remove("hidden");
        cross.classList.add("hidden");
    }
});

$("#account-dropdawn-list").on('click', function(){
    let element = this;
    let single = element.getElementsByTagName("ul")[0];
    single.classList.toggle("hidden");
});

function dropdownHandler(element) {
    let single = element.getElementsByTagName("ul")[0];
    single.classList.toggle("hidden");
}