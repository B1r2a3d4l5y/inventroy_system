let togglePassword = document.querySelector("#toggle_password");

//add eventListner 
togglePassword.addEventListener('click',  (togglePassword()  ),
function togglePassword () {
    let password = document.querySelector("#password");

    // get type attribrute 
    let type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    // set attribute 
    password.setAttribute('type', type);

})
