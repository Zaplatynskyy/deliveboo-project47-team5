const registrationForm = document.getElementById('add_food_form');

window.validationFormFood = function(){

    let success = true;

    // controllo nome piatto

    if( registrationForm.name.value == '') {
        displayError('food_input_name', 'name', 'Il nome non può essere vuoto');

        success = false;
    } else if( registrationForm.name.value.length > 100 ) {
        displayError('food_input_name', 'name', 'Il nome non può superare i 100 caratteri');

        success = false;
    } else {
        removeError('food_input_name', 'name');
    }

    // controllo prezzo piatto

    if( registrationForm.price.value == '') {
        displayError('food_input_price', 'price', 'Inserisci il prezzo');

        success = false;

    } else if( isNaN(registrationForm.price.value) ) {
        displayError('food_input_price', 'price', 'Il prezzo deve essere un numero');

        success = false;
    } else if( registrationForm.price.value < 0 || registrationForm.price.value > 999.90) {
        displayError('food_input_price', 'price', 'Il prezzo deve essere compreso tra 0 e 999.90 €');

        success = false;
    }else {
        removeError('food_input_price', 'price');
    }

    //controllo tipo selezionato
    const select = document.getElementById('types'); 
    if (!select.value) {
        displayError('food_input_type', 'types', 'Selezionare almeno un tipo di piatto');

        success = false; 
    } else {
        removeError('food_input_type', 'types');
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
