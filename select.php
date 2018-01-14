<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "w3dbi";

    $connect = mysqli_connect($servername, $username, $password, $dbname);
    $output = ' ';
    $sql = "select * from person ";
    $result = mysqli_query($connect, $sql);
    $output .= '<div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                           <th width="10%">ID</th>
                           <th width="20%">First Name</th>
                           <th width="20%">Last Name</th>
                           <th width="40%">Email Address</th>
                           <th width="10%">Delete</th>
                        </tr>';

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $output .= '<tr>
                            <td>'.$row["id"].'</td>
                            <td class="first_name" data-id1="'.$row["fname"].'" contenteditable>'.$row["fname"].'</td>
                            <td class="last_name" data-id2="'.$row["lname"].'">'.$row["lname"].'</td>
                            <td class="email_address" data-id3="'.$row["email"].'">'.$row["email"].'</td> 
                            <td><button name="button_delete" id="btn_delete" class="btn-xs btn-danger" data-id4="'.$row["id"].'">X</button></td>
                        </tr>           
            ';
        }

        $output .= '<tr>
                        <td></td>
                        <td id="first_name" contenteditable></td>
                        <td id="last_name" contenteditable></td>
                        <td id="email_address" contenteditable=""></td>
                        <td><button name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>
                    </tr>
        ';
    } else {
        $output .= '<tr>
                        <td colspan="5">Data not Found!</td>
                   </tr>';
    }


    $output .= '</table>
                </div>';
    echo $output;