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
						XSS Attack 37 - DOM XSS 1
					</h2>
                </div>
            </header>
            <section>
                <div class="container-fluid fa-lang">	
					<table align="center" cellspacing="2" cellpadding="5" id="data_table" border="1">
					<tr>
					<th>Name</th>
					<th>Country</th>
					<th>Age</th>
					</tr>

					<tr id="row1">
					<td id="name_row1">Ankit</td>
					<td id="country_row1">India</td>
					<td id="age_row1">20</td>
					<td>
					<input type="button" id="edit_button1" value="Edit" class="edit" onclick="edit_row('1')">
					<input type="button" id="save_button1" value="Save" class="save" onclick="save_row('1')">
					<input type="button" value="Delete" class="delete" onclick="delete_row('1')">
					</td>
					</tr>

					<tr id="row2">
					<td id="name_row2">Shawn</td>
					<td id="country_row2">Canada</td>
					<td id="age_row2">26</td>
					<td>
					<input type="button" id="edit_button2" value="Edit" class="edit" onclick="edit_row('2')">
					<input type="button" id="save_button2" value="Save" class="save" onclick="save_row('2')">
					<input type="button" value="Delete" class="delete" onclick="delete_row('2')">
					</td>
					</tr>

					<tr id="row3">
					<td id="name_row3">Rahul</td>
					<td id="country_row3">India</td>
					<td id="age_row3">19</td>
					<td>
					<input type="button" id="edit_button3" value="Edit" class="edit" onclick="edit_row('3')">
					<input type="button" id="save_button3" value="Save" class="save" onclick="save_row('3')">
					<input type="button" value="Delete" class="delete" onclick="delete_row('3')">
					</td>
					</tr>

					<tr>
					<td><input type="text" id="new_name"></td>
					<td><input type="text" id="new_country"></td>
					<td><input type="text" id="new_age"></td>
					<td><input type="button" class="add" onclick="add_row();" value="Add Row"></td>
					</tr>

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
<script>
		function edit_row(no)
		{
		 document.getElementById("edit_button"+no).style.display="none";
		 document.getElementById("save_button"+no).style.display="block";
			
		 var name=document.getElementById("name_row"+no);
		 var country=document.getElementById("country_row"+no);
		 var age=document.getElementById("age_row"+no);
			
		 var name_data=name.innerHTML;
		 var country_data=country.innerHTML;
		 var age_data=age.innerHTML;
			
		 name.innerHTML="<input type='text' id='name_text"+no+"' value='"+name_data+"'>";
		 country.innerHTML="<input type='text' id='country_text"+no+"' value='"+country_data+"'>";
		 age.innerHTML="<input type='text' id='age_text"+no+"' value='"+age_data+"'>";
		}

		function save_row(no)
		{
		 var name_val=document.getElementById("name_text"+no).value;
		 var country_val=document.getElementById("country_text"+no).value;
		 var age_val=document.getElementById("age_text"+no).value;

		 document.getElementById("name_row"+no).innerHTML=name_val;
		 document.getElementById("country_row"+no).innerHTML=country_val;
		 document.getElementById("age_row"+no).innerHTML=age_val;

		 document.getElementById("edit_button"+no).style.display="block";
		 document.getElementById("save_button"+no).style.display="none";
		}

		function delete_row(no)
		{
		 document.getElementById("row"+no+"").outerHTML="";
		}

		function add_row()
		{
		 var new_name=document.getElementById("new_name").value;
		 var new_country=document.getElementById("new_country").value;
		 var new_age=document.getElementById("new_age").value;
			
		 var table=document.getElementById("data_table");
		 var table_len=(table.rows.length)-1;
		 var row = table.insertRow(table_len).outerHTML="<tr id='row"+table_len+"'><td id='name_row"+table_len+"'>"+new_name+"</td><td id='country_row"+table_len+"'>"+new_country+"</td><td id='age_row"+table_len+"'>"+new_age+"</td><td><input type='button' id='edit_button"+table_len+"' value='Edit' class='edit' onclick='edit_row("+table_len+")'> <input type='button' id='save_button"+table_len+"' value='Save' class='save' onclick='save_row("+table_len+")'> <input type='button' value='Delete' class='delete' onclick='delete_row("+table_len+")'></td></tr>";

		 document.getElementById("new_name").value="";
		 document.getElementById("new_country").value="";
		 document.getElementById("new_age").value="";
		}
</script>
</body>
</html>