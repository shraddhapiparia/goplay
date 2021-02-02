<!DOCTYPE html>
<html  lang="en-gb" dir="ltr">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<meta name="generator" content="MYOB"/>
<title>Go!Play.</title>
<link href="/images/favicon.png" rel="shortcut icon" type="image/vnd.microsoft.icon"/>
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery-noconflict.js" type="text/javascript"></script>
<script src="js/jquery-migrate.min.js" type="text/javascript"></script>
<script src="js/core.js" type="text/javascript"></script>
<script src="js/preview.js" type="text/javascript"></script>
<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>


<link href="http://localhost/sample/main.php" rel="canonical"/>
<link rel="stylesheet" href="css/font-awesome.min.css " type="text/css"/>
<link rel="stylesheet" href="css/preview.css" type="text/css"/>
</head>
<div id="akeeba-renderjoomla">
<body class="">
<?php

require 'C:/xampp/htdocs/goplay/connect.php';
session_start();

/*Session will stay alive for 10 seconds if user remains idle.*/
$session_duration = 10;

/* define variables and set to empty values */
$username = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["userid"];
  $password =$_POST["passwordinput"];
  
  /* Fetching details if username matches with a record in database */
    $sql = "SELECT * FROM Users WHERE AppUserName = :uname";
    $rec = $pdoConn->prepare($sql);
    $rec->execute(['uname' => $username]);
    $userdetails = $rec->fetch(PDO::FETCH_ASSOC);
	
	/* If a row is returned successfully, fetching the password and matching with the input entered by the user */
    if (count($userdetails) > 0 && password_verify($password, $userdetails['AppUserPassword'])):
	  /* Concatenating First Name and Last Name */
      $fullname = $userdetails['UserFName']." ".$userdetails['UserLName'];
	  $logged_in=true;
      //echo $fullname;
	endif;
}
?>
<!--?php 
$logged_in=true;
$username=dnjhj;
?-->
	
	<div class="header" id="header">
		<div class="container">
			<div class="row">
				<div class="col-xs-5 col-sm-3 col-md-3">
					<a id="logo" href="main.php">
						<img class="img-responsive" src="images/downloads/logo.jpg">
					</a>
				</div>
				<div class="col-xs-2 col-sm-4 col-md-9">
					<div id="product-tools" class="clearfix">
						<div class="product-links hidden-xs">
						
							<?php 
								if($logged_in==true)
									{ 
									  echo "Logged in as".$fullname;
									  echo '&nbsp&nbsp<a class="btn btn-success btn-md btn-login hidden-sm hidden-xs" href="#logout" data-toggle="modal">Logout</a>';
									}else{
										echo '<div class="account-register">
								<a class="btn btn-primary btn-md btn-registration hidden-sm hidden-xs" href="#sign-up" data-toggle="modal">Create an Account</a> &nbsp;
								<a class="btn btn-success btn-md btn-login hidden-sm hidden-xs" href="#login" data-toggle="modal">Login</a>
							</div>';
									}
							?>
						
							<!--div class="account-register" style="display:<!--?php echo $logged_in==true ? 'none':'block'  ?> ">
								<a class="btn btn-primary btn-md btn-registration hidden-sm hidden-xs" href="#sign-up" data-toggle="modal">Create an Account</a> &nbsp;
								<a class="btn btn-success btn-md btn-login hidden-sm hidden-xs" href="#login" data-toggle="modal">Login</a>
							</div-->
						
						</div>
						<div id="responsive" class=" hidden-sm hidden-xs" >
							<a id="desktop" href="#" class="active"><i class="fa fa-desktop"></i></a> &nbsp;
							<a id="tablet-landscape" href="#"><i class="fa fa-tablet"></i></a> &nbsp;
							<a id="tablet-portrait" href="#"><i class="fa fa-tablet"></i></a> &nbsp; &nbsp;
							<a id="phone-landscape" href="#"><i class="fa fa-mobile"></i></a>&nbsp; &nbsp;
							<a id="phone-portrait" href="#"><i class="fa fa-mobile"></i></a> 
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<div id="templates-wrapper" style="display: none;">
	<div class="container">
		<div class="templates-demo">
			<div class="clearfix" style="margin-bottom: 20px;">
				<a href="#GoPlay"><strong>Go!Play.</strong></a>
			</div>				
		</div>
	</div>
</div>

 <!-- Popup for login-->
 <div class="modal fade bs-modal-sm" id="login" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content col-lg-12">
	<div class="">
            <form class="form-horizontal" method="post">
            <fieldset>
			<!-- Sign In Form -->
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="userid">User Name:</label>
              <div class="controls">
                <input  id="userid" name="userid" type="text" class="form-control" placeholder="User Name" class="input-medium" required="">
              </div>
            </div>

            <!-- Password input-->
            <div class="control-group">
              <label class="control-label" for="passwordinput">Password:</label>
              <div class="controls">
                <input required="" id="passwordinput" name="passwordinput" class="form-control" type="password" placeholder="********" class="input-medium">
              </div>
            </div>

            <!-- Checkbox for remember me -->
            <div class="control-group">
              <label class="control-label" for="rememberme"></label>
              <div class="controls">
                <label class="checkbox inline" for="rememberme-0">
                  <input type="checkbox" name="rememberme" id="rememberme-0" value="Remember me">
                  Remember me
                </label>
              </div>
            </div>

            <!-- Button -->
            <div class="control-group">
              <label class="control-label" for="signin"></label>
              <div class="controls">
                <center><button id="signin" name="signin" class="btn btn-success" onclick="authorize_user()">Sign In</button></center>
              </div>
            </div>
            </fieldset>
            </form>
		</div>
		<?php
		echo "<h2>Your Input:</h2>";
		echo $username;
		echo "<br>";
		echo $password;
		echo "<br>";
		?>
		<div class="modal-footer">
			<center>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</center>
		</div>
  </div> 
  </div>
 </div>
 
 <!-- Pop up for register -->
 <div class="modal fade bs-modal-sm" id="sign-up" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content col-lg-12">
	<div class="">
             <form class="form-horizontal">
            <fieldset>
            <!-- Sign Up Form -->
			<!-- Text input-->
			<div class="control-group">
              <label class="control-label" for="userid">UserName:</label>
              <div class="controls">
                <input id="userid" name="userid" class="form-control" type="text" placeholder="Username" class="input-large" required="">
              </div>
            </div>
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="Email">Email:</label>
              <div class="controls">
                <input id="Email" name="Email" class="form-control" type="text" placeholder="CrazyPlayer@gmail.com" class="input-large" required="">
              </div>
            </div>
			
			 <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="userid">Location:</label>
              <div class="controls">
                <input id="userid" name="userid" class="form-control" type="text" placeholder="Username" class="input-large" required="">
              </div>
            </div>
			
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="userid">Sport Preference 1:</label>
              <div class="controls">
                <input id="userid" name="userid" class="form-control" type="text" placeholder="Username" class="input-large" required="">
              </div>
            </div>
            
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="userid">Name:</label>
              <div class="controls">
                <input id="userid" name="userid" class="form-control" type="text" placeholder="FirstName LastName" class="input-large" required="">
              </div>
            </div>
            
            <!-- Password input-->
            <div class="control-group">
              <label class="control-label" for="password">Password:</label>
              <div class="controls">
                <input id="password" name="password" class="form-control" type="password" placeholder="********" class="input-large" required="">
                <em>1-8 Characters</em>
              </div>
            </div>
            
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="reenterpassword">Re-Enter Password:</label>
              <div class="controls">
                <input id="reenterpassword" class="form-control" name="reenterpassword" type="password" placeholder="********" class="input-large" required="">
              </div>
            </div>
            
                        
            <!-- Button -->
            <div class="control-group">
              <label class="control-label" for="confirmsignup"></label>
              <div class="controls">
                <button id="confirmsignup" name="confirmsignup" class="btn btn-success">Sign Up</button>
              </div>
            </div>
          </fieldset>
          </form>
		</div>
		<div class="modal-footer">
			<center>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</center>
		</div>
  </div> 
  </div>
 </div> 
</nav>
</div>

<!--div class="row">
	<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
		<div class="page-login-form box login">
			<div class="login-description text-center">
				Welcome Back
			<p>You can sign in with your email.</p>
			</div>
			<form action="/login?task=user.login" method="post" class="form-validate">
				<div class="form-group">
					<div class="group-control">
						<input type="text" name="username" id="username" value="" class="validate-username required" size="25" placeholder="Username" required aria-required="true" autofocus />
					</div>
				</div>
				<div class="form-group">
					<div class="group-control">
						<input type="password" name="password" id="password" value="" placeholder="Password" class="validate-password required" size="25" maxlength="99" required aria-required="true"/>
					</div>
				</div>
				<div class="checkbox">
					<label>
						<input id="remember" type="checkbox" name="remember" class="inputbox" value="yes">Remember me </label>
				</div>
				<div class="form-group text-right">
					<button type="submit" class="btn btn-success btn-lg btn-block btn-login">Log in </button>
				</div>
			<input type="hidden" name="return" value="aHR0cHM6Ly9zaGFwZWJvb3RzdHJhcC5uZXQvaXRlbS8xNTI0OTYzLWV2ZW50by1mcmVlLW11c2ljLWV2ZW50LXRlbXBsYXRl"/>
			<input type="hidden" name="970de6efe028b489bbca8f48697d7770" value="1"/>
			</form>
		</div>
		<div class="form-links">
			<ul>
				<li>
					<a href="/profile/edit?view=reset">Forgot your password?</a>
				</li>
				<li>
					<a href="/profile/edit?view=remind">Forgot your username?</a>
				</li>
				<li>
					<a href="/create-an-account">Don't have an account?</a>
				</li>
			</ul>
		</div>
	</div>
</div-->



<div class="container fade" id="sign-up">
	
</div>

<div id="demoframe" style="height: 481px; width: 1152px; margin-top: 60px;">
<iframe name="demoframe" src="//localhost/goplay/index.php" frameborder="0"></iframe>
</div>
</body></div>
</html>
