<?php



session_start();
unset($_SESSION["username"]);

echo($_SESSION["username"]);
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "chatroom";

$dbconn = mysqli_connect($servername, $username, $password, $dbname);

$error = false;

//register button is clicked
if (isset($_POST['loginbtn'])) {

    $usr = (string)($_POST['username']);
    $pass = (string)$_POST['pass'];

    $cmd = "SELECT password FROM users_table WHERE username = '$usr'";
    $result = mysqli_query($dbconn, $cmd);

    $r = $result->fetch_assoc();

    if (!(empty($r))) {
        if ($r["password"] == $pass) {

            $_SESSION["username"] = $usr;
            header('location: index.php');  //goto index.php
        }
        else{
            $error = true;
        }
    } else {
        $error = true;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V14</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->

        <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />

</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
            <form method="post" action="login.php" class="login100-form validate-form flex-sb flex-w">
					<span class="login100-form-title p-b-32">
						Account Login
					</span>

                <span class="txt1 p-b-11">
                     <?php if ($error) {
                         echo "<a style='color: darkred'>Incorrect username/password combo...<br><br></a>";
                     } ?>
						Username
					</span>
                <div class="wrap-input100 validate-input m-b-36" data-validate="Username is required">
                    <input class="input100" type="text" name="username">
                    <span class="focus-input100"></span>
                </div>

                <span class="txt1 p-b-11">
						Password
					</span>
                <div class="wrap-input100 validate-input m-b-12" data-validate="Password is required">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
                    <input class="input100" type="password" name="pass">
                    <span class="focus-input100"></span>
                </div>

                <div class="flex-sb-m w-full p-b-48">


                    <div>
                        <a>Not a member?</a>
                        <a href="signup.php" class="txt3">
                            Sign Up!
                        </a>
                    </div>
                </div>

                <div class="container-login100-form-btn">
                    <button type="submit" name='loginbtn' class="login100-form-btn">
                        Login
                    </button>

                </div>

            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>



<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>




</body>
</html>