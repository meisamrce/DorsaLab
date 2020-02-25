<?php	
	header('X-XSS-Protection:0');
	require_once '../config.php';
	session_start();
	
	function generateToken()
	{
		$token = md5(uniqid().mt_rand(0,999999));
		$_SESSION['csrf_token'] = $token;
	}
	if($main->get('logout'))
	{
		unset($_SESSION['admin_id']);
		$main->redirect(BASE_URL.'csrf/04.php?msg=ok');
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
						Lab 03 - Cross-Site Request Forgery (CSRF)
						-
						XSRF Attack 04
					</h2>
                </div>
            </header>
            <section>
                <div class="container-fluid fa-lang">
					<?php
						if(isset($_SESSION['admin_id']))
						{
							if($main->post('btn_save'))
							{
								if($_SESSION['csrf_token'] == $main->post('csrf_token'))
								{
									$user_id = $_SESSION['admin_id'];
									$pass1 = $main->safeString($main->post('pass1'));
									$pass2 = $main->safeString($main->post('pass2'));
									if($pass1 != "" && $pass2 != "")
									{
										$q = "UPDATE users SET password = '$pass2'
												WHERE id = '$user_id' ";
										$r = $main->query($q);
										$row = $main->getRow($r);
									}
									$main->redirect(BASE_URL.'csrf/04.php?msg=ok');
								}
								else
									$main->redirect(BASE_URL.'csrf/04.php?msg=err');
							}							
							print 'Login :)';
							generateToken();
							?>
							<br>
							<br>
							<h1>Change Password :</h1>
							<form method="post" action="" autocomplete="off">
							  <div class="form-group">
								<label for="pass1">New Password :</label>
								<input type="password" class="form-control" id="pass1" name="pass1">
							  </div>
							  <div class="form-group">
								<label for="pass2">Retype New Password :</label>
								<input type="password" class="form-control" id="pass2" name="pass2">
							  </div>	
							  <input type="hidden" name="csrf_token" value="<?php print $_SESSION['csrf_token']; ?>"> 
							  <button type="submit" name="btn_save" value="1" class="btn btn-success">Save</button>
							  <button type="button" onclick="redirect('<?php print BASE_URL; ?>csrf/04.php?logout=1')" class="btn btn-danger">Logout</button>
							</form>		

							<br>
							<br>
							<h1>Search :</h1>
							<?php
								if($main->get('btn_send'))
								{
									$fn = $main->get('fn'); 
									print 'Hi <b>'.$fn.'</b><br>';
								}
							?>							
							<form method="get" action="" autocomplete="off">
							  <div class="form-group">
								<label for="fn">Name :</label>
								<input type="text" class="form-control" id="fn" name="fn">
							  </div>
							  <button type="submit" name="btn_send" value="1" class="btn btn-success">Send</button>
							</form>								
							<?php
						}
						else
						{
							if($main->post('btn_login'))
							{
								$u = $main->safeString($main->post('u')); 
								$p = $main->safeString($main->post('p'));
								$q = "SELECT * FROM users WHERE username = '$u'
										AND password = '$p'	";
								$r = $main->query($q);
								$row = $main->getRow($r);
								if(isset($row['id']))
								{
									$_SESSION['admin_id'] = $row['id'];
									$main->redirect(BASE_URL.'csrf/04.php');
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