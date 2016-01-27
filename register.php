<?php
include('connection.php');
extract($_POST);
if(isset($subForm))
{
	$name=$Name;
	$email=$email;
	$password=$password;
	$rePassword=$rePassword;
	$qt=mysql_query("select * from player where playerEmail='$email' and password='$password'");
	if(mysql_num_rows($qt))
	{
		echo "<h1 style='color:red'>User Exists</h1>";
	}
	else
	{
		if($password==$rePassword)
		{
	  mysql_query("insert into player values('','$name','$email','$password')");
		header('location:index.php');
	  }
		else
		{
			echo "<h1 style='color:red'>Password mismatch</h1>";
		}
	}

}
?>
<html>
	<head>
		<title>Registration</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets1/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<noscript><link rel="stylesheet" href="assets1/css/noscript.css" /></noscript>
		<style>
       #myForm{
       	text-align: center;
       	padding: 50px;
       }
       td
        {
        padding:5px;
        }
				input{
					width:300px;
				}
		</style>
	</head>

	<body class="is-loading">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<section id="main">
						<header>
							<h1>Registration</h1>
							<form id="myForm" method="post">
							<table align="center">
								<tr>
									<td><input type="text" name="Name" placeholder="Enter nick name" required/></td>
								</tr>
								<tr>
									<td><input type="email" name="email" placeholder="Enter Email"  required onblur="ckeckMail(this.value)"/></td>
									<td><div id="checkBox"></div></td>
								</tr>
								<tr>
									<td><input type="password" name="password" id="pass" placeholder="Enter Password" required/></td>
								</tr>
								<tr>
									<td><input type="password" name="rePassword" id="rPass" placeholder="Re-Enter Password" required onsubmit="return checkPassword()"/></td>
								</tr>
								<tr>
									<td><input type="submit" name="subForm"/></td>
								</tr>
							</table>
						</form>
						<p>Already a user???</p>
            <a href="index.php">Login</a>

						</header>
						<!--
						<hr />
						<h2>Extra Stuff!</h2>
						<form method="post" action="#">
							<div class="field">
								<input type="text" name="name" id="name" placeholder="Name" />
							</div>
							<div class="field">
								<input type="email" name="email" id="email" placeholder="Email" />
							</div>
							<div class="field">
								<div class="select-wrapper">
									<select name="department" id="department">
										<option value="">Department</option>
										<option value="sales">Sales</option>
										<option value="tech">Tech Support</option>
										<option value="null">/dev/null</option>
									</select>
								</div>
							</div>
							<div class="field">
								<textarea name="message" id="message" placeholder="Message" rows="4"></textarea>
							</div>
							<div class="field">
								<input type="checkbox" id="human" name="human" /><label for="human">I'm a human</label>
							</div>
							<div class="field">
								<label>But are you a robot?</label>
								<input type="radio" id="robot_yes" name="robot" /><label for="robot_yes">Yes</label>
								<input type="radio" id="robot_no" name="robot" /><label for="robot_no">No</label>
							</div>
							<ul class="actions">
								<li><a href="#" class="button">Get Started</a></li>
							</ul>
						</form>
						<hr />
						-->

					</section>



			</div>

		<!-- Scripts -->
			<!--[if lte IE 8]><script src="assets/js/respond.min.js"></script><![endif]-->
			<script>
				if ('addEventListener' in window) {
					window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-loading\b/, ''); });
					document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
				}
			</script>
            <script>
						function checkPassword()
						{

							var pass= document.getElementById("pass");
							var rePass=document.getElementById("rPass");
			         var passValue=pass.value;
							 var rePassValue=pass.value;
							 if(passValue==rePassValue)
							 {
								 alert("password mismatch");
								 return false;
							 }
              return true;
						}
            function ckeckMail(mail)
            {
            //var id=document.getElementById("checkBox"
						if(window.XMLHttpRequest){
          xmlhttp=new XMLHttpRequest();
        }
     else{
       xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
     }
     xmlhttp.onreadystatechange=function()
     {

                  if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
                  {
                   document.getElementById("checkBox").innerHTML=xmlhttp.responseText;
                  }
     }
                xmlhttp.open("REQUEST","checkExistingMail.php?mail="+mail,true);
         xmlhttp.send();

       }

            </script>
	</body>
</html>
