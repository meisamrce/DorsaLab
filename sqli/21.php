<?php
	require_once '../config.php';
	$user_agent = $_SERVER['HTTP_USER_AGENT'];
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
						Lab 01 - SQL injection Attacks (SQLi)
						-
						SQLi Attack 21 - User Agent
					</h2>
                </div>
            </header>
            <section>
                <div class="container-fluid fa-lang">
								<table class="table table-bordered text-center">
								  <tbody>
									<tr>
									  <th>Title</th>
									  <th>Message</th>
									</tr>
									<?php
										$q = "SELECT * FROM messages WHERE user_agent = '$user_agent'";
										$r = $main->query($q);
										while($rows = $main->getRow($r))
										{
									?>
									<tr>
									  <td><?php print $rows['title']; ?></td>
									  <td><?php print nl2br($rows['msg']); ?></td>
									</tr>	
									<?php
										}
									?>
								  </tbody>
								</table>

					
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