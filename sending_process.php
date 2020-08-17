<?php
	session_start();
	require_once("connection.php");
	if (isset($_SESSION['Username']) and isset($_GET['user'])) {
		if (isset($_POST['text'])) {
			if ($_POST['text'] !='') {

				$sender_name = $_SESSION['Username'];
				$reciever_name = $_GET['user'];
				$message = $_POST['text'];

				$q= "insert into messages(sender_name, reciever_name, message_text) values ('$sender_name', '$reciever_name', '$message')";
				$r = mysqli_query($con, $q);

				if($r){ 
					?>
						<div class="grey-message">
							<a href="#">Me</a>
							<p><?php echo $message; ?></p>
						</div>
					<?php

				}else{
					echo $q;
				}

			}echo 'please write something first';

		}else{
			echo 'problem with text';
		}
	}else{
		echo 'Please login or select a user to send a message';
	}

?>