let logInBtn = document.getElementById('logInBtn');
let registerBtn = document.getElementById('registerBtnLink');
let registerModal = document.getElementById('registrationModal');
let logInModal = document.getElementById('loginModal');
let logInBtnLink = document.getElementById('logInModalLink');
let closeModalBtn = document.querySelectorAll('.login-cancel-btn');

closeModalBtn.forEach((el) => {
	el.addEventListener('click', function() {
		hideModal(el.closest('.modal-backdrop'));
	});
})

logInBtn.addEventListener('click', function () {
	showModal(registerModal);
});

registerBtn.addEventListener('click', function () {
	hideModal(logInModal);
	showModal(registerModal);
});

logInBtnLink.addEventListener('click', function () {
	hideModal(registerModal);
	showModal(logInModal);
});

function showModal(modal) {
	modal.classList.remove('hidden');
};

function hideModal(modal) {
	modal.classList.add('hidden');
};
