<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Guitar Wars - Remove a High Score</title>
    <link rel="stylesheet" type="text/css" href="remove_style.css" />
</head>
<body>
<?php
if (isset($_GET['id']) && isset($_GET['user_name']) && isset($_GET['first_name']) && isset($_GET['last_name'])) {
    // Grab the score data from the GET
    $id = $_GET['id'];
    $user_name = $_GET['user_name'];
    $first_name = $_GET['first_name'];
    $last_name = $_GET['last_name'];
}
else if (isset($_POST['id']) && isset($_POST['user_name']) && isset($_POST['first_name']) && isset($_POST['last_name'])) {
    // Grab the score data from the POST
    $id = $_POST['id'];
    $user_name = $_POST['user_name'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
}
else {
    echo '<p class="error">Sorry, no account was specified for removal.</p>';
}
if (isset($_POST['submit'])) {
    if ($_POST['confirm'] == 'Yes') {
        // Connect to the database
        $dbh = new PDO('mysql:host=localhost;dbname=ssdb', 'root', 'root');

        // Delete the score data from the database
        $query = "DELETE FROM accounts WHERE id = $id LIMIT 1";

        $stmt = $dbh->prepare($query);
        $stmt->execute()\]


        $acct = $stmt->fetchAll();

        // Confirm success with the user
        echo '<p>The ' . $acct . ' for ' . $user_name . ' was successfully removed.';
    }
    else {
        echo '<p class="error">The account was not removed.</p>';
    }
}
else if (isset($id) && isset($user_name) && isset($first_name) && isset($last_name)) {
    echo '<p>Are you sure you want to delete the following account?</p>';
    echo '<p><strong>User: </strong>' . $user_name . '<br /><strong>First Name: </strong>' . $first_name .
        '<br /><strong>Last Name: </strong>' . $last_name . '</p>';
    echo '<form method="post" action="removeaccount.php">';
    echo '<input type="radio" name="confirm" value="Yes" /> Yes ';
    echo '<input type="radio" name="confirm" value="No" checked="checked" /> No <br />';
    echo '<input type="submit" value="Submit" name="submit" />';
    echo '<input type="hidden" name="id" value="' . $id . '" />';
    echo '<input type="hidden" name="name" value="' . $user_name . '" />';
    echo '<input type="hidden" name="score" value="' . $first_name . '" />';
    echo '</form>';
}
echo '<p><a href="admin.php">&lt;&lt; Back to admin page</a></p>';
?>
​
</body>
</html>