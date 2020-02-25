<?php
	require_once '../config.php';
	$limit = $main->get('limit'); 
	if($limit == '')
		$limit = 0;
	$q = "SELECT * FROM users limit $limit,2 ";
	$r = $main->queryMultiple($q);
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
						SQLi Attack 26 - Limit 1
					</h2>
                </div>
            </header>
            <section>
                <div class="container-fluid text-center fa-lang">
							<table class="table table-bordered">
							  <thead>
								<tr>
								  <th scope="col">#</th>
								  <th scope="col">First Name</th>
								  <th scope="col">Last Name</th>
								  <th scope="col">Username</th>
								</tr>
							  </thead>
							  <tbody>
							  <?php
							    do
							    {
									if ($result=mysqli_store_result($main->dbLink))
									{
										
										while($users = $main->getRow($result))
										{
									  ?>
											<tr>
											  <th scope="row"><?php print $users['id']; ?></th>
											  <td><?php print $users['fn']; ?></td>
											  <td><?php print $users['ln']; ?></td>
											  <td><?php print $users['username']; ?></td>
											</tr>
										<?php
										}
										mysqli_free_result($result);
									}
								}while (mysqli_next_result($main->dbLink));
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