<?php
require_once('authorize.php');
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $description = $_POST['description'];
    if (!empty($name) && !empty($description)) {
        $dbh = new PDO('mysql:host=localhost;dbname=ssdb', 'root', 'root');

        $query = "INSERT INTO subscriptions VALUES (0, :name, :description)";

        $stmt = $dbh->prepare($query);
        $result = $stmt->execute(
            array(
                'name' => $name,
                'description' => $description
            )
        );
        if (!$result) {
            die('Error querying database.');
        } else {
            echo 'Subscription added.';
        }
    } else {
        echo '<p class="error">Please enter all of the information to add a subscription.</p>';
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
            <li class='last'><a href='signup.php'><span>Register</span></a></li>
        </ul>
    </div>
    <div id="logo">
        <img src="https://cdn0.iconfinder.com/data/icons/icostrike-characters/512/admin-512.png" style="width: 90%;height:95%;"/>
    </div>
    <div id="main">
        <div id="head">
            <p style="font-size: 400%; padding: 0;margin: 0;"><b>Administrator Page</b></p>
            <p>Secure Location for Site Management</p>
        </div>
        <div id="body">
            <div id="registration_box">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <label for="name">Subscription:</label>
                    <input type="text" id="name" name="name" value="<?php if (!empty($name)) echo $name; ?>"/><br />
                    <label for="description">Description:</label>
                    <input type="text" id="description" name="description" value="<?php if (!empty($score)) echo $score; ?>"/><br />
                    <input type="submit" name="submit" value="submit" />
                </form>
            </div>
            <?php
            // Connect to the database
            $dbh = new PDO('mysql:host=localhost;dbname=ssdb', 'root', 'root');

            // Retrieve the score data from MySQL
            $query = "SELECT * FROM accounts ORDER BY id DESC";

            $stmt = $dbh->prepare($query);
            $stmt->execute();
            $acct = $stmt->fetchAll();

            // Loop through the array of score data, formatting it as HTML
            echo '<table>';
            echo '<tr><th>User Name</th><th>First Name</th><th>Last Name</th><th>Action</th></tr>';
            foreach($acct as $row) {
                // Display the score data
                echo '<tr class="userrow"><td>' . $row['user_name'] . '</td>';
                echo '<td>' . $row['first_name'] . '</td>';
                echo '<td>' . $row['last_name'] . '</td>';
                echo '<td><a href="removeaccount.php?id=' . $row['id'] . '&amp;user_name=' . $row['user_name'] .
                    '&amp;first_name=' . $row['first_name'] . '&amp;last_name=' . $row['last_name'] . '">Remove</a>';
                echo'</td></tr>';
            }
            echo '</table>';
            ?>
        </div>
    </div>
</div>
</body>
</html>