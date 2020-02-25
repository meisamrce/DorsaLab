<?php	
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
						Lab 04 - Remote Command Execution (RCE)
						-
						RCE Attack 02
					</h2>
                </div>
            </header>
            <section>
                <div class="container-fluid fa-lang">
					<?php
						if($main->get('btn_ping'))
						{
							$ip = $main->get('ip'); 
							if( stristr( php_uname(), 'Windows NT' ) ) {
								// Windows
								$cmd = shell_exec( 'ping  ' . $ip .' -n 2');
							}
							else {
								// *nix
								$cmd = shell_exec( 'ping  -c 4 ' . $ip .' -W 1');
							}
							$html = "<pre class=\"highlight\" dir=\"ltr\">{$cmd}</pre>";	
							print $html;						
						}
					?>				
					<h1>Ping Tools</h1>
					<br>
					<form method="get" action="" autocomplete="off">
					  <div class="form-group">
						<label for="ip">Ip or Domain :</label>
						<input type="text" class="form-control" id="ip" name="ip">
					  </div>
					  <button type="submit" name="btn_ping" value="1" class="btn btn-success">Ping</button>
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