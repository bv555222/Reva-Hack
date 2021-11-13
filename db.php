<center>
<?php
$connection = mysqli_connect('localhost','root','','file upload');
if(!$connection)
{
    die("Database Connection Failed");
}
else {
    
    
    echo "<p style='background-color:green;color:white'>" .  "Connected" . "</p>";
}

?></center>
