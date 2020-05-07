<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Feedback Form</title>
	<link rel="stylesheet" type="text/css" href="contactStyle.css">
</head>
  
<body>

	<header class="main-header"> 
        <?php include('./top-header.php') ?>
    </header>

	<div class="main">
		<div class="info">Contact Us</div>
		<form action="sendingMail.php" method="post" name="form" class="form-box" enctype="multipart/form-data">
			<label for="name">Name</label><br>
			<input type="text" name="fullname" class="inp" placeholder="Enter Your Name" required><br>
			<label for="email">Email</label><br>
			<input type="email" name="email" class="inp" placeholder="Enter Your Email" required><br>
			<label for="subject">Subject</label><br>
			<input type="subject" name="subject" class="inp" placeholder="Subject" required><br>
			<label for="message">Message</label><br>
			<textarea name="msg" class="msg-box" placeholder="Enter Your Message" required></textarea><br>
			<label for="image">Upload an image (optional)</label><br>
			<input type="file" name="file"><br><br>
			<input type="submit" name="submit" value="Send Email" class="sub-btn">
		</form>
	</div>
	
	<footer>
        <?php include('./footer.php') ?>
    </footer>

</body>
</html>