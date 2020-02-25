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
						XSS Attack 09 - Reflected XML 1
					</h2>
                </div>
            </header>
            <section>
                <div class="container-fluid fa-lang">
					  <div class="form-group">
						<label for="fn">Name :</label>
						<input type="text" class="form-control" id="fn">
					  </div>
					  <button type="button" id="btn_send" class="btn btn-success">Send</button>
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
	
	$(document).ready(function(){
		$('#btn_send').click(function(){
			 var fn = $('#fn').val();
			 var p = {'fn':fn};
			 $.get('xss/09_xml.php',p,function(data){
				 var xml = $( data );
				 var y = xml.find( "fn" ).text()
				 $('#result').html(  'Hi <b>' +  y + '</b>');
			 });
		});
	})
</script>
</body>
</html>