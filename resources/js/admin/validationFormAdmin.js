
//----------VALIDATION CATEGORY
const registrationFormCategory = document.getElementById('add_category_form');

window.validationFormCategory = function(){

    let success = true;
    
    // controllo nome categoria

    if( registrationFormCategory.name.value == '') {
        const categoryInputName = document.getElementById('category_input_name');

        registrationFormCategory.name.classList.add("input_error_js");
        categoryInputName.classList.remove("d-none");
        categoryInputName.innerHTML = 'Il nome non può essere vuoto';

        success = false;
    } else if( registrationFormCategory.name.value.length > 100 ) {
        const categoryInputName = document.getElementById('category_input_name');

        registrationFormCategory.name.classList.add("input_error_js");
        categoryInputName.classList.remove("d-none");
        categoryInputName.innerHTML = 'La categoria non può superare i 100 caratteri';

        success = false;
    } else if(success) {
        const categoryInputName = document.getElementById('category_input_name');

        registrationFormCategory.name.classList.remove("input_error_js");
        categoryInputName.classList.add("d-none");
    }

    return success;
}


//----------VALIDATION TYPE
const registrationFormType = document.getElementById('add_type_form');

window.validationFormType = function(){

    let success = true;
    
    // controllo nome tipo

    if( registrationFormType.name.value == '') {
        const typeInputName = document.getElementById('type_input_name');

        registrationFormType.name.classList.add("input_error_js");
        typeInputName.classList.remove("d-none");
        typeInputName.innerHTML = 'Il nome non può essere vuoto';

        success = false;
    } else if( registrationFormType.name.value.length > 30 ) {
        const typeInputName = document.getElementById('type_input_name');

        registrationFormType.name.classList.add("input_error_js");
        typeInputName.classList.remove("d-none");
        typeInputName.innerHTML = 'Il tipo non può superare i 30 caratteri';

        success = false;
    } else if(success) {
        const typeInputName = document.getElementById('type_input_name');

        registrationFormType.name.classList.remove("input_error_js");
        typeInputName.classList.add("d-none");
    }

    return success;
}


//----------VALIDATION TAG
const registrationFormTag = document.getElementById('add_tag_form');

window.validationFormTag = function(){

    let success = true;
    
    // controllo nome tag

    if( registrationFormTag.name.value == '') {
        const tagInputName = document.getElementById('tag_input_name');

        registrationFormTag.name.classList.add("input_error_js");
        tagInputName.classList.remove("d-none");
        tagInputName.innerHTML = 'Il nome non può essere vuoto';

        success = false;
    } else if( registrationFormTag.name.value.length > 30 ) {
        const tagInputName = document.getElementById('tag_input_name');

        registrationFormTag.name.classList.add("input_error_js");
        tagInputName.classList.remove("d-none");
        tagInputName.innerHTML = 'Il tag non può superare i 30 caratteri';

        success = false;
    } else if(success) {
        const tagInputName = document.getElementById('tag_input_name');

        registrationFormTag.name.classList.remove("input_error_js");
        tagInputName.classList.add("d-none");
    }

    return success;
}