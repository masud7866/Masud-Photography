<?php
include "functions.php";
if (isCookieSet()){
    header("location: dashboard.php");
}
if (isset($_POST['username'])&&isset($_POST['password']))
{
    if (login($_POST['username'],$_POST['password'])){
        header("location: dashboard.php");
    }
    else{
        $error = "Incorrect username or password!";
    }
}
?>
<!DOCTYPE html>
<html>
	
<!-- Mirrored from medialoot.com/preview/lumino-premium/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 27 Apr 2018 16:51:32 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
		<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="login-panel panel panel-default">
					<div class="panel-heading">Log in</div>
					<div class="panel-body">
						<form role="form" action="" method="post">
							<fieldset>
								<div class="form-group">
									<input class="form-control" placeholder="Username" name="username" type="text" autofocus="">
								</div>
								<div class="form-group">
									<input class="form-control" placeholder="Password" name="password" type="password" value="">
								</div>
								<div class="text-center">
									<button type="submit" class="btn btn-lg btn-primary">Login</button>
								</div>
                                <div class="text-danger">
                                <?php
                                if (isset($error)){
                                    echo $error;
                                }
                                ?>
                                </div>
							</fieldset>
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->	
	
		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>

<!-- Mirrored from medialoot.com/preview/lumino-premium/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 27 Apr 2018 16:51:32 GMT -->
</html>
