<?php
	header('X-XSS-Protection:0');
	require_once '../config.php';
	$main->setDisplayErrors(true);
	require_once '../helper/smarty/SmartyBC.class.php';
	$smarty = new SmartyBC();
	$smarty->setCompileDir('../uploads/templates_compile');
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
						Lab 05 - PHP Code Injection (PCI)
						-
						PCI Attack 06 - Server Side Template Injection (SSTI)
					</h2>
                </div>
            </header>
            <section>
                <div class="container-fluid fa-lang">
					<?php
						if($main->get('btn_send'))
						{
							$fn = $main->get('fn');
							$template_string = "Your Name is  : <b>{$fn}</b>";
							$smarty->display('string:'.$template_string);
						}
												
					?>
					<br>
					<form method="get" action="" autocomplete="off">
					  <div class="form-group">
						<label for="fn">First Name:</label>
						<input type="text" class="form-control" id="fn" name="fn">
					  </div>					  
					  <button type="submit" name="btn_send" value="1" class="btn btn-success">Run</button>
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