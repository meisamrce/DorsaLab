<?php
	require_once '../config.php';
	$id1=get();
	$id=$main->get('id');
	if($id == '')
		$id = 1;
	if($id1 == '')
		$id1 = 1;
	$q = "SELECT * FROM users WHERE id = '$id' LIMIT 0,1 ";
	$r = $main->query($q);
	$user = $main->getRow($r);
	
	function get()
	{
		$qs_array= explode("&",$_SERVER['QUERY_STRING']);
		foreach($qs_array as $key => $value)
		{
			$val=substr($value,0,2);
			if($val=="id")
			{
				$id_value=substr($value,3,500); 
				return $id_value;
				break;
			}
		}
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
						SQLi Attack 34 - Bypass WAF HTTP Parameter Pollution
					</h2>
                </div>
            </header>
            <section>
                <div class="container-fluid text-center fa-lang">
					<?php
					if(!is_numeric($id1))
					{
						?>
						<div class="alert alert-danger" role="alert">
							<span class="fa fa-shield"></span>
							WAF Detected!
						</div>	
						<?php
					}
					else
					{
					?>
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
					<?php
					}
					?>
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