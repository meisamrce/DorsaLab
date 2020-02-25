<?php
	require_once '../config.php';
	if($main->post('btn_add'))
	{
		$title = $main->safeString($main->post('title'));
		$price = $main->safeString($main->post('price'));
		$num = addslashes($main->post('num'));
		$q = "INSERT INTO products 
			VALUES ('NULL','$title','$price','$num')";
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
						Lab 05 - PHP Code Injection (PCI)
						-
						PCI Attack 09
					</h2>
                </div>
            </header>
            <section>
                <div class="container-fluid fa-lang">
					<?php
						$main->setOk('ok','Add successfully.');
					?>
					<form method="post" action="" autocomplete="off">
					  <div class="form-group">
						<label for="title">Title :</label>
						<input type="text" class="form-control" id="title" name="title">
					  </div>
					  <div class="form-group">
						<label for="price">Price :</label>
						<input type="text" class="form-control" id="price" name="price">
					  </div>
					  <div class="form-group">
						<label for="num">Number :</label>
						<input type="text" class="form-control" id="num" name="num">
					  </div>					  
					  <button type="submit" name="btn_add" value="1" class="btn btn-success">Add</button>
					</form>	
					<br>
					<a class="btn btn-success" href="pci/09_export.php">Export Data</a>
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