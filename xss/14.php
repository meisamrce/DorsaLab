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
						XSS Attack 14 - Reflected eval 1 
					</h2>
                </div>
            </header>
            <section>
                <div class="container-fluid fa-lang">
					<form method="get" action="" autocomplete="off">
					  <div class="form-group">
						<label for="a">A :</label>
						<input type="text" class="form-control" id="a" name="a">
					  </div>
					  <div class="form-group">
						<label for="b">B :</label>
						<input type="text" class="form-control" id="b" name="b">
					  </div>					  
					  <button type="submit" name="btn_send" value="1" class="btn btn-success">Sum</button>
					</form>			
					  <br>
					  <br>
					  <div id="result">
						
					  </div>					
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
<script>
	<?php
		if($main->get('btn_send'))
		{
			$a = $main->get('a'); 
			$b = $main->get('b'); 
			$a = preg_replace('/<(.*?)s(.*?)c(.*?)r(.*?)i(.*?)p(.*?)t(.*?)>/i',"", $a);
			$a = preg_replace('/<\/(.*?)s(.*?)c(.*?)r(.*?)i(.*?)p(.*?)t(.*?)>/i',"", $a);
			$b = preg_replace('/<(.*?)s(.*?)c(.*?)r(.*?)i(.*?)p(.*?)t(.*?)>/i',"", $b);
			$b = preg_replace('/<\/(.*?)s(.*?)c(.*?)r(.*?)i(.*?)p(.*?)t(.*?)>/i',"", $b);
			
			?>
				var a = parseInt('<?php print $a; ?>');
				var b = '<?php print $b; ?>';
				eval('c = a + parseInt(b)');
				$('#result').html(  'Sum is : <b>' +  c + '</b>');
			<?php
		}
	?>
</script>
</body>
</html>