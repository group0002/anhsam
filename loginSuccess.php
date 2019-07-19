<?php
//    session_start();
//    if(!isset($_SESSION['usn'])) {
//        header("Location:index.html");
//    }
//
//
//?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
<hr class ="hr"/>
    <div class ="middle_div_right" align="center">
        <form method="POST" enctype="multipart/form-data">
        <input type= "hidden" value ="1000000" name ="MAX_FILE_SIZE" />
        <input type ="file" name ="uploadedfile" />
        <input type="submit" name ="submit" value="Upload" style="margin-top:10px; height: 35px; width: 75px;"/>

        </form>
<?php
    if(isset($_POST['submit'])){
        $target_path="images/";
        $target_path=$target_path.basename($_FILES['uploadedfile']['name']);
    if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'],$target_path)){
        $conn = new mysqli("localhost",'vohai','12345678','test');
        $sql= "Insert into upload_image('path') values ('$target_path')";
        if($conn->query($sql)==TRUE){
            echo "<br><br>";
        }
        else {
            echo "Error".$sql.$conn->error;
        }
//        $sql1 = "select path from  upload_image order by id desc limit 1";
//        $result = $conn->query($sql1);
//        if($result->num_rows>0){
//            while($row = $result->fetch_assoc()) {
//                $path = $row['path'];
//                echo "<img src = '$path' height = '280' width = '320'>";
//            }
//        }
//        $conn->close();
    }
    }
?>


    </div>
</body>
</html>
