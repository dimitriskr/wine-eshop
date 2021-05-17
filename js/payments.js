$(document).ready(function() {
    $("#success-alert").hide();
    $(this).on('click', '#payment-card', function (e) {
        $.post('/payment.php', {}, function (response) {
            window.location.href = 'https://stripe-payments-demo.appspot.com'
        })
    })
    $(this).on('click', '#payment-paypal', function (e) {
        $.post('/payment.php', {}, function (response) {
            window.location.href = 'https://www.paypal.com/uk/home'

            // redirect to https://www.paypal.com/uk/home
        })
    })
    $(this).on('click', '#payment-cash', function (e) {
        $.post('/payment.php', {}, function (response) {
            //  show message
            $("#success-alert").fadeTo(2000,500).slideUp(500, function () {
                $("#success-alert").slideUp(500);
            })
        })
    })
})
