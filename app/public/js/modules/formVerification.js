function formVerification(){
    let emailValid = sujetValid = messageValid = false;

    const btnSubmit = document.querySelector('#contacts_form_Envoyer');

    const email = document.querySelector('#contacts_form_email');
    email.addEventListener("change", function(){
        const regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if(!regex.test(email.value)){
            this.classList.add("is-invalid");
            this.classList.remove("is-invalid");
        }
    });
    console.dir(email);
}

formVerification();
