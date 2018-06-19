<?php include('header.php') ?>
<?php include('dbconn.php') ?>
<?php
$ticket_id = $_GET['id'];
$message="";
$errors=array();
//die;
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'ticket');
if(isset($_POST['Reply'])){
// receive all input values from the form
$message= mysqli_real_escape_string($db, $_POST['message']);

if (count($errors) == 0) {
$query = "INSERT INTO replies(ticket_id,user_id,text)
      VALUES('$ticket_id', '$ticket_id', '$message')";
mysqli_query($db, $query);
}
}
?>
<?php
 
require 'config.php';

 
if(isset($_FILES['fupload'])) {
     
    if(preg_match('/[.](jpg)|(gif)|(png)$/', $_FILES['fupload']['name'])) {
         
        $filename = $_FILES['fupload']['name'];
        $source = $_FILES['fupload']['tmp_name'];   
       $target = $path_to_image_directory . $filename;
         
        move_uploaded_file($source, $target);
          $file= '<img src="' . $path_to_image_directory . $filename . '" alt="image" />';
          $query = "INSERT INTO replies(ticket_id,user_id,text)
          VALUES('$ticket_id', '$ticket_id', '$file')";
          mysqli_query($db, $query);
           
    }
}
?>
<!DOCTYPE html>
<html>
	<head>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet"  type="text/css" id="style.css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="chatstyle.css">
		<link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
	</head>
	<!------ Include the above in your HEAD tag ---------->
	<body>
		<div class="container" style="margin-top: 20px;">
			<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
			<div class="row" style="margin-left: -15px;">
				<div class="col-sm-8">
					<!-- Contenedor Principal -->
					
					<form method='post' action='chat.php' >
						
						<?php
							$ticket_id = $_GET['id'];
							//die;
							// connect to the database
							$db = mysqli_connect('localhost', 'root', '', 'ticket');
							if (isset($_GET['id'])) {
							$sql = "SELECT text FROM replies where ticket_id='$ticket_id'";
							$result = $db->query($sql);
							if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) {
								//$text=$row['text'];
							
						?>
						<div class="comments-container">
							<ul id="comments-list" class="comments-list">
								<li>
									<div class="comment-main-level">
										<!-- Avatar -->
										<div class="comment-avatar"><img src="http://localhost/demo/responsive%20ticket%20system/images/fullsized/bird.jpg" alt=""></div>
										<!-- Contenedor del Comentario -->
										<div class="comment-box">
											<div class="comment-head">
												<h6 class="comment-name by-author"><a href="http://localhost/demo/responsive%20ticket%20system/chat.php"></a></h6>
												<i class="fa fa-reply"></i>
												<i class="fa fa-heart"></i>
											</div>
											<div class="comment-content" style="overflow: hidden" class="img-responsive" >
												<?php
												//echo $text;
												echo $row['text'];
												?>
												
											</div>
										</div>
									</div>
								</li>
							</ul>
						</div>
						<?php
							}
						}
						}
						
						?>
					</form>
					<div class="container">
						
						<div class="row" style="margin-left: 0px;">
							
							<div class="col-md-8">
								<div class="widget-area no-padding blank">
									<div class="status-upload">
										<form  method="post" enctype="multipart/form-data">
											<textarea name="message" placeholder="Write your comments here!" ></textarea>
											<button type="submit" class="btn btn-success green" name="Reply">
											<i class="fa fa-share"></i>Reply</button>
											<input type="file" name="fupload" class="img-responsive" ></button>
										</form>
										</div><!-- Status Upload  -->
										</div><!-- Widget Area -->
									</div>
									
								</div>
							</div>
						</div>
						<div class="col-sm-4" style="margin-top: 50px;">
							<div class="container-fluid">
								<table class="table ">
									<H3>Ticket detail</H3>
									<thead>
										<tr>
											<th>Ticket_id</th>
											<th>Title</th>
											<th>description</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$ticket_id = $_GET['id'];
										//die;
										// connect to the database
										$db = mysqli_connect('localhost', 'root', '', 'ticket');
										if (isset($_GET['id'])) {
										
										$sql = "SELECT id,title,description FROM tickets where id='$ticket_id'";
										$result = $db->query($sql);
										if ($result->num_rows > 0) {
										// output data of each row
										while($row = $result->fetch_assoc()) {
										
										echo "<tr>";
																								
										echo "<td>".$row["id"]."</td>";
										echo "<td>".$row["title"]."</td>";
										echo "<td>".$row["description"] ."</td>";
										echo "</tr>";
										
										}
									echo "</table>";
									} else {
									echo "0 results";
									}
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</body>
	</html>