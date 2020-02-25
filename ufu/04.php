<?php
	header('X-XSS-Protection:0');
	require_once '../config.php';
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
						Lab 09 - Unrestricted File Upload (UFU)
						-
						UFU Attack 04
					</h2>
                </div>
            </header>
            <section>
                <div class="container-fluid fa-lang">
					<?php
						if($main->post('btn_send'))
						{
							$error = $_FILES['file']['error'];
							if($error == 0)
							{
								$filename = $_FILES['file']['name'];
								$tmp=$_FILES['file']['tmp_name'];
								$type=$_FILES['file']['type'];
								if($type != 'image/png')
								{
									 print "Error File Not Allowed!";
								}
								else
								{
									move_uploaded_file($tmp,"../uploads/".$filename);
									print "File is ../uploads/$filename";
								}
							}
							else
							{
								print 'Error File Not Upload';
							}
						}
					?>
					<br>
					<form method="post" action="" autocomplete="off" enctype="multipart/form-data">
					  <div class="form-group">
						<label for="file">File :</label>
						<input type="file" class="form-control" id="file" name="file">
					  </div>
					  <button type="submit" name="btn_send" value="1" class="btn btn-success">Send</button>
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