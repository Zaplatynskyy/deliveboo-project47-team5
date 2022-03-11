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
