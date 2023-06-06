<?php
include 'connection_db.php';
if(isset($_POST['email'])){
    $email = $_POST['email'];
    $gate = 0;
}
else{
    $email = 'null@gmail.com';
    $gate = 1;
}

header("Content-Type: JSON");

if($conn){
    $login_details_sql = "SELECT * FROM user_details WHERE email='$email' or $gate";
    $result_login = $conn -> query($login_details_sql);

    if(mysqli_num_rows($result_login)){
        $response = array();
        $i = 0;
        
        while($rec = $result_login -> fetch_assoc()){
            $response[$i]['user_name'] = $rec['user_name'];
            $response[$i]['email'] = $rec['email'];
            $response[$i]['password'] = $rec['password'];
            $response[$i]['DP'] = $rec['DP'];
            $response[$i]['profile_state'] = $rec['profile_state'];
            $response[$i]['vehicle_state'] = $rec['vehicle_state'];
            $i++;
        }
        echo json_encode($response, JSON_PRETTY_PRINT);
    }
}
else    
    echo "Connection Error";

?>