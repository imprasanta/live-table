<!DOCTYPE html>
<html lang="en">
<head>
    <title>Live Table - Ajax</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device=width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .error { color: red; }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>Live Table</h2> <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 table-responsive">
                <div id="live-data"></div>
            </div>
        </div>
    </div>


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            /*Select data*/
            function fetch_data() {
                $.ajax({
                    url: "select.php",
                    method: "POST",
                    success: function($data) {
                        $('#live-data').html($data);
                    }
                });
            } //select data close
            fetch_data(); //call to select


            /*add data*/
            $(document).on('click', '#btn_add', function() {
                var first_name = $('#first_name').text();
                var last_name = $('#last_name').text();
                var email_address = $('#email_address').text();
                if (first_name == '') {
                    alert("Enter First Name");
                    return false;
                }
                if (last_name == '') {
                    alert("Enter Last Name");
                    return false;
                }
                if (email_address == '') {
                    alert("Enter Email Address");
                    return false;
                }
                $.ajax({
                    url: "insert.php",
                    method: "POST",
                    data: {first_name:first_name, last_name:last_name, email_address:email_address},
                    dataType: "text",
                    success: function($data) {
                        alert($data);
                        fetch_data();
                    }
                });
            }); //add data close

            /*edit data*/
            function edit_data(id, text, column_name) {

                $.ajax({
                    url: "edit.php",
                    method: "POST",
                    data: {id:id, text:text, column_name:column_name},
                    dataType: "text",
                    success: function($data) {
                        alert($data);
                    }
                });
            }//edit data close

            $(document).on('blur', '.first_name', function() {
                var id = $(this).data('id1');
                var first_name = $(this).text();
                edit_data(id, first_name, "fname");
            });

            $(document).on('blur', '.last_name', function() {
                var id = $(this).data('id2');
                var last_name = $(this).text();
                edit_data(id, last_name, "lname");
            });

            $(document).on('blur', '.email_address', function() {
                var id = $(this).data('id3');
                var email_address = $(this).text();
                edit_data(id, email_address, "email");
            });

            /*delete date*/
            $(document).on('click','#btn_delete', function() {
                var id = $(this).data('id4');
                if (confirm("Are you sure, you want to delete this?")){
                    $.ajax({
                        url: "delete.php",
                        method: "POST",
                        data: {id:id},
                        dataType: "text",
                        success: function(data) {
                            alert(data);
                            fetch_data();
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>