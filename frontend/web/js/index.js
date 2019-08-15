let logInBtn = document.getElementById('logInBtn');
let registerBtn = document.getElementById('registerBtnLink');
let registerModal = document.getElementById('registrationModal');
let logInModal = document.getElementById('loginModal');
let logInBtnLink = document.getElementById('logInModalLink');
let closeModalBtn = document.querySelectorAll('.login-cancel-btn');
let deleteBasketItem = document.querySelectorAll(".basket-item-delete");
let productCounterBtn = document.querySelectorAll(".product-counter-btn");
console.log(logInBtnLink == true);

if(closeModalBtn.length){

	closeModalBtn.forEach((el) => {
		el.addEventListener('click', function() {
			hideModal(el.closest('.modal-backdrop'));
		});
	})
};

if(logInBtn){
	logInBtn.addEventListener('click', function () {
		showModal(registerModal);
	});
};

if(registerBtn) {
	registerBtn.addEventListener('click', function () {
		hideModal(logInModal);
		showModal(registerModal);
	});
};

if(logInBtnLink) {
	logInBtnLink.addEventListener('click', function () {
		hideModal(registerModal);
		showModal(logInModal);
	});
};

if(deleteBasketItem.length){
	deleteBasketItem.forEach(item => {
		item.addEventListener("click", () => {
			item.closest(".basket-item").remove();
		});
	});
};

if(productCounterBtn){
	productCounterBtn.forEach(counter => {
		counter.addEventListener("click", () => {
			const countInput = counter
				.parentNode
				.querySelector(".product-counter-value");
			if (counter.classList.contains("increase")) {
				countInput.value++;
			} else {
				if(countInput.value >= 2){
					countInput.value--;
				} else return;
			}
		});
	});
};


(function addNewAdreesInput(){
	const addNewBtnInputBtn =  document.getElementById('addNewAdress');
	if(addNewBtnInputBtn){
		addNewBtnInputBtn.addEventListener('click', () => {
			let newInput = document.createElement('label');
			newInput.className = 'section-profile-content-label';
			newInput.innerHTML = 'Your adress <input type="text" placeholder="Your adress" class="section-profile-content-input" value=""/>'

			document.getElementById('formAdresses').insertBefore(newInput, addNewBtnInputBtn);
		})
	}
})();

(function profileTabs() {
	const allTabs = document.querySelectorAll(
		".section-profile-navmenu-item"
	);
	console.log(allTabs)
	const tabsContent = document.querySelectorAll('.section-profile-content-item');
	let target = "";
	allTabs.forEach(item => {
		item.addEventListener("click", () => {
			allTabs.forEach(item => {
				item.classList.remove("active");
			});
			item.classList.add("active");
			target = item.dataset.target;
			tabsContent.forEach(item => {
				item.classList.remove('active');
				if(item.dataset.target === target) {
					item.classList.add('active');
				}
			})
		});
	});

})();

(function productTabs() {
	const allTabs = document.querySelectorAll(
		".product-tabs-options li"
	);
	const tabsContent = document.querySelectorAll('.product-tabs-item');
	let target = "";
	allTabs.forEach(item => {
		item.addEventListener("click", () => {
			allTabs.forEach(item => {
				item.classList.remove("active");
			});
			item.classList.add("active");
			target = item.dataset.target;
			tabsContent.forEach(item => {
				item.classList.remove('active');
				if(item.dataset.target === target) {
					item.classList.add('active');
				}
			})
		});
	});

})();

function showModal(modal) {
	modal.classList.remove('hidden');
};

function hideModal(modal) {
	modal.classList.add('hidden');
};
