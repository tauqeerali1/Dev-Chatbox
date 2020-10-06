<div id="new-message">
	<p class="m-header">New Message</p>
	<p class="m-body">
		<form method="post">
			<input type="text" list="user" onkeyup="check_in_db()" class="message-input-1" placeholder="User name" name="User" id="User" ><br><br>
			<datalist id="user"></datalist>
			<textarea class="message-input-2" name="message" placeholder="write your messsage"></textarea><br><br>
			<input type="submit" name="send" id="send" value="send">
			<button onclick="document.getElementById('new-message').style.display='none'"> Cancel</button>
		</form>
	</p>
	<p class="m-footer">Click Send to send</p>
</div>

<?php
	require_once("connection.php");

	if(isset($_POST['send'])){
		$sender_name = $_SESSION['Username'] ;
		$reciever_name = $_POST['User'] ;
		$message = $_POST['message'] ;

		$q = "insert into messages(sender_name, reciever_name, message_text) values ('$sender_name', '$reciever_name', '$message')";
		$r = mysqli_query($con, $q);
		if($r){
			header("location:login.php?user=".$reciever_name);
		}else{
			echo $q;
		}
	}

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

	document.getElementById("send").disabled = true;
	function check_in_db() {
		var User = document.getElementById("User").value;
		$.post("check_in_db.php",
		{
			user: User
		},
		function(data, status){
			//alert(data);
			if(data == '<option value="no User">'){
				document.getElementById("send").disabled = true;
			}else{
				document.getElementById("send").disabled = false;
			}
			document.getElementById('user').innerHTML = data ;
			}
		);
	}
</script>
