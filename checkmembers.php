<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>
<body>

<?php
$host="localhost";
$username="vohai";
$password="12345678";
$db_name="sign_up";
$tbl_name="account";

$con = mysqli_connect("$host", "$username", "$password", $db_name);

$your_name = trim($_POST["your_name"]);
$your_pass = trim($_POST["your_pass"]);



$result = mysqli_query($con,"Select your_name,pass_word from $tbl_name where your_name = '$your_name' and pass_word= '$your_pass';");

$row = mysqli_num_rows($result);
$ar = mysqli_fetch_array($result);

if($row==1) {
    session_start();
    $_SESSION["usn"] = $ar['your_name'];
    header("Location:loginSuccess.php");

}
else {
//    echo "<center>"."<h1>"." Đăng nhập thất bại "."</h1>"."</center>";

}
?>

<script>
    // if (confirm('Đăng nhập thất bại, bạn có muốn thử lại không? ')) {
    //     window.location.assign("index.html");
    // } else {
    //
    // }

</script>
</body>
</html>
</script>

</body>
</html>
