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
						Lab 08 - File & Directory Traversal (FDT)
						-
						FDT Attack 02
					</h2>
                </div>
            </header>
            <section>
                <div class="container-fluid fa-lang">
					<?php
						$path = 'dir'.$main->get('path');
						if($path != 'dir')
						{
						  if ($dh = opendir($path)){
							while (($file = readdir($dh)) !== false){
							  if($file == '.')
								  continue;
							  if($file == '..')
								  continue;							  
							  echo "filename: " . $file . "<br>";
							}
							closedir($dh);
						  }
						}
					?>
					<br>
					  <a href="<?php print BASE_URL; ?>fdt/02.php?path=1" class="btn btn-success">Dir1 List</a>
					  <a href="<?php print BASE_URL; ?>fdt/02.php?path=2" class="btn btn-success">Dir2 List</a>
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