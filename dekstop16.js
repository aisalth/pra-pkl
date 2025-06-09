// Modal functionality - pastikan ini di bagian paling atas atau dalam DOMContentLoaded
document.addEventListener('DOMContentLoaded', function() {
    
    // Navbar dan search functionality
    let navbar = document.querySelector('.navbar');
    let searchForm = document.querySelector('.search-form');

    const menuBtn = document.querySelector('#menu-btn');
    const searchIcon = document.querySelector('#search-icon');

    if (menuBtn) {
        menuBtn.onclick = () => {
            navbar.classList.toggle('active');
            if (searchForm) searchForm.classList.remove('active');
        }
    }

    if (searchIcon) {
        searchIcon.onclick = () => {
            if (searchForm) searchForm.classList.toggle('active');
            navbar.classList.remove('active');
        }
    }

    // Heart buttons functionality
    const heartButtons = document.querySelectorAll('.heart-btn');
    heartButtons.forEach(button => {
        button.addEventListener('click', function() {
            this.classList.toggle('active');
            const icon = this.querySelector('i');
            if (this.classList.contains('active')) {
                icon.classList.remove('fa-regular');
                icon.classList.add('fa-solid');
            } else {
                icon.classList.remove('fa-solid');
                icon.classList.add('fa-regular');
            }
        });
    });

    // Payment tab functionality
    const paymentTabs = document.querySelectorAll('.payment-tab');
    paymentTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            paymentTabs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');
        });
    });

    // Checkout button
    const checkoutBtn = document.querySelector('.checkout-btn');
    if (checkoutBtn) {
        checkoutBtn.addEventListener('click', function() {
            alert('Order placed successfully!');
        });
    }

    // Payment option buttons
    const optionButtons = document.querySelectorAll('.option-btn');
    optionButtons.forEach(button => {
        button.addEventListener('click', () => {
            optionButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');
        });
    });

    // Radio button functionality
    const radioButton = document.getElementById('radio-button');
    const paymentMethod = document.querySelector('.payment-method');

    if (radioButton) {
        radioButton.addEventListener('click', () => {
            radioButton.classList.toggle('selected');
        });
    }

    if (paymentMethod) {
        paymentMethod.addEventListener('click', () => {
            if (radioButton) radioButton.classList.toggle('selected');
        });
    }

    // Add card button
    const addCardBtn = document.querySelector('.add-card-btn');
    if (addCardBtn) {
        addCardBtn.addEventListener('click', () => {
            alert('Tambah kartu baru');
        });
    }
}); 