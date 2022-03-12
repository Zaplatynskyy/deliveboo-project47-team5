
//----------VALIDATION CATEGORY
const registrationFormCategory = document.getElementById('add_category_form');

window.validationFormCategory = function(){

    let success = true;
    
    // controllo nome categoria

    if( registrationFormCategory.name.value == '') {
        displayError('category_input_name', 'name', 'Il nome non può essere vuoto');

        success = false;
    } else if( registrationFormCategory.name.value.length > 100 ) {
        displayError('category_input_name', 'name', 'La categoria non può superare i 100 caratteri');

        success = false;
    } else {
        removeError('category_input_name', 'name');
    }

    return success;
}


//----------VALIDATION TYPE
const registrationFormType = document.getElementById('add_type_form');

window.validationFormType = function(){

    let success = true;
    
    // controllo nome tipo

    if( registrationFormType.name.value == '') {
        displayError('type_input_name', 'name', 'Il nome non può essere vuoto');

        success = false;
    } else if( registrationFormType.name.value.length > 30 ) {
        displayError('type_input_name', 'name', 'Il tipo non può superare i 30 caratteri');

        success = false;
    } else {
        removeError('type_input_name', 'name');
    }

    return success;
}


//----------VALIDATION TAG
const registrationFormTag = document.getElementById('add_tag_form');

window.validationFormTag = function(){

    let success = true;
    
    // controllo nome tag

    if( registrationFormTag.name.value == '') {
        displayError('tag_input_name', 'name', 'Il nome non può essere vuoto');

        success = false;
    } else if( registrationFormTag.name.value.length > 30 ) {
        displayError('tag_input_name', 'name', 'Il tag non può superare i 30 caratteri');

        success = false;
    } else {
        removeError('tag_input_name', 'name');
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