document.addEventListener("DOMContentLoaded", function(){
    const inputPhoneNumberFormUser = document.getElementById('phone');
    function applyPhoneMask(phoneNumber) {
        return phoneNumber.replace(/\D/g, '')
            .replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
    }
    inputPhoneNumberFormUser.addEventListener("input", function(event){
        inputPhoneNumberFormUser.value = applyPhoneMask(inputPhoneNumberFormUser.value);
    })
})