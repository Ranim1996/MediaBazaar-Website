<?php
	if(isset($_POST['submit'])){
		//fields for the email
		$name=$_POST['fullname'];
		$email=$_POST['email'];
		$subject = $_POST['subject'];
		$msg=$_POST['msg'];

		$to='ranimrose1996@gmail.com'; //email that recieved the message
		$headers = "From: ".$email;
		$txt = "You have recieved an email from ".$name.".\n\n".$msg;

		//upload file
		$file = $_FILES['file'];

		$fileName = $_FILES['file']['name'];
		$fileTmpName = $_FILES['file']['tmp_name'];
		$fileSize = $_FILES['file']['size'];
		$fileError = $_FILES['file']['error'];
		$fileType = $_FILES['file']['type'];

		$fileExt = explode('.', $fileName)
		$fileActualExt = strtolower (end ($fileExt));

		$allowed = array('jpg', 'jpeg', 'png', 'pdf');

		//check the file 
		if (in_array($fileActualExt, $allowed)) {
			if ($fileError === 0) {
				# code...
				if ($fileSize < 1000000) {
					# code...
					$fileNewName = uniqid('', true).".".$fileActualExt;

					$fileDestination = 'RecievedImages/'.$fileNewName;

					//upload the file
					move_uploaded_file($fileTmpName, $fileDestination);
				}
				else{
					echo "The file is to big!";
				}
			}
			else{
				echo "There was an error uploading the file!";
			}
		}
		else{
			echo "You cannot upload file of this type!";
		}



		//sending to the to email
		if(mail($to, $subject, $txt, $headers)){
			echo "<h1>Thank you"." ".$name.", We recieved your message we will contact you soon!</h1>";
			header("Location: contactPage.php?mailsend");
		}
		else{
			echo "Something went wrong!";
		}
	}
?>