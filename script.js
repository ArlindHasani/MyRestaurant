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

const recipesContainers = [...document.querySelectorAll('.recipes')];
const nxtBtn = [...document.querySelectorAll('.goRight')];
const preBtn = [...document.querySelectorAll('.goLeft')];

recipesContainers.forEach((item, i) => {
    let containerDimensions = item.getBoundingClientRect();
    let containerWidth = containerDimensions.width;
    
    nxtBtn[i].addEventListener('click', () => {
        item.scrollLeft += containerWidth;
    })

    preBtn[i].addEventListener('click', () => {
        item.scrollLeft -= containerWidth;
    })
})

/*contact*/

function validateReservations(){
  const nameInput =document.querySelector('input[name = "emri" ] ');
  const guestInput =document.querySelector('input[name = "guests" ] ');
  const EmailInput =document.querySelector('input[name = "Email" ] ');
  const phoneInput =document.querySelector('input[name = "phone" ] ');
  const dateInput =document.querySelector('input[name = "date" ] ');
  const messageInput =document.querySelector('input[name = "message" ] ');

  function resetElements(input){
    input.classList.remove("invalid");
    input.nextElementSibling.classList.add("hidden");

  }

  const isValidEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

  const isValidGuest = /^[1-9]{1}$/;

  const isValidDate = /^(2023|2024)\/(0[1-9]|1[0-2])\/(0[1-9]|[1-2][0-9]|3[0-1])$/;

  const isValidPhone = /^(049|044|045)[0-9]{6}$/;



  let isFormValid = true;

  if(nameInput.value == ""){
    nameInput.classList.add("invalid");
    nameInput.nextElementSibling.classList.remove("hidden");
    return false;
  }else{
    resetElements(nameInput);
  }
  if(guestInput.value == "" || !isValidGuest.test(guestInput.value)){
    guestInput.classList.add("invalid");
    guestInput.nextElementSibling.classList.remove("hidden");
    return false;
  }else{
    resetElements(guestInput);
  }
  if(EmailInput.value == "" || !isValidEmail.test(EmailInput.value)){
    EmailInput.classList.add("invalid");
    EmailInput.nextElementSibling.classList.remove("hidden");
    return false;
  }else{
    resetElements(EmailInput);
  }
  if(phoneInput.value == "" || !isValidPhone.test(phoneInput.value)){
    phoneInput.classList.add("invalid");
    phoneInput.nextElementSibling.classList.remove("hidden");
    return false;
  }else{
    resetElements(phoneInput);
  }
  if(dateInput.value == "" || !isValidDate.test(dateInput.value)){
    dateInput.classList.add("invalid");
    dateInput.nextElementSibling.classList.remove("hidden");
    return false;
  }else{
    resetElements(dateInput);
  }

  return true;
};


