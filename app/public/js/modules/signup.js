import { burger } from './burger.js';
import { themeDark } from './themeDark.js';

burger();
themeDark();

let nameValid = false;
let lastNameValid = false;
let emailValid = false;
let pwdValid = false;
let pwdConfirmValid = false;
let dbsValid = false;
let rgpdValid = false;

const nameUser = document.querySelector("#signup #name");
const lastNameUser = document.querySelector("#signup #lastName");
const emailUser = document.querySelector("#signup #email");
const pwdUser = document.querySelector("#signup #passwd");
const pwdConfirmUser = document.querySelector("#signup #passwdConfirm");
const dbsUser = document.querySelector("#signup #dbs");
const rgpdUser = document.querySelector("#signup #rgpd");
const formSignup = document.querySelector("#signup #formSignup");
const btnSubmit = document.querySelector("#signup #submit");

function allValid() {
    btnSubmit.disabled = !(nameValid && lastNameValid && emailValid && pwdValid && pwdConfirmValid && dbsValid  && rgpdValid);
}
nameUser.addEventListener("change", function() {
    const valid = this.nextElementSibling;
    const invalid = this.nextElementSibling.nextElementSibling;
    const feedback = this.parentElement.nextElementSibling;
    if(this.value.length <= 5) {
        invalid.style.display = "block";
        feedback.style.display = "block";
        valid.style.display = "none";
        nameValid = false;
    }else{
        invalid.style.display = "none";
        feedback.style.display = "none";
        valid.style.display = "block";
        nameValid = true;
    }
    allValid();
});

lastNameUser.addEventListener("change", function() {
    const valid = this.nextElementSibling;
    const invalid = this.nextElementSibling.nextElementSibling;
    const feedback = this.parentElement.nextElementSibling;
    if(this.value.length < 6) {
        invalid.style.display = "block";
        feedback.style.display = "block";
        valid.style.display = "none";
        lastNameValid = false;
    }else{
        invalid.style.display = "none";
        feedback.style.display = "none";
        valid.style.display = "block";
        lastNameValid = true;
    }
    allValid();
});

emailUser.addEventListener("change", function() {
    const valid = this.nextElementSibling;
    const invalid = this.nextElementSibling.nextElementSibling;
    const feedback = this.parentElement.nextElementSibling;

    const regex = /\S+@\S+\.\S+/;
    if(!regex.test(this.value)){
        invalid.style.display = "block";
        feedback.style.display = "block";
        valid.style.display = "none";

        emailValid = false;
    }else{
        invalid.style.display = "none";
        feedback.style.display = "none";
        valid.style.display = "block";
        emailValid = true;
    }
    allValid();
});

pwdUser.addEventListener("change", function() {
    const valid = this.nextElementSibling;
    const invalid = this.nextElementSibling.nextElementSibling;
    const feedback = this.parentElement.nextElementSibling;
   const regex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
   if(!this.value.match(regex)){
       invalid.style.display = "block";
       feedback.style.display = "block";
       valid.style.display = "none";
       pwdValid = false;
   }else{
       invalid.style.display = "none";
       feedback.style.display = "none";
       valid.style.display = "block";
       pwdValid = true;
   }
    allValid();
});

pwdConfirmUser.addEventListener("change", function (){
    const valid = this.nextElementSibling;
    const invalid = this.nextElementSibling.nextElementSibling;
    const feedback = this.parentElement.nextElementSibling;
    if(this.value !== pwdUser.value){
        invalid.style.display = "block";
        feedback.style.display = "block";
        valid.style.display = "none";
        pwdConfirmValid = false;
    }else{
        invalid.style.display = "none";
        feedback.style.display = "none";
        valid.style.display = "block";
        pwdConfirmValid = true;
    }
    allValid();
});
dbsUser.addEventListener("change", function() {
    const valid = this.nextElementSibling;
    const invalid = this.nextElementSibling.nextElementSibling;
    const feedback = this.parentElement.nextElementSibling;
   if(this.value === "") {
       invalid.style.display = "block";
       feedback.style.display = "block";
       valid.style.display = "none";
       dbsValid = false;
   }else{
       invalid.style.display = "none";
       feedback.style.display = "none";
       valid.style.display = "block";
       dbsValid = true;
   }
    allValid();
});

rgpdUser.addEventListener("change", function() {
    const feedback = this.nextElementSibling.nextElementSibling;
    if(!this.checked) {
        feedback.style.display = "block";
        rgpdValid = false;
    }else{
        feedback.style.display = "none";
        rgpdValid = true;
    }
    allValid();
});

formSignup.addEventListener("submit", function(e) {
    e.preventDefault();
    if(nameValid && lastNameValid && emailValid && pwdValid && pwdConfirmValid && dbsValid  && rgpdValid) {
        alert("Message envoyer");
        location.href = "index.php";
    }else{
        const eventErrors = new Event("change");
        nameValid.dispatchEvent(eventErrors);
        lastNameValid.dispatchEvent(eventErrors);
        emailValid.dispatchEvent(eventErrors);
        pwdValid.dispatchEvent(eventErrors);
        pwdConfirmValid.dispatchEvent(eventErrors);
        dbsValid.dispatchEvent(eventErrors);
        rgpdValid.dispatchEvent(eventErrors);
    }
});