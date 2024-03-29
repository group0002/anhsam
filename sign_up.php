<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="main">
    <?php
    include "connect.php";
    if (isset($_POST["signup"])) {
        //lấy thông tin từ các form bằng phương thức POST
        $username = mysqli_real_escape_string($conn,$_POST["name"]);
        $password = mysqli_real_escape_string($conn,$_POST["pass"]);

        $repass = mysqli_real_escape_string($conn,$_POST["re_pass"]);
        $email = mysqli_real_escape_string($conn,$_POST["email"]);
        //Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống

        if ($username == "" || $password == "" || $email == "") {
            echo "bạn vui lòng nhập đầy đủ thông tin";
        } else {
            // Kiểm tra tài khoản đã tồn tại chưa
            $sql = "select * from account where your_name='$username'";
            $kt = mysqli_query($conn, $sql);

            if (mysqli_num_rows($kt) > 0) {
                echo "Tài khoản đã tồn tại";

            } else {
                //thực hiện việc lưu trữ dữ liệu vào db
                $sql = "INSERT INTO account( your_name,email, pass_word ) VALUES ('$username','$email','$password')";
                // thực thi câu $sql với biến conn lấy từ file connection.php
                mysqli_query($conn, $sql);
                if($password != $repass){
                    echo " Mat Khau Khong Trung Nhau ";

                }
                else{
                    echo " ban dang ky thanh cong";
                }
            }
        }
    }

    ?>
    <!-- Sign up form -->
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Sign up</h2>
                    <form  method="POST"  class="register-form" id="register-form">
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="name" id="name" placeholder="Your Name"/>
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email" id="email" placeholder="Your Email"/>
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="pass" id="pass" placeholder="Password"/>
                        </div>
                        <div class="form-group">
                            <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term"/>
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all
                                statements in <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                    <a href="./index.html" class="signup-image-link">I am already member</a>
                </div>
            </div>
        </div>
    </section>
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>