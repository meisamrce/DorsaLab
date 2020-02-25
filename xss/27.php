<?php
	header('X-XSS-Protection:0');
	require_once '../config.php';
	session_start();
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
						Lab 02 - Cross-Site Scripting (XSS)
						-
						XSS Attack 27 - Reflected Session Hijacking
					</h2>
                </div>
            </header>
            <section>
                <div class="container-fluid fa-lang">
					<?php
						if(isset($_SESSION['admin_id']))
						{
							print $_SESSION['admin_id']. ' Is Login';
						}
						else
						{
							if($main->post('btn_login'))
							{
								$u = $main->post('u'); 
								$p = $main->post('p'); 
								if($u == 'admin' && $p == '1234')
								{
									$_SESSION['admin_id'] = $u;
									$main->redirect(BASE_URL.'xss/27.php');
								}
								else
								{
									print 'Login Error';
								}
							}
					?>
					<br>
					<form method="post" action="" autocomplete="off">
					  <div class="form-group">
						<label for="u">Username :</label>
						<input type="text" class="form-control" id="u" name="u">
					  </div>
					  <div class="form-group">
						<label for="p">Password :</label>
						<input type="password" class="form-control" id="p" name="p">
					  </div>					  
					  <button type="submit" name="btn_login" value="1" class="btn btn-success">Login</button>
					</form>		
					<?php							
						}
					?>
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