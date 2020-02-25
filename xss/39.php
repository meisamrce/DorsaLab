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
						XSS Attack 39 - DOM XSS Url Hash1
					</h2>
                </div>
            </header>
            <section>
                <div class="container-fluid fa-lang">
					<ul class="nav nav-pills">
					  <li class="nav-item">
						<a class="nav-link active" data-h="1" href="xss/39.php#1">Image 1</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" data-h="2" href="xss/39.php#2">Image 2</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" data-h="3" href="xss/39.php#3">Image 3</a>
					  </li>
					</ul>
					
					<div style="padding:20px;" id="html">
						<img src="images/avatar1.png" alt="avatar">
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
			run();
			
			$('.nav-link').click(function(){
				$('.nav-link').removeClass('active');
				$(this).addClass('active');
				run($(this).attr('data-h'));
			})
			
		});
		
		
		function run(h)
		{
			var hash;
			if(typeof h != 'undefined')
			{
				hash = h;
			}
			else
			{
				hash = location.hash.substring(1);
			}
			var html = "<img src='images/avatar"+hash+".png' alt='avatar'>";
			$('#html').html(html);
		}

</script>
</body>
</html>