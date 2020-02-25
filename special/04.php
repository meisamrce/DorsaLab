<?php
	header('X-XSS-Protection:0');
	require_once '../config.php';
	$sid = $main->get('sid');
	if($sid != '')
	{
		session_id($sid);
		session_start();
	}
	else
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
						Lab 10 - Special Attacks
						-
						Special Attacks 04 - Session fixation
					</h2>
                </div>
            </header>
            <section>
                <div class="container-fluid fa-lang">
					<?php
					if( isset($_SESSION['user_id']))
					{
						if($main->get('logout') == '1')
						{
							unset($_SESSION['user_id']);
							$main->redirect(BASE_URL."special/04.php");
						}
						?>
						خوش آمدید
						<a href="<?php print BASE_URL; ?>special/04.php?logout=1">Logout</a>
						<?php
					}
					else
					{
						if($main->post('btn_login'))
						{
							$username = $main->safeString($main->post('username')); 
							$password = $main->safeString($main->post('password')); 
							$q = "SELECT * FROM users WHERE username = '$username' AND password = '$password' LIMIT 0,1 ";
							$r = $main->query($q);
							$user = $main->getRow($r);
							if(isset($user['id']))
							{
								$_SESSION['user_id'] = $user['id'];
								$main->redirect(BASE_URL."special/04.php");
							}
							else
							{
								$main->redirect(BASE_URL."special/04.php?msg=err");
							}
						}
						$main->setError('err','نام کاربری یا کلمه عبور اشتباه میباشد');
					?>
						<form method="post" action="" autocomplete="off">
						  <div class="form-group">
							<label for="username">Username :</label>
							<input type="text" class="form-control" id="username" name="username">
						  </div>
						  <div class="form-group">
							<label for="password">Password :</label>
							<input type="password" class="form-control" id="password" name="password">
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