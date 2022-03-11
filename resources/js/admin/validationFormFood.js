const registrationForm = document.getElementById('add_food_form');

window.validationFormFood = function(){

    let success = true;
    
    // controllo nome piatto

    if( registrationForm.name.value == '') {
        console.log('in nome non può essere vuoto');
        success = false;
    } else if( registrationForm.name.value.length > 100 ) {
        console.log('il nome non può superare i 100 caratteri');
        success = false;
    }

    // controllo prezzo piatto

    if( registrationForm.price.value == '') {
        console.log('Inserire il prezzo');
        success = false;
    } else if( isNaN(registrationForm.price.value) ) {
        console.log('il prezzo deve essere un numero');
        success = false;
    } else if( registrationForm.price.value < 0 || registrationForm.price.value > 999.90) {
        console.log('il prezzo deve essere compreso tra 0 e 999.90 €');
        success = false;
    }

    //controllo tipo selezionato
    const select = document.getElementById('types'); 
    if (!select.value) {
        isSelected = 'non selezionato';
        console.log('Selezionare almeno un tipo di piatto');
        success = false; 
    } 

    return success;
}