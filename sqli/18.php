<?php
	require_once '../config.php';
	if($main->post('btn_add'))
	{
		$title = $main->post('title');
		$msg = $main->post('msg');
		$user_agent = $_SERVER['HTTP_USER_AGENT'];
		$referer = $_SERVER['HTTP_REFERER'];
		$q = "INSERT INTO messages (title,msg,user_agent,referer) 
			VALUES ('$title','$msg','$user_agent','$referer')";
		
		$main->query($q);
		$main->redirect('?msg=ok');
	}

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
						SQLi Attack 18 - Insert 2
					</h2>
                </div>
            </header>
            <section>
                <div class="container-fluid fa-lang">
					<?php
						$main->setOk('ok','Add successfully.');
					?>
					<form method="post" action="" autocomplete="off">
					  <div class="form-group">
						<label for="title">Title :</label>
						<input type="text" class="form-control" id="title" name="title">
					  </div>
					  <div class="form-group">
						<label for="msg">Message :</label>
						<textarea class="form-control" id="msg" name="msg"></textarea>
					  </div>
					  <button type="submit" name="btn_add" value="1" class="btn btn-success">Add</button>
					</form>	
					<br>
								<table class="table table-bordered text-center">
								  <tbody>
									<tr>
									  <th>Title</th>
									  <th>Message</th>
									</tr>
									<?php
										$q = "SELECT * FROM messages";
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