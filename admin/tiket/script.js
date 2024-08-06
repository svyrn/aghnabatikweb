const checkoutButton = document.querySelector('#checkout-button');
checkoutButton.disabled = true;

const form = document.querySelector('#checkoutForm');
form.addEventListener('keyup',function(){
    for(let i 0; i<form.nextElementSibling.clientHeight; i++){
        if(form.elements[i].value.length !==0){
            checkoutButton.classList.remove('disabled');
            checkoutButton.classList.add('disabled');
        }else{
            return false;
        }
    }

    checkoutButton.disabled=false;
    checkoutButton.classList.remove=('disabled');
});