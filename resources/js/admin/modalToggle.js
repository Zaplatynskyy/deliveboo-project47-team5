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
    }
};

window.previewCreateCategory = function (event) {
    if (event.target.files.length > 0) {
        var src = URL.createObjectURL(event.target.files[0]);
        var preview = document.querySelector(".my_image_create");
        preview.src = src;
        preview.classList.remove('d-none')
    }
};

window.previewUploadCategory = function (event, i) {
    if (event.target.files.length > 0) {
        var src = URL.createObjectURL(event.target.files[0]);
        var preview = document.querySelectorAll(".my_image");
        preview[i].src = src;
    }
};

window.toggleFile = function (input) {
    const createCategoryFile = document.querySelector(".create-img")
    if(input.value == '') {
        createCategoryFile.classList.remove("d-inline-flex", "justify-content-center", "align-items-center", "flex-wrap")
        createCategoryFile.classList.add("d-none")
    } else {
        createCategoryFile.classList.remove("d-none")
        createCategoryFile.classList.add("d-inline-flex", "justify-content-center", "align-items-center", "flex-wrap")

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
        axios({
            method: "delete",
            url: `foods/${dataId}`,
        })
            .then(function (response) {
                item[counter].classList.add("d-none");
            })
            .catch(function (error) {
            });
    });
}

if (buttonDeleteCategory != null) {
    buttonDeleteCategory.addEventListener("click", function () {
        axios({
            method: "delete",
            url: `categories/${dataId}`,
        })
            .then(function (response) {
                item[counter].classList.add("d-none");
            })
            .catch(function (error) {
            });
    });
}

if (buttonDeleteType != null) {
    buttonDeleteType.addEventListener("click", function () {
        axios({
            method: "delete",
            url: `types/${dataId}`,
        })
            .then(function (response) {
                item[counter].classList.add("d-none");
            })
            .catch(function (error) {
            });
    });
}

if (buttonDeleteTag != null) {
    buttonDeleteTag.addEventListener("click", function () {
        axios({
            method: "delete",
            url: `tags/${dataId}`,
        })
            .then(function (response) {
                item[counter].classList.add("d-none");
            })
            .catch(function (error) {
            });
    });
}