<?php
if(isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $user_name = $_POST['user_name'];
    $pass = $_POST['pass'];
    if (!empty($first_name) && !empty($last_name) && !empty($user_name)) {
        $dbh = new PDO('mysql:host=localhost;dbname=ssdb', 'root', 'root');

        $query = "INSERT INTO accounts VALUES (0, :first_name, :last_name, :user_name, :pass)";

        $stmt = $dbh->prepare($query);
        $result = $stmt->execute(
            array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'user_name' => $user_name,
                'pass' => $pass
            )
        );
        if (!$result) {
            die('Error querying database.');
        } else {
            echo "Customer Added";
        }
    }
}
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="signup_style.css"/>
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
            <li><a href='signin.php'><span>Sign In</span></a></li>
            <li class='active last'><a href='signup.php'><span>Register</span></a></li>
        </ul>
    </div>
    <div id="logo">
        <img src="https://d30y9cdsu7xlg0.cloudfront.net/png/6478-200.png" style="width: 90%;height:95%;"/>
    </div>
    <div id="main">
        <div id="head">
            <p style="font-size: 400%; padding: 0;margin: 0;"><b>Sign Up</b></p>
            <p>Account Creation Quick, Simply, Easy </p>
        </div>
        <div id="body">
            <div id="registration_box">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <br />
                    <label for="first_name">First name:</label><br />
                    <input type="text" id="first_name" name="first_name" /><br />
                    <label for="last_name">Last name:</label><br />
                    <input type="text" id="last_name" name="last_name" /><br />
                    <label for="user_name">Username:</label><br />
                    <input type="text" id="user_name" name="user_name" /><br />
                    <label for="pass">Password:</label><br />
                    <input type="text" id="pass" name="pass" /><br />
                    <input type="submit" name="submit" value="submit" />
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>