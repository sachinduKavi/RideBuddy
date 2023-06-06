<?php 
    $conn = mysqli_connect('sql.freedb.tech', 'freedb_rb_user', 'mt$8uUqEw$BEKbj', 'freedb_ride_buddy');   
    if($conn -> connect_errno){
        echo "Database Connection Error";
    } 
?>