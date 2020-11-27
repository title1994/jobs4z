$(document).ready(function() {
    $("#language-option").on("change", function() {
        window.location.href = $(this).val();
    });
});