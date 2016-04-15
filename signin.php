<?php
session_start();
if(isset($_SESSION['userName'])!="")
{
    header("Location: upcoming.php");
}
$dbh = new PDO('mysql:host=localhost;dbname=ssdb', 'root', 'root');
$error = false;
$success = false;
if(@$_POST['bttLogin']) {
    if(!$_POST['user_name']){
        $error .= '<p>Username is a required field!</p>';
    }
    if(!$_POST['pass']){
        $error .= '<p>Password is a required field!</p>';
    }
    $query = $dbh->prepare("SELECT * FROM accounts WHERE user_name = :user_name AND pass = :pass");
    $result = $query->execute(
        array(
            'user_name' => $_POST['user_name'],
            'pass' => $_POST['pass']
        )
    );
    if ($result) {
        $success = "Accounts, " . $_POST['user_name'] . " was successfully logged in.";
        header("Location: index.php");
        $_SESSION['uname'] = $_POST['user_name'];
    }
    else {
        $success = "There was an error logging into the account.";
    }
}8
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="signin_style.css"/>
    <title>Roving Reality</title>
</head>
<body>
<div id="whole_page">
    <div id='cssmenu'>
        <ul>
            <li><a href='index.php'><span>Home</span></a></li>
            <li><a href='subscription.php'><span>Subscriptions</span></a></li>
            <li><a href='upcoming.php'><span>Upcoming</span></a></li>
            <li><a href='contact.php'><span>Contact</span></a></li>
            <li class='active' ><a href='signin.php'><span>Sign In</span></a></li>
            <li class='last'><a href='signup.php'><span>Register</span></a></li>
        </ul>
    </div>
    <div id="logo">
        <img src="https://d30y9cdsu7xlg0.cloudfront.net/png/19900-200.png" style="width: 90%;height:95%;"/>
    </div>
    <div id="main">
        <div id="head">
            <p style="font-size: 400%; padding: 0;margin: 0;"><b>Sign In</b></p>
            <p>Login Menu, Submission will redirect you to personal page</p>
        </div>
        <div id="body">
            <div id="registration_box">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <br />
                    <label for="user_name">Username:</label><br />
                    <input type="text" id="user_name" name="user_name" /><br />
                    <label for="pass">Password:</label><br />
                    <input type="text" id="pass" name="pass" /><br />
                    <input type="submit" name="bttLogin" value="Login" />
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>