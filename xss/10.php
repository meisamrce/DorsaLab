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
						Lab 02 - Cross-Site Scripting (XSS)
						-
						XSS Attack 10 - Reflected XML 2
					</h2>
                </div>
            </header>
            <section>
                <div class="container-fluid fa-lang">
					<?php
						if($main->post('btn_send'))
						{
							$xml = $main->post('xml'); 
							try {
								$lDOMDocument = new DOMDocument();
								$lDOMDocument->resolveExternals = true;
								$lDOMDocument->substituteEntities = true;
								$lDOMDocument->preserveWhiteSpace=true;
								$lDOMDocument->loadXML($xml);
								echo "<fieldset>";
								echo "<legend>Text Content Parsed From XML</legend>";
								echo "<div width='600px'>" . $lDOMDocument->textContent . "</div>";
								echo "</fieldset>";
								echo "<div>&nbsp;</div>";
								restore_error_handler();
							} 
							catch(Exception $e) 
							{
								echo $CustomErrorHandler->FormatError($e, "Could not parse XML because the input is mal-formed or could not be interpreted.");
							}							
						}
					?>
					<br>
					<form method="post" action="" autocomplete="off">
					  <div class="form-group">
						<label for="xml">XML String :</label>
						<textarea class="form-control" style="height:120px;" id="xml" name="xml"></textarea>
					  </div>
					  <button type="submit" name="btn_send" value="1" class="btn btn-success">XML Check</button>
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