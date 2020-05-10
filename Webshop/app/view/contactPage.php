<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Contact Us</title>
    <link rel="stylesheet" type="text/css" href="./css/contactStyle.css">

</head>

<body>

    <header class="main-header">
        <?php include('./top-header.php') ?>
    </header>

    <div class="main">
            <div class="info">Contact Us</div>
            <form method="post" name="form" class="form-box" enctype="multipart/form-data">
                <label for="name">Name</label><br>
                <input type="text" id="name" class="inp" placeholder="Enter Your Name" required><br>
                <label for="email">Email</label><br>
                <input id="email" type="email" name="email" class="inp" placeholder="Enter Your Email" required><br>
                <label for="subject">Subject</label><br>
                <input id="subject" type="subject" name="subject" class="inp" placeholder="Subject" required><br>
                <label for="message">Message</label><br>
                <textarea id="body" name="msg" class="msg-box" placeholder="Enter Your Message" required></textarea><br>
                <!-- <label for="image">Upload an image (optional)</label><br>
            <input type="file" name="file"><br><br> -->
                <input type="button"  id="primary-btn" onclick="sendEmail()" value="Send" class="btn btn-primary">
            </form>
            <form method="post" name="form" class="form-box" enctype="multipart/form-data">
                <div id="contact">
                    <h1>Contact Info</h1>
                    <p>Media Bazaar</p>
                    <p>Email: mediaBazaareasysoft@gmail.com</p>
                    <p>Tel: 00316899999</p>
                </div>
            </form>

    </div>

    <!-- <div class="main1">
        <form  method="post" name="form" class="form-box" enctype="multipart/form-data"> 
            <div id="contact">
                <h1>Contact</h1>
                <p>Media Bazaar</p>
                <p>Email: mediaBazaareasysoft@gmail.com</p>
                <p>Tel: 00316899999</p>
            </div>
        </form>
    </div> -->

    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        function sendEmail() {
            var name = $("#name");
            var email = $("#email");
            var subject = $("#subject");
            var body = $("#body");

            if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
                $.ajax({
                    url: '../controler/sendEmail.php',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        name: name.val(),
                        email: email.val(),
                        subject: subject.val(),
                        body: body.val()
                    },
                    success: function(response) {
                        if (response.status == "success")
                            alert('Email Has Been Sent!');
                        else {
                            alert('Please Try Again!');
                            console.log(response);
                        }
                    }
                });
            }
        }

        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }
    </script>

    <footer>
        <?php include('./footer.php') ?>
    </footer>
</body>

</html>