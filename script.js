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
/*contact*/
const isValidEmail = (email) => {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
  };
/*const isValidDate =(date) => {
  const re = /^(0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])[\/\-]\d{4}$/;
  return re.test(String(date).toLowerCase());

}*/

const isValidPhone = (phone) => {
    const re = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{5}[-\s\.]?[0-9]{3}$/im;
    return re.test(String(phone).toLowerCase());
  };
  
  const form= document.querySelector('form');
  const thankyou= document.querySelector('.thank_you');

  const nameInput =document.querySelector('input[name = "emri" ] ');
  const EmailInput =document.querySelector('input[name = "Email" ] ');
  const phoneInput =document.querySelector('input[name = "phone" ] ');
  const dateInput =document.querySelector('input[name = "date" ] ');
  const messageInput =document.querySelector('textarea[name = "message" ] ');

  const inputs =[nameInput,EmailInput,phoneInput,messageInput];

console.log(nameInput);

  let isFormValid = false;

  let isValidationOn =false;

  const resetElm=(elm)=>{
    elm.classList.remove("invalid");
    elm.nextElementSibling.classList.add("hidden");
   
  }
  const invalidateElm= (elm) =>{
    elm.classList.add("invalid");
    elm.nextElementSibling.classList.remove("hidden");
  }
  const validateInputs = () =>{
      if(!isValidationOn)return;
        isFormValid = true;
    inputs.forEach(resetElm) ;


    if(!nameInput.value){
        isFormValid = false;
        invalidateElm(nameInput);
      }
      if(!isValidEmail(EmailInput.value)){
        isFormValid =false;
        invalidateElm(EmailInput);
      }
      if(!isValidPhone(phoneInput.value)){
        isFormValid =false;
        invalidateElm(phoneInput);
      }
      /*
      if(!isValidDate(dateInput.value)){
        isFormValid =false;
        invalidateElm(dateInput);
      }
      */
      if(!messageInput.value){
        isFormValid =false;
        invalidateElm(messageInput);
      }
  };

 form.addEventListener('submit', (e)=> {
    e.preventDefault();
    isValidationOn = true;
    validateInputs();
    if (isFormValid) {
        form.remove();
        thankyou.classList.remove("hidden");
    }
 });

 inputs.forEach( input => {
  input.validateInputs('input', ()=>{
    validateInputs();
 });
 });
 