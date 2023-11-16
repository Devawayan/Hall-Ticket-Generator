<?php
function check_login($conn)
 {
    if(isset($_SESSION['Email']))
    {
        $ID = $_SESSION['Email'];
        $query = "select * from users where Email = '$ID' limit 1";
        $result = mysqli_query($conn,"$query");
        if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
    header("signin.php");
    die;

 }
 function random_Email($length)
 {
    $text = "";
    if ($length < 12)
    {
        $length = 12;
    }
    $len = rand(4,$length);
    for ($i = 0; $i < $len; $i++)
    {
        $text .= $text(0,9);
    }
    return $text;
 }

?>