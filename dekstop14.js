$(document).ready(function () {
    function updateQty(element, newQty) {
        var id_product = element.closest('.item').find('input[name="id_product"]').val();
        $.ajax({
            method: "POST",
            url: "cart.php",
            data: {
                update_qty: true,
                id_product: id_product,
                quantity: newQty
            },
            success: function (response) {
                console.log("Kuantitas diperbarui:", response);
            },
            error: function (xhr, status, error) {
                console.error("Error saat update kuantitas:", error);
            }
        });
    }

    function updateGrandTotal() {
        let grandTotal = 0;
        $('.summary-row').each(function () {
            const price = parseInt($(this).data('item-price'));
            const qty = parseInt($(this).find('.newQty').val());
            const total = price * qty;
            grandTotal += total;
        });

        $('.summary-row span:last-child').text('Rp ' + grandTotal);
    }

    $('.increase-btn').on('click', function (e) {
        e.preventDefault();
        var input = $(this).closest('.quantity-control').find('.quantity-input');
        var value = parseInt(input.val(), 10) || 0;
        if (value < 10) {
            value++;
            input.val(value);
            updateQty($(this), value);
        }
    });

    $('.decrease-btn').on('click', function (e) {
        e.preventDefault();
        var input = $(this).closest('.quantity-control').find('.quantity-input');
        var value = parseInt(input.val(), 10) || 0;
        if (value > 1) {
            value--;
            input.val(value);
            updateQty($(this), value);
        }
    });
});

const openBtn = document.getElementById("openModal");
const closeBtn = document.getElementById("closeModal");
const modal = document.getElementById("modal");

openBtn.addEventListener("click", () => {
    modal.classList.add("open");
});

closeBtn.addEventListener("click", () => {
    modal.classList.remove("open");
});