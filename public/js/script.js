const form = document.querySelector("form");
const emailInput = form.querySelector('input[name="email"]');
const confirmedpasswordInput = form.querySelector('input[name="confirmedPassword"]');


function isEmail(email) {
    return /\S+@\S+\.\S+/.test(email);

}

function arePasswordsSame(password, confirmedPassword) {
    return password ===confirmedPassword;

}

function markValidation(element, condition){
    !condition ? element.classList.add('no-valid') : element.classList.remove('no-valid');
}

function validateEmail() {
    setTimeout(function(){
            markValidation(emailInput, isEmail(emailInput.value))
        },
        1000
    );

}
function validatePassword() {
    setTimeout(function(){
            const condition = arePasswordsSame(
                confirmedpasswordInput.previousElementSibling.value,
                confirmedpasswordInput.value

            );
            markValidation(confirmedpasswordInput, condition)
        },
        1000
    );


}

emailInput.addEventListener('keyup', validateEmail );



confirmedpasswordInput.addEventListener('keyup',validatePassword );