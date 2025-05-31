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

let cartItem = document.querySelector('.cart-items-container');

document.querySelector('#shopping-cart-icon').onclick = () => {
    cartItem.classList.toggle('active');
    navbar.classList.remove('active');
    searchForm.classList.remove('active');
}

window.onscroll = () => {
    navbar.classList.remove('active');
    searchForm.classList.remove('active');
    cartItem.classList.remove('active');
}

document.querySelectorAll('.add-to-chart').forEach(button => {
    button.addEventListener('click', () => {
        alert('Produk ditambahkan ke keranjang!');
    });
});

 // Add click event listeners to all menu items
 document.querySelectorAll('.menu-item').forEach(item => {
    item.addEventListener('click', function() {
        // Toggle active class on the clicked item
        this.classList.toggle('active');
    });
});

let iconCart = document.querySelector('cart-btn');
let closeCart = document.querySelector('.close');  
let body = document.querySelector('body');        

// iconCart.addEventListener('click', () => {
//   body.classList.toggle('showCart'); // tambahkan atau hilangkan class 'showCart'
// });

closeCart.addEventListener('click', () => {
  body.classList.toggle('showCart'); 
});


    $('.add_to_cart').click(function (e) {
        e.preventDefault();

        
        var item = $(this).closest('.product-area');
        var nama = item.find('.product-name').text();
        var harga = item.find('.product-price').text();
        var gambar = item.find('.product-image').attr('src');
        var id_product = $(this).data('id');

        $.ajax({
            method: "POST",
            url: "product.php",
            data: {
                add_to_cart: true,
                nama: nama,
                harga: harga,
                gambar: gambar,
                id_product: id_product
            },
            success: function (response) {
                alert(response);
            }
            // dataType: "dataType",
            // succes: function (response){

            // }
        })
    })