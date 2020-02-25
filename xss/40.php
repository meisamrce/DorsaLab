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
						XSS Attack 40 - DOM XSS Url Hash2
					</h2>
                </div>
            </header>
            <section>
                <div class="container-fluid fa-lang">
					<ul class="nav nav-pills">
					  <li class="nav-item">
						<a class="nav-link active" data-h="js/js1.js" href="xss/40.php#js/js1.js">Js 1</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" data-h="js/js2.js" href="xss/40.php#js/js2.js">Js 2</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" data-h="js/js3.js" href="xss/40.php#js/js3.js">Js 3</a>
					  </li>
					</ul>
					<h1 id="h1">js 1</h1>
					<div style="padding:20px;" id="html">
						
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
			loadJs(hash);
		}
		
    function loadJs(url) {
      var scriptEl = document.createElement('script');
      if (url.match(/^https?:\/\//)) {
          alert("Sorry, cannot load a URL containing \"http\".");
        return;
      }
      scriptEl.src = url;
      document.head.appendChild(scriptEl);
    }
		

</script>
</body>
</html>