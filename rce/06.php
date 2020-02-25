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
						RCE Attack 06
					</h2>
                </div>
            </header>
            <section>
                <div class="container-fluid fa-lang">
					<?php
						if($main->get('btn_run'))
						{
							$h = $main->get('h'); 
							if( stristr( php_uname(), 'Windows NT' ) ) {
								// Windows
								$path = '"help\h'.$h.'.txt"';
								$cmd = shell_exec( 'type  ' . $path );
							}
							else {
								// *nix
								$path = '"help/h'.$h.'.txt"';
								$cmd = shell_exec( 'cat ' . $path );
							}
							$html = "<pre class=\"highlight\" dir=\"ltr\">{$cmd}</pre>";	
							print $html;						
						}
					?>				
					<h1>Help</h1>
					<br>
					<form method="get" action="" autocomplete="off">
					  <div class="form-group">
						<label for="h">Help :</label>
						<select class="form-control" id="h" name="h">
							<option value="1">H1</option>
							<option value="2">H2</option>
							<option value="3">H3</option>
						</select>
					  </div>
					  <button type="submit" name="btn_run" value="1" class="btn btn-success">Run</button>
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