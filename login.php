<!DOCTYPE html>
<html>
<head>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>login</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	</head>
<body>	
	<?php
	session_start();
	if (isset($_SESSION['Username']))
?>
<?php require_once("new-message.php") ?>
		<nav>
		<div id="mySidenav" class="sidebar">
			<div class="closebtn">
  			<p href="#" onclick="closeNav()" style="font-size: 35px;">&times;</p></div>
		
			<ul>
				<li>
					<a href="http://localhost/login.php" class="home-btn">Home
					<i class="fa fa-home"></i>
					</a>
				</li>
  				<li>
  					<a href="#" class="feat-btn">What's New
  					<i class="fa fa-caret-down first"></i>
					</a>
  					<ul class="feat-show">
						<li><a href="#">Esaily chat</a></li>
						<li><a href="#">Share videos</a></li>
						<li><a href="#">Trending section</a></li>
						<li><a href="#">Upload photo</a></li>
						<li><a href="#">Start call</a></li>
						<li><a href="#">Build group</a></li>
						<li><a href="#">Show online</a></li>
					</ul>
				</li>
				<li>
					<a href="#" class="serv-btn">Features
					<i class="fa fa-caret-down second"></i>
					</a>
					<ul class="serv-show">
						<li><a href="#">Mobile Compatibility</a></li>
						<li><a href="#">Ease of Connectivity</a></li>
						<li><a href="#">Notification and News Feed</a></li>
						<li><a href="#">Discussion forums</a></li>
						<li><a href="#">Sharing economy networks</a></li>
						<li><a href="#">Media sharing networks</a></li>
						<li><a href="#">Interest-based networks</a></li>
					</ul>
				</li>
				<li>
					<a href="#" class="roll-btn">Contacts Us
					<i class="fa fa-caret-down third"></i>
					</a>
					<ul class="roll-show">
						<li><a href="https://twitter.com/tauqeerali01">Twitter</a></li>
						<li><a href="https://www.facebook.com/profile.php?id=100014791711691">Facebook</a></li>
						<li><a href="https://www.instagram.com/___tauqeer_ali___/">Instagram</a></li>
						<li><a href="https://www.linkedin.com/in/tauqeer-ali-288a27190/">Linkedin</a></li>
						<li><a href="https://github.com/tauqeerali1">Github</a></li>
					</ul>
				</li>
				<li>
					<a href="#" class="tie-btn">About Us
					<i class="fa fa-caret-down fourth"></i>
					</a>
					<ul class="tie-show">
						<li><a href="http://localhost/privacy.html">Privacy</a></li>
						<li><a href="http://localhost/privacy.html">Cookies</a></li>
						<li><a href="http://localhost/about.html">Terms</a></li>
						<li><a href="http://localhost/trademark.html">Trademark</a></li>
						<li><a href="http://localhost/wiki.html">About</a></li>
					</ul>
				</li>
				<li>
					<a href="logout.php" class="log-btn">Logout
					<i class=" 	fa fa-sign-out"></i>
					</a>
				</li>
			</ul>
		
		<script type = "text/javascript">
			$('.btn1').click(function(){
				$(this).toggleClass("click");
				$('.sidebar').toggleClass("show");
			})
			$('.feat-btn').click(function(){
				$('nav ul .feat-show').toggleClass("show");
				$('nav ul .first').toggleClass("rotate");
			});
			$('.serv-btn').click(function(){
				$('nav ul .serv-show').toggleClass("show1");
				$('nav ul .second').toggleClass("rotate");
			});
			$('.roll-btn').click(function(){
				$('nav ul .roll-show').toggleClass("show2");
				$('nav ul .third').toggleClass("rotate");
			});
			$('.tie-btn').click(function(){
				$('nav ul .tie-show').toggleClass("show3");
				$('nav ul .fourth').toggleClass("rotate");
			});
			$('nav ul li').click(function(){
				$(this).addClass("active").siblings().removeClass("active");
			})
		</script>
	</div>
	</nav>
				<div id="main">
					<span class="btn1" style="font-size:30px; position: absolute; top: 30px; cursor:pointer" onclick="openNav()">&#9776;</span>
				<script type="text/javascript">
					function openNav() {
						document.getElementById("mySidenav").style.width = "330px";
						document.getElementById("main").style.marginLeft = "330px";
						document.getElementById("main").style.transition = "all 0.5s"
					}
					
					function closeNav() {
						document.getElementById("mySidenav").style.width = "0";
						document.getElementById("main").style.marginLeft= "0";
						document.getElementById("main").style.transition = "all 0.5s";
					}
				</script>


				<div id="fullbody">
					<div class="logo">
						<img src="main_emperor.png">
					</div>
					<div>
						<a href="logout.php" class="btn"><span>Logout</span></a>
					</div>
					<div class="fulllist">
					<div class="fullsearch">
						<div class="search-box">
        					<input id="search-box1" type="text" autocomplete="off" placeholder="Search user name..." />
        					<div class="result">
    	   					</div>
    					</div>
    					<div class="user">
							<img src="user3.png">
						</div>
						<div class="search">
							<img src="search.png">
						</div>
					</div>
					</div>
					
					<div class="fulllist">
						<div class="list">
							<a>
								<?php $conn=mysqli_connect('', '', '', '');
								$sql = "SELECT User FROM userregistration";
								$result = $conn->query($sql);

								if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()) {
						 				echo  "<img src='inside16.png'>".$row["User"]."</br><br/>" ;
					  					}
									}
								?>
							</a>
						</div>
					</div>
						
					<script type="text/javascript">
					$(document).ready(function(){
    					$('#search-box1').keyup(function(){
        					var inputVal = $(this).val();
        					var final_value = inputVal.toLowerCase();
        					var resultDropdown = $(this).siblings(".result");
        					if(final_value.length){
            					$.post("backend-search2.php", {term: inputVal}, function(data,status){
                					var obj = JSON.parse(data);
                					console.log(obj.result[0]);
                					//$.each(obj, function(index, value){
                    					//$.each(value, function(ind, val){
                    					//    console.log(val);
                        					resultDropdown.html(obj.result[0]);
                    					//});
                					//});
            					});
        					}
        					else{
            					resultDropdown.html("SEARCH BAR");
        					}
    					});
					});
					</script>
					</div>
					

				
	<div id="container">
		<div id="menu">
			<?php  echo $_SESSION['Username'];
			?>
		</div>
		<div id="left-col">
			<?php 
			require_once("left-col.php");
			?>
		</div>
		<div id="right-col">
			<?php 
			require_once("right-col.php");
			?>
		</div>
		<div class="backgrounds">
		</div>
		</div>
		<div class="user1">
			<img src="busuessman.png">
		</div>
	</div>	
</body>
</html>


