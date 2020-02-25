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
						SQLi Attack 12 - Union XML
					</h2>
                </div>
            </header>
            <section>
                <div class="container-fluid fa-lang">
					  <div class="form-group">
						<label for="username">UserName :</label>
						<input type="text" class="form-control" id="username">
					  </div>
					  <button type="button" id="btn-find" class="btn btn-success">Find</button>
					<div id="result" style="display:none;margin-top:20px;">
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
		$('#btn-find').click(function(){
			var username = $('#username').val();
			if(username != '')
			{
				$.post('sqli/12_xml.php',{'user':username},function(data){
					var html = '<table class="table table-bordered">';
					html += '<thead><tr>';
					html += '<th scope="col">#</th>';
					html += '<th scope="col">First Name</th>';
					html += '<th scope="col">Last Name</th>';
					html += '<th scope="col">Username</th>';
					html += '</tr> </thead><tbody></tbody></table>';
					$('#result').html(html);
					$('#result').show();
					var xml = $( data );
				    xml.find( "user" ).each(function()
					{
						render($(this));
					});
				});
			}
		});
		
		function render(data)
		{
			var html = '<tr>';
			html += '<th scope="row">'+data.find('id').text()+'</th>';
			html += '<td>'+data.find('fn').text()+'</td>';
			html += '<td>'+data.find('ln').text()+'</td>';
			html += '<td>'+data.find('username').text()+'</td>';
			html += '</tr>';
			$('#result tbody').append(html);
		}
</script>
</body>
</html>