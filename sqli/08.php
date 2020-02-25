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
						Lab 01 - SQL injection Attacks (SQLi)
						-
						SQLi Attack 08 - Union
					</h2>
                </div>
            </header>
            <section>
                <div class="container-fluid fa-lang">
					<?php
						if($main->post('btn_find'))
						{
							$user_id = $main->post('user_id'); 
							$q = "SELECT * FROM users WHERE id = '$user_id' LIMIT 0,1 ";
							$r = $main->query($q);
							$user = $main->getRow($r);
							?>
								<table class="table table-bordered text-center">
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
							<?php
						}
					?>
					<form method="post" action="" autocomplete="off">
					  <div class="form-group">
						<label for="user_id">User ID :</label>
						<input type="text" class="form-control" id="user_id" name="user_id">
					  </div>
					  <button type="submit" name="btn_find" value="1" class="btn btn-success">Find</button>
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