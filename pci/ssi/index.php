<?php
	header('X-XSS-Protection:0');
	require_once '../../config.php';
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
    <?php require_once '../../template/header.php'; ?>
    <div class="page-content d-flex align-items-stretch">
        <?php require_once '../../template/sider.php'; ?>
        <div class="content-inner">
            <header class="page-header">
                <div class="container-fluid">
                    <h2 class="no-margin-bottom">
						Lab 05 - PHP Code Injection (PCI)
						-
						PCI Attack 07 - Server Side Injection (SSI)
					</h2>
                </div>
            </header>
            <section>
                <div class="container-fluid fa-lang">
					<?php
						if($main->get('btn_send'))
						{
							$fn = $main->get('fn'); 
							$file = fopen("ssi.shtml", "w") or die("Unable to open file!");
							fwrite($file,"Hi ".$fn.", Welcome to BTS Pentesting Lab<br/>");
							fwrite($file,"<br/>Your IP: <!--#echo var='REMOTE_ADDR' --><br/>");
							fwrite($file,"<br/>Current Time: <!--#echo var='DATE_LOCAL' --><br/>");
							fwrite($file,"<br/>This document last modified: <!--#echo var='LAST_MODIFIED' -->");
							fclose($file);
							header("Location:ssi.shtml");
						}
					?>
					<br>
					<form method="get" action="" autocomplete="off">
					  <div class="form-group">
						<label for="fn">Name :</label>
						<input type="text" class="form-control" id="fn" name="fn">
					  </div>
					  <button type="submit" name="btn_send" value="1" class="btn btn-success">Send</button>
					</form>					
                </div>
            </section>
            <?php require_once '../../template/footer.php'; ?>
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