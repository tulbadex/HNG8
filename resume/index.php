<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Builder</title>
</head>
<body>
    <div>
        <form action="" method="POST">
            <div>
                <label for="fname">First Name</label>
                <input type="text" value="" placeholder="Enter Your Name" name="fname" id="fname">
            </div>

            <div>
                <label for="lname">Last Name</label>
                <input type="text" value="" placeholder="Enter Your Last Name" name="lname" id="lname">
            </div>

            <div>
                <label for="email">Email</label>
                <input type="email" value="" placeholder="Enter Your Email Address" name="email" id="email">
            </div>

            <div>
                <label for="phonenumber">Phone Number</label>
                <input type="text" value="" placeholder="Enter Your Phone No" name="phonenumber" id="phonenumber" maxlength="11" minlength="11">
            </div>

            <div>
                <label for="address">Home Address</label>
                <textarea name="address" id="address" cols="30" rows="10" placeholder="Enter Your Address"></textarea>
            </div>

            <button type="submit">Submit</button>

        </form>
    </div>
</body>
</html>