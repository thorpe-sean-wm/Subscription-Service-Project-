<html>
<head>
    <link rel="stylesheet" type="text/css" href="subscription_style.css"/>
    <title>Roving Reality</title>
</head>
<body>
<div id="whole_page">
    <div id='cssmenu'>
        <ul>
            <li><a href='index.php'><span>Home</span></a></li>
            <li class="active"><a href='subscription.php'><span>Subscriptions</span></a></li>
            <li><a href='upcoming.php'><span>Upcoming</span></a></li>
            <li><a href='contact.php'><span>Contact</span></a></li>
            <li><a href='signin.php'><span>Sign In</span></a></li>
            <li class='last'><a href='signup.php'><span>Register</span></a></li>
        </ul>
    </div>
    <div id="logo">
        <img src="https://cdn4.iconfinder.com/data/icons/logistic-delivery-solid-icons-vol-3/72/109-512.png" style="width: 95%;height:100%;"/>
    </div>
    <div id="main">
        <div id="head">
            <p style="font-size: 400%; padding: 0;margin: 0;"><b>Subscriptions</b></p>
            <p>Current Monthly Subscriptions</p>
        </div>
        <div id="body">
            <div id="subscriptions">
                <?php
                $i = 0;
                // Connect to the database
                $dbh = new PDO('mysql:host=localhost;dbname=ssdb', 'root', 'root');
                // Retrieve the score data from MySQL
                $query = "SELECT * FROM subscriptions ORDER BY id ASC";

                $stmt = $dbh->prepare($query);
                $stmt->execute();
                $subscript = $stmt->fetchall();


                // Loop through the array of score data, formatting it as HTML
                echo '<table style="width: 100%;">';

                $i = 0;
                foreach($subscript as $row) {
                    if ($i == 0) {
                        echo '<tr><td colspan="2" class="subinfo_header"><h1 style="margin: 0; padding:0;">Subscriptions</h1></td></tr>';
                    }
                    // Display the score data
                    echo '<tr><td class="subinfo">';
                    echo '<strong>Subscription:</strong><br /> ' . $row['name'] . '<br /></td>';
                    echo '<td class="subinfo">';
                    echo '<strong>Description:</strong><br /> ' . $row['description'] . '<br /></td></tr>';
                    $i++;
                }
                echo '</table>';
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>