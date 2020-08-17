
<div id="right-col-container">
	<div id="messages-container" style="height: 75%; margin: 15px 10px;
	">

		<?php
		$no_message = false;
			if(isset($_GET['user'])){
				$_GET['user'] = $_GET['user'];
			}else{
				$q = 'SELECT `sender_name`, `reciever_name` FROM `messages` WHERE `sender_name` = "'.$_SESSION['Username'].'" or `reciever_name` = "'.$_SESSION['Username'].'"';

				$r = mysqli_query($con, $q);
				if($r){
					if(mysqli_num_rows($r)>0){
						while($row = mysqli_fetch_assoc($r)){
							$sender_name = $row['sender_name'];
							$reciever_name = $row['reciever_name'];

							if($_SESSION['Username'] == $sender_name){
								$_GET['user'] = $reciever_name ;
							}else{
								$_GET['user'] = $sender_name ;
							}
						}
					}else{
						echo 'no message from you';
						$no_message = true;
					}
				}else{
					echo $q;
				}
			}
			if($no_message == false){


			$q= 'SELECT * FROM `messages` WHERE `sender_name`= "'.$_SESSION['Username'].'" AND `reciever_name`="'.$_GET['user'].'"
				OR
				`sender_name`="'.$_GET['user'].'"
				AND `reciever_name`="'.$_SESSION['Username'].'"';
				$r= mysqli_query($con, $q);

				if($r){
					while($row = mysqli_fetch_assoc($r)){
						$sender_name = $row['sender_name'];
						$reciever_name = $row['reciever_name'];
						$message = $row['message_text'];
						if($sender_name == $_SESSION['Username']){
							?>
								<div class="grey-message">
									<a href="#">Me</a>
									<p><?php echo $message; ?></p>
								</div>
							<?php
						}else{
							?>
								<div class="white-message">
									<a href="#"><?php echo $sender_name; ?></a>
									<p><?php echo $message; ?></p>
								</div>
							<?php
						}
					}
				}else{
					echo $q;
				}
				}
		?>
</div>
	<form method="post" id="message-form">
	<textarea class="textarea" id="message_text" placeholder="Write your message to send"></textarea>
	</form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	$("document").ready(function(event){

		$("#right-col-container").on('submit', '#message-form', function(){
			var message_text = $("#message_text").val();
				$.post("sending_process.php?user=<?php echo $_GET['user'];?>",
					{
						text: message_text,
					},
						function(data, status){
							$("#message_text").val("");
							document.getElementbyID("messages-container").innerHTML += data;

						}

					);
			});
				$("#right-col-container").keypress(function(e){
					if (e.keyCode == 13 && !e.shiftKey) {
					$("#message-form").submit() ;
			}
		});
	});
</script>