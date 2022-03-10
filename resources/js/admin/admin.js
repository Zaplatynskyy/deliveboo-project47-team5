require('./bootstrap');

//-----------------VALIDATION FORM REGISTRATION

const registrationForm = document.getElementById('registration_form');

window.validationForm = function(){

    

    let success = true;
    
    // controllo nome attività

    if( registrationForm.name.value == '') {
        console.log('in nome non può essere vuoto');
        success = false;
    } else if( registrationForm.name.value.length > 100 ) {
        console.log('il nome non può superare i 100 caratteri');
        success = false;
    }

    // controllo email

    if( registrationForm.email.value == '' ) {
        console.log('la mail non può essere vuoto');
        success = false;
    } else if( registrationForm.email.value.length > 255 ) {
        console.log('la mail non può superare i 255 caratteri');
        success = false;
    }

    // controllo password

    if( registrationForm.password.value == '' ) {
        console.log('la password non può essere vuota');
        success = false;
    } else if( registrationForm.password.value.length < 8 ) {
        console.log('la password deve contenere almeno 8 caratteri');
        success = false;
    }

    // controllo p_iva

    if( registrationForm.p_iva.value == '' ) {
        console.log('la p_iva non può essere vuoto');
        success = false;
    } else if( isNaN(registrationForm.p_iva.value) ) {
        console.log('la p_iva deve essere un numero');
        success = false;
    } else if( registrationForm.p_iva.value.length != 11 ) {
        console.log('la p_iva deve essere di 11 caratteri');
        success = false;
    }

    // controllo telefono

    if( registrationForm.telephone.value == '' ) {
        console.log('la telephone non può essere vuoto');
        success = false;
    } else if( isNaN(registrationForm.telephone.value) ) {
        console.log('la telephone deve essere un numero');
        success = false;
    } else if( registrationForm.telephone.value.length < 8 || registrationForm.telephone.value.length > 11) {
        console.log('la telephone deve essere compreso tra gli 8 e gli 11 caratteri');
        success = false;
    }

    // controllo costo consegna

    if( isNaN(registrationForm.shipping.value) ) {
        console.log('la shipping deve essere un numero');
        success = false;
    } else if(registrationForm.shipping.value != '') {
        if( registrationForm.shipping.value < 0.90 || registrationForm.shipping.value > 99.90) {
            console.log('la shipping deve essere compreso tra gli 8 e gli 11 caratteri');
            success = false;
        }
    }

    // controllo ordine minimo

    if( isNaN(registrationForm.min_price.value) ) {
        console.log('la min_price deve essere un numero');
        success = false;
    } else if(registrationForm.min_price.value != '') {
        if( registrationForm.min_price.value < 0.90 || registrationForm.min_price.value > 99.90) {
            console.log('la min_price deve essere compreso tra gli 8 e gli 11 caratteri');
            success = false;
        }
    }

    // controllo categorie

    const inputChecks = document.querySelectorAll('.form-check-input:checked');

    if( inputChecks.length == 0 ) {
        console.log('selezionare almeno una categoria');
    }

    return success;

}

//-----------------PREVIEW IMAGE

window.previewUpload = function (event) {
    if (event.target.files.length > 0) {
        var src = URL.createObjectURL(event.target.files[0]);
        var preview = document.querySelector(".my_image");
        preview.src = src;
        preview.style.display = "block";
    }
};