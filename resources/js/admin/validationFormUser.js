const registrationForm = document.getElementById('registration_form');

window.validationForm = function(){

    let success = true;
    
    // controllo nome attività

    if( registrationForm.name.value == '') {
        displayError('user_input_name', 'name', 'Il nome non può essere vuoto')

        success = false;
    } else if( registrationForm.name.value.length > 100 ) {
        displayError('user_input_name', 'name', 'Il nome non può superare i 100 caratteri');

        success = false;
    } else {
        removeError('user_input_name', 'name');
    }

    // controllo indirizzo

    if( registrationForm.address.value == '') {
        displayError('user_input_address', 'address', 'L\'indirizzo non può essere vuoto');

        success = false;
    } else if( registrationForm.address.value.length > 255 ) {
        displayError('user_input_address', 'address', 'L\'indirizzo non può superare i 255 caratteri');

        success = false;
    } else {
        removeError('user_input_address', 'address');
    }

    // controllo email
    if( registrationForm.email ) {
        if( registrationForm.email.value == '' ) {
            displayError('user_input_email', 'email', 'La mail non può essere vuota');
            
            success = false;
        } else if( registrationForm.email.value.length > 255 ) {
            displayError('user_input_email', 'email', 'La mail non può superare i 255 caratteri');

            success = false;
        } else {
            removeError('user_input_email', 'email');
        }
    }


    // controllo password
    if( registrationForm.password ) {
        if( registrationForm.password.value == '' ) {
            displayError('user_input_password', 'password', 'La password non può essere vuota');
            
            success = false;
        } else if( registrationForm.password.value.length < 8 ) {
            displayError('user_input_password', 'password', 'La password deve contenere almeno 8 caratteri');
            
            success = false;
        } else {
            removeError('user_input_password', 'password');
        }
    }

    // controllo p_iva

    if( registrationForm.p_iva.value == '' ) {
        displayError('user_input_piva', 'p_iva', 'La p_iva non può essere vuota');
        
        success = false;
    } else if( isNaN(registrationForm.p_iva.value) ) {
        displayError('user_input_piva', 'p_iva', 'La p_iva deve essere un numero');
        
        success = false;
    } else if( registrationForm.p_iva.value.length != 11 ) {
        displayError('user_input_piva', 'p_iva', 'La p_iva deve essere di 11 caratteri');
        
        success = false;
    } else {
        removeError('user_input_piva', 'p_iva');
    }

    // controllo telefono

    if( registrationForm.telephone.value == '' ) {
        displayError('user_input_telephone', 'telephone', 'Inserire il numero di telefono');
        
        success = false;
    } else if( isNaN(registrationForm.telephone.value) ) {
        displayError('user_input_telephone', 'telephone', 'Il telefono deve essere composto da numeri');
        
        success = false;
    } else if( registrationForm.telephone.value.length < 8 || registrationForm.telephone.value.length > 11) {
        displayError('user_input_telephone', 'telephone', 'Il telefono deve essere compreso tra gli 8 e gli 11 caratteri');
        
        success = false;
    } else {
        removeError('user_input_telephone', 'telephone');
    }

    // controllo costo consegna

    if( isNaN(registrationForm.shipping.value) ) {
        displayError('user_input_shipping', 'shipping', 'Il costo consegna deve essere un numero');
        
        success = false;
    } else if(registrationForm.shipping.value != '') {
        if( registrationForm.shipping.value < 0.90 || registrationForm.shipping.value > 99.90) {
            displayError('user_input_shipping', 'shipping', 'Il costo consegna deve essere compreso tra i 0.90€ e i 99.90€');
            
            success = false;
        }
    } else {
        removeError('user_input_shipping', 'shipping');
    }

    // controllo ordine minimo

    if( isNaN(registrationForm.min_price.value) ) {
        displayError('user_input_min_price', 'min_price', 'Il minimo ordine deve essere un numero');
        
        success = false;
    } else if(registrationForm.min_price.value != '') {
        if( registrationForm.min_price.value < 0.90 || registrationForm.min_price.value > 99.90) {
            displayError('user_input_min_price', 'min_price', 'Il minimo ordine deve essere compresotra i 0.90€ e i 99.90€');
            
            success = false;
        }
    } else {
        removeError('user_input_min_price', 'min_price');
    }

    // controllo categorie

    const inputChecks = document.querySelectorAll('.form-check-input:checked');

    if( inputChecks.length == 0 ) {
        const userInputCategories = document.getElementById('user_input_categories');
        userInputCategories.classList.remove("d-none");
        userInputCategories.innerHTML = 'Selezionare almeno una categoria';

    } else {
        const userInputCategories = document.getElementById('user_input_categories');
        
        userInputCategories.classList.add("d-none");
    }

    return success;

}

function displayError(errorId, inputId, errorMessage) {
    const inputError = document.getElementById(errorId);
    const inputType = document.getElementById(inputId);

    inputType.classList.add("input_error_js");
    inputError.classList.remove("d-none");
    inputError.innerHTML = errorMessage;
}

function removeError(errorId, inputId) {
    const inputError = document.getElementById(errorId);
    const inputType = document.getElementById(inputId);

    inputType.classList.remove("input_error_js");
    inputError.classList.add("d-none");
}