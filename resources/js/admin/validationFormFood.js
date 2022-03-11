const registrationForm = document.getElementById('add_food_form');

window.validationFormFood = function(){

    let success = true;

    let nameSentinel = true;
    let priceSentinel = true;
    let typeSentinel = true;

    
    // controllo nome piatto

    if( registrationForm.name.value == '') {
        const foodInputName = document.getElementById('food_input_name');

        registrationForm.name.classList.add("input_error_js");
        foodInputName.classList.remove("d-none");
        foodInputName.innerHTML = 'Il nome non può essere vuoto';

        nameSentinel = false;
        success = false;
    } else if( registrationForm.name.value.length > 100 ) {
        const foodInputName = document.getElementById('food_input_name');

        registrationForm.name.classList.add("input_error_js");
        foodInputName.classList.remove("d-none");
        foodInputName.innerHTML = 'Il nome non può superare i 100 caratteri';

        nameSentinel = false;
        success = false;
    } else if(nameSentinel) {
        const foodInputName = document.getElementById('food_input_name');

        registrationForm.name.classList.remove("input_error_js");
        foodInputName.classList.add("d-none");
    }

    // controllo prezzo piatto

    if( registrationForm.price.value == '') {
        const foodInputPrice = document.getElementById('food_input_price');

        registrationForm.price.classList.add("input_error_js");
        foodInputPrice.classList.remove("d-none");
        foodInputPrice.innerHTML = 'Inserisci il prezzo';

        priceSentinel = false;
        success = false;

    } else if( isNaN(registrationForm.price.value) ) {
        const foodInputPrice = document.getElementById('food_input_price');

        registrationForm.price.classList.add("input_error_js");
        foodInputPrice.classList.remove("d-none");
        foodInputPrice.innerHTML = 'Il prezzo deve essere un numero';

        priceSentinel = false;
        success = false;
    } else if( registrationForm.price.value < 0 || registrationForm.price.value > 999.90) {
        const foodInputPrice = document.getElementById('food_input_price');

        registrationForm.price.classList.add("input_error_js");
        foodInputPrice.classList.remove("d-none");
        foodInputPrice.innerHTML = 'Il prezzo deve essere compreso tra 0 e 999.90 €';
        
        priceSentinel = false;
        success = false;
    }else if(priceSentinel) {
        const foodInputPrice = document.getElementById('food_input_price');

        registrationForm.price.classList.remove("input_error_js");
        foodInputPrice.classList.add("d-none");
    }

    //controllo tipo selezionato
    const select = document.getElementById('types'); 
    if (!select.value) {
        const foodInputType = document.getElementById('food_input_type');

        registrationForm.types.classList.add("input_error_js");
        foodInputType.classList.remove("d-none");
        foodInputType.innerHTML = 'Selezionare almeno un tipo di piatto';

        typeSentinel = false;
        success = false; 
    } else if(typeSentinel) {
        const foodInputType = document.getElementById('food_input_type');

        registrationForm.types.classList.remove("input_error_js");
        foodInputType.classList.add("d-none");
    }

    return success;
}

