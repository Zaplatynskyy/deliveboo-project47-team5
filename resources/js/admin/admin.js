require('./bootstrap');

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


$(document).ready(function () {
    $(".toastClicker").click(function () {
        $(".toast").toast("show");
    });
});


window.previewUpload = function (event) {
    if (event.target.files.length > 0) {
        var src = URL.createObjectURL(event.target.files[0]);
        var preview = document.querySelector(".my_image");
        preview.src = src;
        preview.style.display = "block";
    }
};

const buttonsToggle = document.getElementsByClassName("btnToggle");
const buttonDelete = document.querySelector(".my_button");
const buttonDeleteCategory = document.querySelector(".delete-category");
const buttonDeleteType = document.querySelector(".delete-type");
const buttonDeleteTag = document.querySelector(".delete-tag");
const item = document.getElementsByClassName("my_item");
let dataId;
let counter;

if (buttonsToggle != null) {
    for (let i = 0; i < buttonsToggle.length; i++) {
        buttonsToggle[i].addEventListener("click", function () {
            dataId = this.getAttribute("data-slug");
            counter = i;
        });
    }
}

if (buttonDelete != null) {
    buttonDelete.addEventListener("click", function () {
        console.log(dataId);
        axios({
            method: "delete",
            url: `foods/${dataId}`,
        })
            .then(function (response) {
                item[counter].classList.add("d-none");
            })
            .catch(function (error) {
                console.log(error);
            });
    });
}

if (buttonDeleteCategory != null) {
    buttonDeleteCategory.addEventListener("click", function () {
        console.log(dataId);
        axios({
            method: "delete",
            url: `categories/${dataId}`,
        })
            .then(function (response) {
                item[counter].classList.add("d-none");
            })
            .catch(function (error) {
                console.log(error);
            });
    });
}

if (buttonDeleteType != null) {
    buttonDeleteType.addEventListener("click", function () {
        console.log(dataId);
        axios({
            method: "delete",
            url: `types/${dataId}`,
        })
            .then(function (response) {
                item[counter].classList.add("d-none");
            })
            .catch(function (error) {
                console.log(error);
            });
    });
}

if (buttonDeleteTag != null) {
    buttonDeleteTag.addEventListener("click", function () {
        console.log(dataId);
        axios({
            method: "delete",
            url: `tags/${dataId}`,
        })
            .then(function (response) {
                item[counter].classList.add("d-none");
            })
            .catch(function (error) {
                console.log(error);
            });
    });
}

const editToggle = document.getElementsByClassName("toggleForm");
const submitForm = document.getElementsByClassName("submitForm");
const categoryName = document.getElementsByClassName("name");
const categoryNameEdit = document.getElementsByClassName("name-input");
const editForm = document.getElementsByClassName("edit-form");

if (editToggle != null && submitForm != null) {
    for (let i = 0; i < editToggle.length; i++) {
        editToggle[i].addEventListener("click", function () {
            const invalidInput = document.querySelector('.my_validation');
            if(invalidInput != undefined) {
                const alertDanger = document.querySelector('.alert-danger');
                const invalidSubmit = document.querySelector('.failed-validation.submitForm');
                const invalidName = document.querySelector('div.name-input');
                const oldName = invalidInput.getAttribute('data-old-name')
                invalidInput.setAttribute('value', oldName);
                invalidInput.classList.remove('is-invalid');
                invalidName.classList.add('d-none');
                alertDanger.classList.remove('d-flex');
                alertDanger.classList.add('d-none');
                invalidSubmit.classList.add('d-none');
            }
            for (let key of editToggle) {
                key.classList.remove("d-none");
            }
            for (let key of submitForm) {
                key.classList.add("d-none");
            }
            this.classList.add("d-none");
            submitForm[i].classList.remove("d-none");
            for (let key of categoryName) {
                key.classList.remove("d-none");
            }
            for (let key of categoryNameEdit) {
                key.classList.add("d-none");
            }
            categoryName[i].classList.add("d-none");
            categoryNameEdit[i].classList.remove("d-none");
        });
    }
    for (let i = 0; i < submitForm.length; i++) {
        submitForm[i].addEventListener("click", function () {
            editForm[i].submit();
        });
    }
}
