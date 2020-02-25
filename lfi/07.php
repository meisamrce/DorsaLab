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
						Lab 07 - Local File Inclusion (LFI)
						-
						LFI Attack 07
					</h2>
                </div>
            </header>
            <section>
                <div class="container-fluid fa-lang">
				    <a href="<?php print BASE_URL ?>/lfi/07.php?page=home.php" class="btn btn-success">Home</a>
				    <a href="<?php print BASE_URL ?>/lfi/07.php?page=about.php" class="btn btn-success">About us</a>
				    <a href="<?php print BASE_URL ?>/lfi/07.php?page=contact.php" class="btn btn-success">Contact us</a>
					<br>
					<br>		
					<?php
						$page = $main->get('page');
						if($page != '')
						{
							include $page;
						}
						else
							include 'home.php';
					?>						
					<?php
						if($main->post('btn_send'))
						{
							$fieldName = 'file';
							$path = '../uploads';
							$error = $_FILES[$fieldName]['error'];
							$name = mb_strtolower(basename($_FILES[$fieldName]['name']),'UTF-8');
							$tmp_name = $_FILES[$fieldName]['tmp_name'];
							$allowFiles = array('jpg','gif');
							if($error == 0)
							{
								$ext = pathinfo($name,PATHINFO_EXTENSION);
								$index = array_search($ext,$allowFiles);
								if($index !== FALSE )
								{
									$isImg = @getimagesize($tmp_name);
									if(is_array($isImg) && count($isImg) > 0)
									{
										$newFileName = date('YmdHis').mt_rand(000000,999999);
										$newFileName .= '.'.$allowFiles[$index];
										$move = move_uploaded_file($tmp_name,"$path/$newFileName");
										if($move)
											print "$path/$newFileName";
										else
											print 'file not upload';//file not upload
									}
									else
									{
										print 'image not valid file';
									}
								}
								else
									print 'file not allow';//file not allow
							}

						}
					?>
					<br>
					<form method="post" action="" autocomplete="off" enctype="multipart/form-data">
					  jpg - gif
					  <div class="form-group">
						<label for="file">File :</label>
						<input type="file" class="form-control" id="file" name="file">
					  </div>
					  <button type="submit" name="btn_send" value="1" class="btn btn-success">Upload</button>
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