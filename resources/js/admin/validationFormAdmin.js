
//----------VALIDATION CATEGORY
const registrationFormCategory = document.getElementById('add_category_form');

window.validationFormCategory = function(){

    let success = true;
    
    // controllo nome categoria

    if( registrationFormCategory.name.value == '') {
        console.log('la categoria non può essere vuota');
        success = false;
    } else if( registrationFormCategory.name.value.length > 100 ) {
        console.log('la categoria non può superare i 100 caratteri');
        success = false;
    }

    return success;
}


//----------VALIDATION TYPE
const registrationFormType = document.getElementById('add_type_form');

window.validationFormType = function(){

    let success = true;
    
    // controllo nome tipo

    if( registrationFormType.name.value == '') {
        console.log('Il tipo non può essere vuoto');
        success = false;
    } else if( registrationFormType.name.value.length > 30 ) {
        console.log('Il tipo non può superare i 30 caratteri');
        success = false;
    }

    return success;
}


//----------VALIDATION TAG
const registrationFormTag = document.getElementById('add_tag_form');

window.validationFormTag = function(){

    let success = true;
    
    // controllo nome tag

    if( registrationFormTag.name.value == '') {
        console.log('Il tag non può essere vuoto');
        success = false;
    } else if( registrationFormTag.name.value.length > 30 ) {
        console.log('Il tag non può superare i 30 caratteri');
        success = false;
    }

    return success;
}