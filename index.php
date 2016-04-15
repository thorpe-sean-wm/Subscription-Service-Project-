<?php
session_start();
if(isset())
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="index_style.css"/>
    <title>Roving Reality</title>
</head>
<body>
    <div id="whole_page">
        <div id='cssmenu'>
            <ul>
                <li class='active'><a href='index.php'><span>Home</span></a></li>
                <li><a href='subscription.php'><span>Subscriptions</span></a></li>
                <li><a href='upcoming.php'><span>Upcoming</span></a></li>
                <li><a href='contact.php'><span>Contact</span></a></li>
                <li><a href='signin.php'><?php
                        if ($_SESSION['uname']){
                            echo "";
                        }
                        else {
                            echo "Sign in";
                        }
                        ?></a></li>
                <li class='last'><a href='signup.php'><span>Register</span></a></li>
            </ul>
        </div>
        <div id="logo">
            <img src="http://simpleicon.com/wp-content/uploads/Briefcase-12.png" style="width: 95%;height:100%;"/>
        </div>
        <div id="main">
            <div id="head">
                <p style="font-size: 400%; padding: 0;margin: 0;"><b>Roving Reality</b></p>
                <p>Current Country: India</p>
            </div>
            <div id="body">
                <table id="index_three_bodies" cellspacing="0" style="border: 2px solid;">
                    <tr>
                        <td>
                            <img src="https://upload.wikimedia.org/wikipedia/commons/a/a8/Tour_Eiffel_Wikimedia_Commons.jpg" style="width: 100%; height: 11%;"/>
                        </td>
                        <td>
                            <img src="http://www.bigbenfacts.com/images/big%20ben%20london.jpg" style="width: 100%; height: 100%;"/>
                        </td>
                        <td>
                            <img src="http://living-in-washingtondc.com/images/national-mall-washingtondc.jpg" style="width: 100%; height: 100%;"/>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>