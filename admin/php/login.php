<?php 

    session_start();
    $uname = $_POST['adminName'];
    $pass = $_POST['password'];

    if($uname == "Dhruti123" && $pass == "siddhi"){
        header("location: ../homepage.php");
        $_SESSION['admin'] = $uname;
    }else{
        echo"
        <script>
            alert('Username Or Password Wrong');
            window.location.replace('../index.php');
        </script>
        ";
    }
?>