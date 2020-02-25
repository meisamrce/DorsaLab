<?php
	require_once '../config.php';
	$id = $main->get('id'); 
	if($id == '')
		$id = 1;
	$q = "SELECT * FROM users WHERE id = '$id' ";
	$r = $main->query($q);
	$user = $main->getRow($r);
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
						SQLi Attack 02 - Union
					</h2>
                </div>
            </header>
            <section>
                <div class="container-fluid text-center fa-lang">
					<table class="table table-bordered">
					  <tbody>
						<tr>
						  <th scope="row">First Name</th>
						  <td><?php print $user['fn']; ?></td>
						</tr>
						<tr>
						  <th scope="row">Last Name</th>
						  <td><?php print $user['ln']; ?></td>
						</tr>
						<tr>
						  <th scope="row">Username</th>
						  <td><?php print $user['username']; ?></td>
						</tr>						
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