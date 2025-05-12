let navbar = document.querySelector('.navbar');

document.querySelector('#menu-btn').onclick = () => {
    navbar.classList.toggle('active');
    searchForm.classList.remove('active');
    cartItem.classList.remove('active');
}

let searchForm = document.querySelector('.search-form');

document.querySelector('#search-icon').onclick = () => {
    searchForm.classList.toggle('active');
    navbar.classList.remove('active');
    cartItem.classList.remove('active');
}

document.addEventListener('DOMContentLoaded', function() {
    // Get all heart buttons
    const heartButtons = document.querySelectorAll('.heart-btn');
    
    // Add click event listener to each heart button
    heartButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Toggle active class
            this.classList.toggle('active');
            
            // Change icon based on active state
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
});

ddocument.addEventListener('DOMContentLoaded', function () {
    const selectAllCheckbox = document.getElementById('select-all-checkbox');
    const itemCheckboxes = document.querySelectorAll('.item-checkbox');
    const decreaseButtons = document.querySelectorAll('.decrease-btn');
    const increaseButtons = document.querySelectorAll('.increase-btn');
    const quantityInputs = document.querySelectorAll('.quantity-input');
    
    // Update subtotal saat checkbox berubah
    function updateTotalPrice() {
        let total = 0;
        document.querySelectorAll('.item').forEach(item => {
            const checkbox = item.querySelector('.item-checkbox');
            if (checkbox && checkbox.checked) {
                const priceText = item.querySelector('.item-price').textContent;
                const quantity = parseInt(item.querySelector('.quantity-input').value);
                const price = parseInt(priceText.replace(/\D/g, ''));
                total = price * quantity;
            }
        });

        const formattedTotal = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(total).replace('IDR', 'Rp');

        document.querySelector('.summary-row span:last-child').textContent = formattedTotal;
    }

    // Event tombol +
    increaseButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const input = this.parentElement.querySelector('.quantity-input');
            let value = parseInt(input.value) || 1;
            input.value = value + 1;
            updateTotalPrice();
        });
    });

    // Event tombol -
    decreaseButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const input = this.parentElement.querySelector('.quantity-input');
            let value = parseInt(input.value) || 1;
            if (value > 1) {
                input.value = value - 1;
                updateTotalPrice();
            }
        });
    });

    // Event perubahan manual input jumlah
    quantityInputs.forEach(input => {
        input.addEventListener('change', function () {
            let value = parseInt(this.value);
            if (isNaN(value) || value < 1) {
                this.value = 1;
            }
            updateTotalPrice();
        });
    });

    // Event perubahan checkbox item
    itemCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateTotalPrice);
    });

    // Select all
    if (selectAllCheckbox) {
        selectAllCheckbox.addEventListener('change', function () {
            itemCheckboxes.forEach(cb => cb.checked = this.checked);
            updateTotalPrice();
        });
    }

    // Inisialisasi total saat halaman dimuat
    updateTotalPrice();
});