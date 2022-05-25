<?php 
    if(isset($_POST['submit'])){
        include 'dbconnect.php';

        $email = $_POST['email'];
        $password = sha1($_POST['password']);
        $sqllogin = "SELECT * FROM tbl_users WHERE user_email = '$email' AND user_pass = '$password'";
        $stmt = $conn->prepare($sqllogin);
        $stmt->execute();
        $number_or_rows = $stmt->fetchColumn();
        if($number_or_rows>0){
            echo "<script>alert('Login Success');</script>";
        }
        else{
            echo "<script>alert('Login Failed');</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    
</head>

<body>
    <header>
        <img src="../res/banner1.png" style="max-width:100%; height: auto;">
    </header>

    <div style="text-align: center;">
        <img src="../res/logomytutor.png" style="max-width:80%; height: auto;">
    </div>

    <div class="w3-container w3-padding-64" style="display:flex; justify-content: center">
        <div class="w3-card-4 w3-round" style="width:600px; margin:auto; text-align: left;">
        <div class="w3-green w3-container w3-center"><h2>Login</h2></div>
            <form name="loginForm" class="w3-container" action="login.php" method="post">
                <p>
                    <label class="w3-text-green"><b>Email</b></label>
                    <input class="w3-input w3-round w3-border" type="email" name="email" id="idemail" placeholder="Your email" required>
                </p>
                <p>
                    <label class="w3-text-green"><b>Password</b></label>
                    <input class="w3-input w3-round w3-border" type="password" name="password" id="idpass" placeholder="Your password" required>
                </p>
                <p>
                    <input class="w3-check" name="rememberme" type="checkbox" id="idremember" onclick="rememberMe()">
                    <label>Remember Me</label>
                </p>
                <p>
                    <input class="w3-button w3-round w3-block w3-green" type="submit" name="submit" id="idsumit">
                </p>
                <p style="text-align: center">
                    <a href="register.php">Or Sign Up Here</a>
                </p>
            </form>
            </div>
        </div>
    </div>
    <br><br>
    <footer class="w3-footer w3-center w3-green w3-bottom">
        <p>Copyright &copy; 2022 MY Tutor</p>
    </footer>

</body>

</html>