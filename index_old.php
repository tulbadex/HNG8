<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Builder</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        button[type=submit]:disabled{
            opacity:0.5;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex">
                <img src="img/hng.png" height="40" width="50" alt="" srcset="">
                <img src="img/i4g.png" height="40" width="50" alt="" srcset="">
                <img src="img/zuri.png" height="40" width="50" alt="" srcset="">
            </div>

            <div class="col-md-12">
                <h1>Resume</h1>
                <h2 class="text-center">Adedayo Ibrahim</h2>
                <p class="text-center">Email: <a href="mailto:ibrahimadedayo@rocketmail.com">ibrahimadedayo@rocketmail.com</a></p>
                <p class="text-center">Github: <a href="http://github.com/tulbadex">Tulbadex</a></p>
                <p class="text-center">Phone: <a href="tel:+23419051623555">09051623555</a></p>
                <hr>
                <table class="table">
                    <tbody>
                        <tr>
                            <td colspan="2">
                                <h5>Career Objective</h5>
                            </td>
                            <td>
                                <p>To be a part of an organization that values growth and to be able to provide my very best in reaching the core objective of the organization with ever</p>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <h5>Personal Details</h5>
                            </td>
                            <td>
                                <p>Full Name: <span>Adedayo babatunde ibrahim</span></p>
                                <p>Marital Status: <span>Single</span></p>
                                <p>Nationality: <span>Nigerian</span></p>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

        <form action="" method="POST" class="mb-3" id="form">

            <div class="d-flex justify-content-center" id="messageDiv"></div>
            
            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="subject" class="col-sm-2 col-form-label">Subject</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="subject" name="subject" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="message" class="col-sm-2 col-form-label">Message</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="message" id="message" cols="30" rows="10" required></textarea>
                </div>
            </div>

            <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary" id="contact">Submit</button>
            </div>

        </form>
    </div>
    <script src="js/bootstrap.min.js"></script>
    <script>
        window.addEventListener('load', (event) => {
            let contact = document.getElementById("contact");
            contact.addEventListener('click',submitContact)
            
        });

        function submitContact(e) {
            e.preventDefault();
            let name = document.getElementById("name").value;
            let email = document.getElementById("email").value;
            let subject = document.getElementById("subject").value;
            let message = document.getElementById("message").value;
            let contact = document.getElementById("contact");
            let success = document.getElementById("messageDiv");
            let form = document.getElementById("form");

            if (name != "" && email != "" && subject != "" && message != "") {
                contact.disabled = true
                fetch('action/action.php', {
                    method: 'POST',
                    body: JSON.stringify({
                        name: name,
                        email: email,
                        subject: subject,
                        message: message,
                        action: "send",
                    }),
                    headers:{
                        'Content-Type': 'application/json'
                    }
                }).then( res => res.json())
                .then( data => {
                    // console.log({data})
                    if (data.msg == "success") {
                        contact.disabled = false
                        success.innerHTML = "Thanks for contacting us"
                        success.classList.add('text-success')
                        setTimeout(() => {
                            success.innerHTML = ""
                            success.classList.remove("text-success");
                        }, 3000);
                        form.reset()
                    }else{
                        success.innerHTML = "Error while sediing message"
                        success.classList.add('text-danger')
                        contact.disabled = false
                        setTimeout(() => {
                            success.innerHTML = ""
                            success.classList.remove("text-danger");
                        }, 3000);
                    }
                }).catch( err => console.log({ err }))
            }
        }
    </script>
</body>
</html>