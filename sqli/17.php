<?php
	require_once '../config.php';
	if($main->post('btn_reg'))
	{
		$fn = $main->post('fn');
		$ln = $main->post('ln');
		$username = $main->post('username');
		$password = $main->post('password');
		$email = $main->post('email');
		$q = "INSERT INTO users (email,fn,ln,username,password,is_admin) 
			VALUES ('$email','$fn','$ln','$username','$password','0')";
		$main->query($q);
		$main->redirect('?msg=ok');
	}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<base href="<?php print BASE_URL; ?>">
    <title>Dorsa Lab Vulnerable Web Application</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.default.css">
    <link rel="shortcut icon" href="images/favicon.ico">
</head>
<body>
<div class="page">
    <?php require_once '../template/header.php'; ?>
    <div class="page-content d-flex align-items-stretch">
        <?php require_once '../template/sider.php'; ?>
        <div class="content-inner">
            <header class="page-header">
                <div class="container-fluid">
                    <h2 class="no-margin-bottom">
						Lab 01 - SQL injection Attacks (SQLi)
						-
						SQLi Attack 17 - Insert 1
					</h2>
                </div>
            </header>
            <section>
                <div class="container-fluid fa-lang">
					<?php
						$main->setOk('ok','Register successfully.');
					?>
					<form method="post" action="" autocomplete="off">
					  <div class="form-group">
						<label for="fn">Fn :</label>
						<input type="text" class="form-control" id="fn" name="fn">
					  </div>
					  <div class="form-group">
						<label for="ln">Ln :</label>
						<input type="text" class="form-control" id="ln" name="ln">
					  </div>
					  <div class="form-group">
						<label for="email">Email :</label>
						<input type="text" class="form-control" id="email" name="email">
					  </div>					  
					  <div class="form-group">
						<label for="username">Username :</label>
						<input type="text" class="form-control" id="username" name="username">
					  </div>
					  <div class="form-group">
						<label for="password">Password :</label>
						<input type="password" class="form-control" id="password" name="password">
					  </div>					  
					  <button type="submit" name="btn_reg" value="1" class="btn btn-success">Register</button>
					</form>				
                </div>
            </section>
            <?php require_once '../template/footer.php'; ?>
        </div>
    </div>
</div>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.cookie.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/front.js"></script>
</body>
</html>