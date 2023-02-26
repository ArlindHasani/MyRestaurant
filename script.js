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
    nxtBtn[i].addEventListener('click', () => {
        item.scrollLeft += 325;
    })

    preBtn[i].addEventListener('click', () => {
        item.scrollLeft -= 325;
    })
})

/*contact*/

function validateLogin(){
  const emailInput =document.querySelector('input[name = "userEmail" ] ');
  const passwordInput =document.querySelector('input[name = "userPassword" ] ');

  function resetElements(input){
    input.classList.remove("invalid");
    input.nextElementSibling.classList.add("hidden");

  }

  const isValidEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  const isValidPassword = /^(?=.*\d)(?=.*[A-Z]).{8,}$/i;

  if(emailInput.value == "" || !isValidEmail.test(emailInput.value)){
    emailInput.classList.add("invalid");
    emailInput.nextElementSibling.classList.remove("hidden");
    return false;
  }else{
    resetElements(emailInput);
  }
  if(passwordInput.value == "" || !isValidPassword.test(passwordInput.value)){
    passwordInput.classList.add("invalid");
    passwordInput.nextElementSibling.classList.remove("hidden");
    return false;
  }else{
    resetElements(passwordInput);
  }

  return true;
}

function validateSignUp(){
  const nameInput = document.querySelector('input[name = "signUpName" ] ');
  const passwordInput = document.querySelector('input[name = "signUpPassword" ] ');
  const emailInput = document.querySelector('input[name = "signUpEmail" ] ');
  const phoneInput = document.querySelector('input[name = "signUpPhone" ] ');

  const isValidName = /^[a-zA-Z]{4,}\s[a-zA-Z]{3,}$/
  const isValidEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  const isValidPassword = /^(?=.*\d)(?=.*[A-Z]).{8,}$/i;
  const isValidPhone = /^(049|044|045)[0-9]{6}$/; 

  function resetElements(input){
    input.classList.remove("invalid");
    input.nextElementSibling.classList.add("hidden");

  }

  if(nameInput.value == "" || !isValidName.test(nameInput.value)){
    nameInput.classList.add("invalid");
    nameInput.nextElementSibling.classList.remove("hidden");
    return false;
  }else{
    resetElements(nameInput);
  }

  if(passwordInput.value == "" || !isValidPassword.test(passwordInput.value)){
    passwordInput.classList.add("invalid");
    passwordInput.nextElementSibling.classList.remove("hidden");
    return false;
  }else{
    resetElements(passwordInput);
  }

  if(emailInput.value == "" || !isValidEmail.test(emailInput.value)){
    emailInput.classList.add("invalid");
    emailInput.nextElementSibling.classList.remove("hidden");
    return false;
  }else{
    resetElements(emailInput);
  }

  if(phoneInput.value == "" || !isValidPhone.test(phoneInput.value)){
    phoneInput.classList.add("invalid");
    phoneInput.nextElementSibling.classList.remove("hidden");
    return false;
  }else{
    resetElements(phoneInput);
  }

  return true;


}

var cancelProfileEdit = false;

function cancelUserProfileEdit(){
 cancelProfileEdit = true;
}

function validateEditProfile(){

  if(cancelProfileEdit){
    window.location.replace('../Pages/profile.php');
    return false;
  }
  const nameInput = document.querySelector('input[name = "editUserName" ] ');
  const passwordInput = document.querySelector('input[name = "editUserPassword" ] ');
  const emailInput = document.querySelector('input[name = "editUserEmail" ] ');
  const phoneInput = document.querySelector('input[name = "editUserPhone" ] ');

  const isValidName = /^[a-zA-Z]{4,}\s[a-zA-Z]{3,}$/
  const isValidEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  const isValidPassword = /^(?=.*\d)(?=.*[A-Z]).{8,}$/i;
  const isValidPhone = /^(049|044|045)[0-9]{6}$/; 

  function resetElements(input){
    input.classList.remove("invalid");
    input.nextElementSibling.classList.add("hidden");

  }

  if(nameInput.value == "" || !isValidName.test(nameInput.value)){
    nameInput.classList.add("invalid");
    nameInput.nextElementSibling.classList.remove("hidden");
    return false;
  }else{
    resetElements(nameInput);
  }

  if(passwordInput.value == "" || !isValidPassword.test(passwordInput.value)){
    passwordInput.classList.add("invalid");
    passwordInput.nextElementSibling.classList.remove("hidden");
    return false;
  }else{
    resetElements(passwordInput);
  }

  if(emailInput.value == "" || !isValidEmail.test(emailInput.value)){
    emailInput.classList.add("invalid");
    emailInput.nextElementSibling.classList.remove("hidden");
    return false;
  }else{
    resetElements(emailInput);
  }

  if(phoneInput.value == "" || !isValidPhone.test(phoneInput.value)){
    phoneInput.classList.add("invalid");
    phoneInput.nextElementSibling.classList.remove("hidden");
    return false;
  }else{
    resetElements(phoneInput);
  }

  return true;
}

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

  const isValidName = /^[a-zA-Z]{4,}\s[a-zA-Z]{3,}$/

  const isValidEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

  const isValidGuest = /^[1-9]{1}$/;

  const isValidDate = /^(2023|2024)[-/\\](0[1-9]|1[0-2])[-/\\](0[1-9]|[1-2][0-9]|3[0-1])$/;

  const isValidPhone = /^(049|044|045)[0-9]{6}$/;

  if(nameInput.value == "" || !isValidName.test(nameInput.value)){
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

var cancelReservationEdit = false;

function cancelReservationEdit(){
  cancelReservationEdit = true;
}

function validateEditReservation(){

  if(cancelReservationEdit){
    window.location.replace('../Pages/profile.php');
    return false;
  }

  const nameInput = document.querySelector('input[name = "editEmriRezervues" ] ');
  const guestsInput = document.querySelector('input[name = "editNumriPersonave" ] ');
  const phoneInput = document.querySelector('input[name = "editNumriRezervues" ] ');
  const dateInput = document.querySelector('input[name = "editDataRezervuar" ] ');

  const isValidName = /^[a-zA-Z]{4,}\s[a-zA-Z]{3,}$/
  const isValidGuest = /^[1-9]{1}$/;
  const isValidDate = /^(2023|2024)[-/\\](0[1-9]|1[0-2])[-/\\](0[1-9]|[1-2][0-9]|3[0-1])$/;
  const isValidPhone = /^(049|044|045)[0-9]{6}$/;

  function resetElements(input){
    input.classList.remove("invalid");
    input.nextElementSibling.classList.add("hidden");

  }

  if(nameInput.value == "" || !isValidName.test(nameInput.value)){
    nameInput.classList.add("invalid");
    nameInput.nextElementSibling.classList.remove("hidden");
    return false;
  }else{
    resetElements(nameInput);
  }

  if(guestsInput.value == "" || !isValidGuest.test(guestsInput.value)){
    guestsInput.classList.add("invalid");
    guestsInput.nextElementSibling.classList.remove("hidden");
    return false;
  }else{
    resetElements(guestsInput);
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
}

var cancAdminUserEdit = false;

function cancelAdminlUserProfileEdit(){
  cancAdminUserEdit = true;
}

console.log(cancAdminUserEdit);
function validateAdminEditProfile(){
  if(cancAdminUserEdit){
    window.location.replace('../Admin/dashboard.php');
    return false;
  }

  const passwordInput = document.querySelector('input[name = "editUserPassword" ] ');
  const accessLevelInput = document.querySelector('input[name = "editUserAccessLevel"]');

  const isValidPassword =  /^(?=.*\d)(?=.*[A-Z]).{8,}$/i;
  const isValidAccessLevel = /^(user|admin)$/;

  function resetElements(input){
    input.classList.remove("invalid");
    input.nextElementSibling.classList.add("hidden");

  }

  if(passwordInput.value == "" || !isValidPassword.test(passwordInput.value)){
    passwordInput.classList.add("invalid");
    passwordInput.nextElementSibling.classList.remove("hidden");
    return false;
  }else{
    resetElements(passwordInput);
  };

  if(accessLevelInput.value == "" || !isValidAccessLevel.test(accessLevelInput.value)){
    accessLevelInput.classList.add("invalid");
    accessLevelInput.nextElementSibling.classList.remove("hidden");
    return false;
  }else{
    resetElements(accessLevelInput);
  };

  return true;
}

var cancAddUser = false;

function cancelAddUser(){
  cancAddUser = true;
}

function validateAddUser(){
  if(cancAddUser){
    window.location.replace("../Admin/viewUsers.php");
    return false;
  }

  const nameInput = document.querySelector('input[name = "name" ] ');
  const passwordInput = document.querySelector('input[name = "password" ] ');
  const emailInput = document.querySelector('input[name = "email" ] ');
  const phoneInput = document.querySelector('input[name = "phone" ] ');
  const accessLevelInput = document.querySelector('input[name = "accessLevel" ] ');
  
  const isValidName = /^[a-zA-Z]{4,}\s[a-zA-Z]{3,}$/
  const isValidEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  const isValidPassword = /^(?=.*\d)(?=.*[A-Z]).{8,}$/i;
  const isValidPhone = /^(049|044|045)[0-9]{6}$/; 
  const isValidAccessLevel = /^(user|admin)$/;

  function resetElements(input){
    input.classList.remove("invalid");
    input.nextElementSibling.classList.add("hidden");

  }

  if(nameInput.value == "" || !isValidName.test(nameInput.value)){
    nameInput.classList.add("invalid");
    nameInput.nextElementSibling.classList.remove("hidden");
    return false;
  }else{
    resetElements(nameInput);
  }

  if(passwordInput.value == "" || !isValidPassword.test(passwordInput.value)){
    passwordInput.classList.add("invalid");
    passwordInput.nextElementSibling.classList.remove("hidden");
    return false;
  }else{
    resetElements(passwordInput);
  }

  if(emailInput.value == "" || !isValidEmail.test(emailInput.value)){
    emailInput.classList.add("invalid");
    emailInput.nextElementSibling.classList.remove("hidden");
    return false;
  }else{
    resetElements(emailInput);
  }

  if(phoneInput.value == "" || !isValidPhone.test(phoneInput.value)){
    phoneInput.classList.add("invalid");
    phoneInput.nextElementSibling.classList.remove("hidden");
    return false;
  }else{
    resetElements(phoneInput);
  }
  if(accessLevelInput.value == "" || !isValidAccessLevel.test(accessLevelInput.value)){
    accessLevelInput.classList.add("invalid");
    accessLevelInput.nextElementSibling.classList.remove("hidden");
    return false;
  }else{
    resetElements(accessLevelInput);
  };

  return true;

}


var cancEditNews = false;

function cancelNewsEdit(){
  cancEditNews = true;
}

function validateEditNews(){
  if(cancEditNews){
    window.location.replace("../Pages/news.php");
    return false;
  }

  const newsTitleInput = document.querySelector('input[name = "editNewsTitle" ] ');
  const newsContentInput = document.querySelector('textarea[name = "editNewsContent" ] ');
/*   const newsImageInput = document.querySelector('input[name = "editNewsImage" ] '); */

  const isValidTitle = /^(?=.{8,})/;
  const isValidContent = /^(?=.{20,})/;
/*   const isValidImage = /^(?=.{20,})/;
 */
  function resetElements(input){
    input.classList.remove("invalid");
    input.nextElementSibling.classList.add("hidden");

  }

  if(newsTitleInput.value == "" || !isValidTitle.test(newsTitleInput.value)){
    newsTitleInput.classList.add("invalid");
    newsTitleInput.nextElementSibling.classList.remove("hidden");
    return false;
  }else{
    resetElements(newsTitleInput);
  }

  if(newsContentInput.value == "" || !isValidContent.test(newsContentInput.value)){
    newsContentInput.classList.add("invalid");
    newsContentInput.nextElementSibling.classList.remove("hidden");
    return false;
  }else{
    resetElements(newsContentInput);
  }

  /* if(newsImageInput.value == "" || !isValidImage.test(newsImageInput.value)){
    newsImageInput.classList.add("invalid");
    newsImageInput.nextElementSibling.classList.remove("hidden");
    return false;
  }else{
    resetElements(newsImageInput);
  } */

  return true;
}

/* Profile Action CTA */

const viewProfile = document.querySelector('.viewProfile');
viewProfile.addEventListener("click", () => {
    const viewProfileContainer = document.querySelector('.viewProfileContainer');
    const viewReservationsContainer = document.querySelector('.viewReservationsContainer');
    viewProfileContainer.classList.remove('hidden');
    viewReservationsContainer.classList.add('hidden');
});


const viewReservations = document.querySelector('.viewReservations');
viewReservations.addEventListener("click", () => {
  const viewProfileContainer = document.querySelector('.viewProfileContainer');
  const viewReservationsContainer = document.querySelector('.viewReservationsContainer');
  viewProfileContainer.classList.add('hidden');
  viewReservationsContainer.classList.remove('hidden');
});

const logOut = document.querySelector('.logout');
logOut.addEventListener("click", () => {
  window.location.replace('../Functions/logout.php');
});

const cancelReservation = document.querySelector('.cancelReservation');
cancelReservation.addEventListener("click", () => {
  window.location.replace('../Functions/cancelReservation.php?reservationID=<?php ');
});

const editReservation = document.querySelector('.editReservation');
editReservation.addEventListener("click", () => {
  window.location.replace('../UserActions/editReservation.php');
});
