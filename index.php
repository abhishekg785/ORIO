<?php
session_start();
include('connection.php');
extract($_POST);
  if(isset($subGame))
	{
     $mail=$email;
     $password=$password;
     $query=mysql_query("select * from player where playerEmail='$mail' and password='$password'");
     if(mysql_num_rows($query))
		{
			$_SESSION['email']=$mail;
      $res=mysql_fetch_assoc(mysql_num_rows("select * from player where playerEmail='$mail'"));
			//print_r($res);
			$userName=$res['playerName'];
			$_SESSION['uname']=$userName;
      header('location:game.php');
     }
   }
?>
<html>
	<head>
		<title>ORIO</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
    <style>
    body
    {
      background-image: url("background.jpg");
    }
    </style>
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<h1>ORIO</h1>
				<p>A simple multiplatform game built with Love<br /></p>
			</header>

		<!-- Signup Form -->
			<form id="signup-form" method="post" >
				<input type="email" name="email" id="email" placeholder="Email Address" />
				<br/>
				<input type="password" name="password" placeholder="Enter password"/>
				<input type="submit" name="subGame" value="Log In" />
			</form>
            <br/>
            <p>Not a member yet ???</p>
            </br><a href="register.php">Click here to register</a>
		<!-- Footer -->
			<footer id="footer">
				<ul class="icons">
					<li><a href="https://github.com/abhishekg785" class="icon fa-github"><span class="label">GitHub</span></a></li>
					<li><a href="https://gmail.com/abhishekg785" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
				</ul>
				<ul class="copyright">
					<li>Credits: <a href="https://github.com/abhishekg785">Team:ASHA</a></li>
				</ul>
			</footer>

		<!-- Scripts -->
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
   <script>
   function checkPassword()
   {
     alert("hello i am");
   }
  </script>
	</body>
</html>
