function connexion() {
    let emailValid = false;
    const btnSubmit = document.querySelector("#registration_form_Inscription");

    function toutValid() {
        btnSubmit.disabled = !(emailValid);
    }

    const email = document.querySelector("#username");
    email.addEventListener("change", function () {
        const regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if (!regex.test(email.value)) {
            this.classList.add("is-invalid");
            this.classList.remove("is-valid");
            emailValid = false;
        } else {
            this.classList.remove("is-invalid");
            this.classList.add("is-valid");
            emailValid = true;
        }
        toutValid();
    });

    const form = document.querySelector("#connexion");
    form.addEventListener("submit", function (e) {
        e.preventDefault();
        if (emailValid) {
            btnSubmit.removeAttribute("disabled");
            form.submit();
        } else {
            const evenement = new Event("change");
            email.dispatchEvent(evenement);
            subject.dispatchEvent(evenement);
            message.dispatchEvent(evenement);
            gpdr.dispatchEvent(evenement);
        }
    });
}

connexion();