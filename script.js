const hamburger = document.querySelector(".hamburger");
const navbar_links = document.querySelector(".navbar_links");

hamburger.addEventListener("click", () => {
    hamburger.classList.toggle("active");
    navbar_links.classList.toggle("active");
})

document.querySelectorAll("navbar_links").forEach(n => n.addEventListener("click", () => {
    hamburger.classList.remove("active");
    navbar_links.classList.remove("active");
}))

window.addEventListener('scroll', activeRight);
window.addEventListener('scroll', activeLeft);

function activeRight(){
    var reveals = document.querySelectorAll('.content_leftToRight');

    for(var i = 0; i<reveals.length; i++){

        var windowheight = window.innerHeight;
        var revealtop = reveals[i].getBoundingClientRect().top;
        var revealpoint = 150;

        if(revealtop < windowheight - revealpoint){
            reveals[i].classList.add('activeRight');

        }
    }
}

function activeLeft(){
    var reveals = document.querySelectorAll('.content_rightToLeft');

    for(var i = 0; i<reveals.length; i++){

        var windowheight = window.innerHeight;
        var revealtop = reveals[i].getBoundingClientRect().top;
        var revealpoint = 100;

        if(revealtop < windowheight - revealpoint){
            reveals[i].classList.add('activeLeft');

        }
    }
}