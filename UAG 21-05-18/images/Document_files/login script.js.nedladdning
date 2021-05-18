
const loginForm = document.getElementById('loginForm');
const username = document.getElementById('loginUsername');
const password = document.getElementById('loginPassword');



loginForm.addEventListener('submit', e => {
    
	if(checkLoginInputs() == false) {
		e.preventDefault();
	} else {
		
	}
});

function checkLoginInputs() {
	// trim to remove the whitespaces
	const usernameValue = username.value.trim();
	const passwordValue = password.value.trim();

	var usernameSuccessBool = false;
	var passwordSuccessBool = false;
	
    
	if(usernameValue === '' || usernameValue === null) {
		
		setErrorFor(username, 'Username cannot be blank');
	} else {
		setSuccessFor(username);
		usernameSuccessBool = true;
	}
	
	if(passwordValue === '' || passwordValue === null) {
		setErrorFor(password, 'Password cannot be blank');
	} else {
		setSuccessFor(password);
		passwordSuccessBool = true;
	}

	if (usernameSuccessBool == true && passwordSuccessBool == true) {
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
	


