<?php
	header('X-XSS-Protection:0');
	require_once '../config.php';
	$main->setDisplayErrors(true);
	$path = $main->get('path');
	if($path != '')
	{
		header('Content-Type:image/jpeg');
		header('Content-Length: ' . filesize($path));
		$file = fopen($path, 'rb');
		if ($file) {
			fpassthru($file);
			exit;
		}
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
						Lab 08 - File & Directory Traversal (FDT)
						-
						FDT Attack 07
					</h2>
                </div>
            </header>
            <section>
                <div class="container-fluid fa-lang">
					<br>
					  <a href="<?php print BASE_URL; ?>fdt/07.php?path=img1.jpg" class="btn btn-success">Image 1</a>
					  <a href="<?php print BASE_URL; ?>fdt/07.php?path=img2.jpg" class="btn btn-success">Image 2</a>
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