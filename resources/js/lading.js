var landingHeader = document.getElementById('landing-header'); //Шапка landing page
var landingText = document.getElementById('landing-header-text'); //Главный текст шапки landing page 
document.addEventListener("scroll", function(){
    let scrollPosition = window.scrollY; // Опредление позиции пользователя на странице
    if(scrollPosition > 10){
        landingHeader.classList.add('bg-white');
        landingHeader.classList.add("shadow-2xl");
        landingText.classList.remove("text-white");
        landingText.classList.add("text-gray-600");
    }
    else{
        landingHeader.classList.remove('bg-white');
        landingHeader.classList.remove("shadow-2xl");
        landingText.classList.remove("text-gray-600");
        landingText.classList.add("text-white");
    }
});