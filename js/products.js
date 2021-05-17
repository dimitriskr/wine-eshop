$(document).ready(function() {
    $("#success-alert").hide();
    $(this).on('click', '#button-add-cart', function (e) {
        let $product_id = $(this).data('prod-id');
        $.post('add-to-cart.php', {product_id: $product_id}, function (response) {
            $("#success-alert").fadeTo(2000,500).slideUp(500, function () {
                $("#success-alert").slideUp(500);
            })
        })
        })
    })
