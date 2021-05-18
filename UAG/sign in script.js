const signInForm = document.getElementById('signInForm');
const username = document.getElementById('signInUsername');
const email = document.getElementById('email');
const password = document.getElementById('password');
const passwordMatch = document.getElementById('passwordMatch');

signInForm.addEventListener('submit', e => {
	
   
	if(checkSignInInputs() == false) {
		e.preventDefault();
        checkSignInInputs()
	} else {
		
	}
});

function checkSignInInputs() {
	// trim to remove the whitespaces
	const usernameValue = username.value.trim();
	const emailValue = email.value.trim();
	const passwordValue = password.value;
    const passwordMatchValue = passwordMatch.value;

	var usernameSuccessBool = false;
	var emailSuccessBool = false;
	var passwordSuccessBool = false;
    var passwordMatchSuccessBool = false;
	
    
	if(usernameValue === '' || usernameValue === null) {
        
		setErrorFor(username, 'Username cannot be blank');
        usernameSuccessBool = false;
	} else {
		setSuccessFor(username);
		usernameSuccessBool = true;
	}
	
	if(emailValue === '' || emailValue === null) {
		setErrorFor(email, 'Email cannot be blank');
	} else if (!isEmail(emailValue)) {
		setErrorFor(email, 'Not a valid email');
	} else {
		setSuccessFor(email);
		emailSuccessBool = true;
	}
	
	if(passwordValue === '' || passwordValue === null) {
		setErrorFor(password, 'Password cannot be blank');
	} else if (passwordValue.length < 8){
        setErrorFor(password, 'Password length can not be shorter than 8 charachters');
    }else {
		setSuccessFor(password);
		passwordSuccessBool = true;
	}

    if(passwordValue != passwordMatchValue) {
		setErrorFor(passwordMatch, 'Passwords does not match');
	} else {
		setSuccessFor(passwordMatch);
		passwordMatchSuccessBool = true;
	}

	if (usernameSuccessBool == true && emailSuccessBool == true && passwordSuccessBool == true && passwordMatchSuccessBool == true) {
       
		return true;
	} else {
       
		return false;
	}

}

function setErrorFor(input, message) {
	const formControl = input.parentElement;
	const small = formControl.querySelector('small');
	formControl.className = 'form-control error';
	small.innerText = message;
}

function setSuccessFor(input) {
	const formControl = input.parentElement;
	formControl.className = 'form-control success';
}
	
function isEmail(email) {
	return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}

