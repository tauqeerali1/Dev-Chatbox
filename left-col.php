<div id="left-col-container">
	<div style="cursor: pointer; background: #F4A460; padding: 1.5px;"  onclick="document.getElementById('new-message').style.display='block'" class="white-back">
		<p align="center">Click here to send message to new user</p>
</div>

<?PHP
	$q='SELECT DISTINCT `reciever_name`, `sender_name`
	FROM `messages` WHERE
	`sender_name`= "'.$_SESSION['Username'].'" OR `reciever_name`= "'.$_SESSION['Username'].'"';
	$r = mysqli_query($con, $q);
	if($r){
		if(mysqli_num_rows($r)>0){

			$counter = 0 ;
			$added_user = array() ;
			while($row= mysqli_fetch_assoc($r)){
				$sender_name= $row['sender_name'];
				$reciever_name= $row['reciever_name'];

				if($_SESSION['Username']== $sender_name){
					if(in_array($reciever_name, $added_user)){

					}else{

						?>
						<div class="grey-back">
							<img src="inside.png" class="image"/><?Php  echo '<a href="?user='.$reciever_name.'">'.$reciever_name.'</a>' ; ?>
						</div>

						<?php
						
						$added_user = array($counter => $reciever_name) ;
						$counter++ ;
					}
				}elseif($_SESSION['Username']== $reciever_name){
					if(in_array($sender_name, $added_user)){

					}else{
						?>

						<div class="grey-back">
							<img src="inside.png" class="image"/><?Php  echo '<a href="?user='.$sender_name.'">'.$sender_name.'</a>' ; ?>
						</div>
						<?Php
						
						$added_user = array($counter => $sender_name) ;
						$counter++ ;
					}
				}
			}
		}else{
			echo 'no user';
		}
	}else{
		echo $q;
	}

?>	
</div>