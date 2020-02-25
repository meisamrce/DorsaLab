<?php
	header('X-XSS-Protection:0');
	require_once '../config.php';
	$main->setDisplayErrors(true);
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
						Lab 06 - Remote File Inclusion (RFI)
						-
						RFI Attack 01
					</h2>
                </div>
            </header>
            <section>
                <div class="container-fluid fa-lang">
				    <a href="<?php print BASE_URL ?>/rfi/01.php?page=home.php" class="btn btn-success">Home</a>
				    <a href="<?php print BASE_URL ?>/rfi/01.php?page=about.php" class="btn btn-success">About us</a>
				    <a href="<?php print BASE_URL ?>/rfi/01.php?page=contact.php" class="btn btn-success">Contact us</a>
					<br>
					<br>
					<?php
						$page = $main->get('page');
						if($page != '')
							include $page;
						else
							include 'home.php';
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