$(document).ready(function() {
    $("#button").click(function() {
        var name = $("#name").val();
        /*$.get("info_store.php", {entered_name:name}, function(feedback) {
            $('.msg').html(feedback);
        });*/
        $.ajax({
            type: 'POST',
            url: 'info_store.php',
            data: {name:name},
            success: function(data) {
                $('.msg').html(data);
            }
        })

    })
})