$(document).ready(function () {
    $("#xodimForm").submit(function (e) {
        e.preventDefault();

        $.ajax({
            url: "process.php",
            type: "POST",
            data: $(this).serialize(),
            success: function (javob) {
                $("#natija").html(javob);
            }
        });
    });
});
