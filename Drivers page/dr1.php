<?php
session_start();
//connect to database
$db = mysqli_connect("localhost","root","","authentication");
if (isset($_POST['register_btn'])) {
$FirstName = mysql_real_escape_string($_POST['FirstName']);
$LastName = mysql_real_escape_string($_POST['LastName']);
$DrivingLicence = mysql_real_escape_string($_POST['DrivingLicence']);
$Phonenumber = mysql_real_escape_string($_POST['Phonenumber']);
$state = mysql_real_escape_string($_POST['state']);
$City = mysql_real_escape_string($_POST['City']);
$username = mysql_real_escape_string($_POST['username']);
$emailid = mysql_real_escape_string($_POST['Email id']);
$password = mysql_real_escape_string($_POST['password']);
$password = mysql_real_escape_string($_POST['password2']);

if ($password == $password2) {
    //create user
    $password = md5($password);
    $sql = "INSERT INTO users(FirstName, LastName,DrivingLicence, Phonenumber, state, city,  username, email, password) VALUES (FirstName, LastName,DrivingLicence, Phonenumber, state, city,  username, email, password)";
    mysqli_query($db, $sql);
    $_SESSION['message'] = "You are now logged in";
    $_SESSION['username'] = $username;
    header ("location: home.php"); //redirect to home pages
}
else { 
    $_SESSION['message'] = "The two passwords do not match";
}

}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Driver Registration</title>
    <link rel="stylesheet" href="./css/style1.css" />
</head>

<body>
    <div class="login-page">
        <div class="form">
            <form class="register-form" method="post" action="register.php">
                <table>
                    <tr>
                        <td>First Name:</td>
                        <td><input type="text" name="FirstName" class="textInput" /></td>
                    </tr>
                    <tr>
                        <td>Last Name:</td>
                        <td><input type="text" name="LastName" class="textInput" /></td>
                    </tr>
                    <tr>
                        <td>Driving Licence:</td>
                        <td>
                            <input type="number" name="DrivingLicence number" class="textInput" />
                        </td>
                    </tr>

                    <tr>
                        <td>Phonenumber:</td>
                        <td>
                            <input type="phonenumber" name="Phone number" class="textInput" />
                        </td>
                    </tr>

                    <tr>
                        <td>State</td>
                        <td><input type="text" name="State" class="textInput" /></td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td><input type="text" name="City" class="textInput" /></td>
                    </tr>
                    <td>username:</td>
                    <td><input type="text" name="username" class="textInput" /></td>
                    </tr>
                    <tr>
                        <td>Email id:</td>
                        <td><input type="email" name="Emailid" class="textInput" /></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="password" class="textInput" /></td>
                    <tr>
                        <td>confirm password:</td>
                        <td><input type="password" name="password2" class="textInput" /></td>
                    </tr>
                    <tr>
                        <td>location:</td>
                        <td><input type="text" name="location" class="textInput" /></td>

                    </tr>
                    <tr>
                    <td></td>
            <td><input type = "submit" name ="register_btn" value = "Register"> </td>
                </table>
</tr>
            </form>
        </div>
    </div>
</body>

</html>