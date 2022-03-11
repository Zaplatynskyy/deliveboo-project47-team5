const registrationForm = document.getElementById('registration_form');

window.validationForm = function(){

    let success = true;

    let nameSentinel = true;
    let addressSentinel = true;
    let emailSentinel = true;
    let passwordSentinel = true;
    let pivaSentinel = true;
    let telephoneSentinel = true;
    let shippingSentinel = true;
    let minPriceSentinel = true;
    let categoriesSentinel = true;
    
    // controllo nome attività

    if( registrationForm.name.value == '') {
        const userInputName = document.getElementById('user_input_name');

        registrationForm.name.classList.add("input_error_js");
        userInputName.classList.remove("d-none");
        userInputName.innerHTML = 'Il nome non può essere vuoto';

        nameSentinel = false;
        success = false;
    } else if( registrationForm.name.value.length > 100 ) {
        const userInputName = document.getElementById('user_input_name');

        registrationForm.name.classList.add("input_error_js");
        userInputName.classList.remove("d-none");
        userInputName.innerHTML = 'Il nome non può superare i 100 caratteri';

        nameSentinel = false;
        success = false;
    } else if(nameSentinel) {
        const foodInputName = document.getElementById('user_input_name');

        registrationForm.name.classList.remove("input_error_js");
        foodInputName.classList.add("d-none");
    }

    // controllo indirizzo

    if( registrationForm.address.value == '') {
        const userInputAddress = document.getElementById('user_input_address');

        registrationForm.address.classList.add("input_error_js");
        userInputAddress.classList.remove("d-none");
        userInputAddress.innerHTML = 'L\'indirizzo non può essere vuoto';

        addressSentinel = false;
        success = false;
    } else if( registrationForm.address.value.length > 255 ) {
        const userInputAddress = document.getElementById('user_input_address');

        registrationForm.address.classList.add("input_error_js");
        userInputAddress.classList.remove("d-none");
        userInputAddress.innerHTML = 'L\'indirizzo non può superare i 255 caratteri';

        addressSentinel = false;
        success = false;
    } else if(addressSentinel) {
        const userInputAddress = document.getElementById('user_input_address');

        registrationForm.address.classList.remove("input_error_js");
        userInputAddress.classList.add("d-none");
    }

    // controllo email
    if( registrationForm.email ) {
        if( registrationForm.email.value == '' ) {
            const userInputEmail = document.getElementById('user_input_email');
    
            registrationForm.email.classList.add("input_error_js");
            userInputEmail.classList.remove("d-none");
            userInputEmail.innerHTML = 'La mail non può essere vuota';
    
            emailSentinel = false;
            success = false;
        } else if( registrationForm.email.value.length > 255 ) {
            const userInputEmail = document.getElementById('user_input_email');
    
            registrationForm.email.classList.add("input_error_js");
            userInputEmail.classList.remove("d-none");
            userInputEmail.innerHTML = 'La mail non può superare i 255 caratteri';
    
            emailSentinel = false;
            success = false;
        } else if(emailSentinel) {
            const userInputEmail = document.getElementById('user_input_email');
    
            registrationForm.email.classList.remove("input_error_js");
            userInputEmail.classList.add("d-none");
        }
    }


    // controllo password
    if( registrationForm.password ) {
        if( registrationForm.password.value == '' ) {
            const userInputPassword = document.getElementById('user_input_password');

            registrationForm.password.classList.add("input_error_js");
            userInputPassword.classList.remove("d-none");
            userInputPassword.innerHTML = 'La password non può essere vuota';

            passwordSentinel = false;
            success = false;
        } else if( registrationForm.password.value.length < 8 ) {
            const userInputPassword = document.getElementById('user_input_password');

            registrationForm.password.classList.add("input_error_js");
            userInputPassword.classList.remove("d-none");
            userInputPassword.innerHTML = 'La password deve contenere almeno 8 caratteri';

            passwordSentinel = false;
            success = false;
        } else if(passwordSentinel) {
            const userInputPassword = document.getElementById('user_input_password');

            registrationForm.password.classList.remove("input_error_js");
            userInputPassword.classList.add("d-none");
        }
    }

    // controllo p_iva

    if( registrationForm.p_iva.value == '' ) {
        const userInputPiva = document.getElementById('user_input_piva');

        registrationForm.p_iva.classList.add("input_error_js");
        userInputPiva.classList.remove("d-none");
        userInputPiva.innerHTML = 'La p_iva non può essere vuota';

        pivaSentinel = false;
        success = false;
    } else if( isNaN(registrationForm.p_iva.value) ) {
        const userInputPiva = document.getElementById('user_input_piva');

        registrationForm.p_iva.classList.add("input_error_js");
        userInputPiva.classList.remove("d-none");
        userInputPiva.innerHTML = 'La p_iva deve essere un numero';

        pivaSentinel = false;
        success = false;
    } else if( registrationForm.p_iva.value.length != 11 ) {
        const userInputPiva = document.getElementById('user_input_piva');

        registrationForm.p_iva.classList.add("input_error_js");
        userInputPiva.classList.remove("d-none");
        userInputPiva.innerHTML = 'La p_iva deve essere di 11 caratteri';

        pivaSentinel = false;
        success = false;
    } else if(pivaSentinel) {
        const userInputPiva = document.getElementById('user_input_piva');

        registrationForm.p_iva.classList.remove("input_error_js");
        userInputPiva.classList.add("d-none");
    }

    // controllo telefono

    if( registrationForm.telephone.value == '' ) {
        const userInputTelephone = document.getElementById('user_input_telephone');

        registrationForm.telephone.classList.add("input_error_js");
        userInputTelephone.classList.remove("d-none");
        userInputTelephone.innerHTML = 'Inserire il numero di telefono';

        telephoneSentinel = false;
        success = false;
    } else if( isNaN(registrationForm.telephone.value) ) {
        const userInputTelephone = document.getElementById('user_input_telephone');

        registrationForm.telephone.classList.add("input_error_js");
        userInputTelephone.classList.remove("d-none");
        userInputTelephone.innerHTML = 'Il telefono deve essere composto da numeri';

        telephoneSentinel = false;
        success = false;
    } else if( registrationForm.telephone.value.length < 8 || registrationForm.telephone.value.length > 11) {
        const userInputTelephone = document.getElementById('user_input_telephone');

        registrationForm.telephone.classList.add("input_error_js");
        userInputTelephone.classList.remove("d-none");
        userInputTelephone.innerHTML = 'Il telefono deve essere compreso tra gli 8 e gli 11 caratteri';

        telephoneSentinel = false;
        success = false;
    } else if(telephoneSentinel) {
        const userInputTelephone = document.getElementById('user_input_telephone');

        registrationForm.telephone.classList.remove("input_error_js");
        userInputTelephone.classList.add("d-none");
    }

    // controllo costo consegna

    if( isNaN(registrationForm.shipping.value) ) {
        const userInputShipping = document.getElementById('user_input_shipping');

        registrationForm.shipping.classList.add("input_error_js");
        userInputShipping.classList.remove("d-none");
        userInputShipping.innerHTML = 'Il costo consegna deve essere un numero';

        shippingSentinel = false;
        success = false;
    } else if(registrationForm.shipping.value != '') {
        if( registrationForm.shipping.value < 0.90 || registrationForm.shipping.value > 99.90) {
            const userInputShipping = document.getElementById('user_input_shipping');

            registrationForm.shipping.classList.add("input_error_js");
            userInputShipping.classList.remove("d-none");
            userInputShipping.innerHTML = 'Il costo consegna deve essere compreso tra i 0.90€ e i 99.90€';

            shippingSentinel = false;
            success = false;
        }
    } else if(shippingSentinel) {
        const userInputShipping = document.getElementById('user_input_shipping');

        registrationForm.shipping.classList.remove("input_error_js");
        userInputShipping.classList.add("d-none");
    }

    // controllo ordine minimo

    if( isNaN(registrationForm.min_price.value) ) {
        const userInputMinPrice = document.getElementById('user_input_min_price');

        registrationForm.min_price.classList.add("input_error_js");
        userInputMinPrice.classList.remove("d-none");
        userInputMinPrice.innerHTML = 'Il minimo ordine deve essere un numero';

        minPriceSentinel = false;
        success = false;
    } else if(registrationForm.min_price.value != '') {
        if( registrationForm.min_price.value < 0.90 || registrationForm.min_price.value > 99.90) {
            const userInputMinPrice = document.getElementById('user_input_min_price');

            registrationForm.min_price.classList.add("input_error_js");
            userInputMinPrice.classList.remove("d-none");
            userInputMinPrice.innerHTML = 'Il minimo ordine deve essere compresotra i 0.90€ e i 99.90€';

            minPriceSentinel = false;
            success = false;
        }
    } else if(minPriceSentinel) {
        const userInputMinPrice = document.getElementById('user_input_min_price');

        registrationForm.min_price.classList.remove("input_error_js");
        userInputMinPrice.classList.add("d-none");
    }

    // controllo categorie

    const inputChecks = document.querySelectorAll('.form-check-input:checked');

    if( inputChecks.length == 0 ) {
        const userInputCategories = document.getElementById('user_input_categories');
        userInputCategories.classList.remove("d-none");
        userInputCategories.innerHTML = 'Selezionare almeno una categoria';

        categoriesSentinel = false;
    } else if(categoriesSentinel) {
        const userInputCategories = document.getElementById('user_input_categories');
        
        userInputCategories.classList.add("d-none");
    }

    return success;

}