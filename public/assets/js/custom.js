$(document).ready(function() {
    $("#language-option").on("change", function() {
        window.location.href = $(this).val();
    });

    $("#payment_option").on("change", function(){
        if ($("#payment_option").val() == 1){
            $(".card_visible").show();
            $("#payment-form").attr("action", $("#credit-action").val());         
        }else{
            $(".card_visible").hide();
            $("#payment-form").attr("action", $("#paypal-action").val());
        }
    })

    $("#payBtn").on("click", function(e) {
        e.preventDefault();
        if ($("#payment_option").val() == 1){
            var flag = true;
            $(".card_visible input").each(function() {
                if ($(this).val() == "") {
                    flag = false;
                }
            })
            if (flag) {
                $("#payment-form").submit();
            } else {
                alert("Please fill out the input fields.");
            }
        } else {
            $("#payment-form").submit();
        }
    });
});