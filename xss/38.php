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
						XSS Attack 38 - DOM XSS 2
					</h2>
                </div>
            </header>
            <section>
                <div class="container-fluid fa-lang">	
					<label for="name">Name : </label><span><input type="text"  name="name" id="name"></span>
					<br>
					<div id="gR"></div>
					<br>
					<span><input type="button" onclick="s();" value="Set Cookies">
					<span><input type="button" onclick="g();" value="Get Cookies">
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
  g();
  var today = new Date();
  var expiry = new Date(today.getTime() + 30 * 24 * 3600 * 1000); // plus 30 days
  function setCookie(name, value)
  {
    document.cookie=name + "=" + value + "; path=/; expires=" + expiry.toGMTString();
  }
  
  function getCookie(name)
  {
    var re = new RegExp(name + "=([^;]+)");
    var value = re.exec(document.cookie);
    return (value != null) ? value[1] : null;
  }
  
  function s(){
	    setCookie("name", document.getElementById('name').value);
  }
  
  function g(){
	    document.getElementById('gR').innerHTML = getCookie("name");
  }
</script>
</body>
</html>