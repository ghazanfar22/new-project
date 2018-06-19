<?php include('header.php') ?>
<?php include('dbconn.php') ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Ticket System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body style="background: #dee1e3;">
    <div class="container" style="margin-top: 70px">
      <h1 style="text-align: center;">Ticket Support!</h1>
      <br>
      <div class="row" style="margin-left: 0px;">
        <div class="col-sm-5"  style="background-color:lavender;">
          <div class="card">
            <div class="card-body">
              <div class="header">
                <h1 style="text-align: center;">Create Your Ticket</h1>
              </div>
              <br>
              <form method="post">
                <div class="form-group">
                  <label for="title">Title:</label>
                  <input type="text" class="form-control" style="width: 50%" id="text" placeholder="Enter Ticket Title" name="title" required>
                </div>
                <div class="form-group">
                  <label for="email">URL:</label>
                  <input type="URL" class="form-control" style="width: 50%" id="email" placeholder="Enter URL" name="url" required>
                </div>
                <div class="form-group">
                  <label for="email">Description:</label>
                  <textarea type="text" class="form-control" style="width: 50%"  rows="10" cols="35" id="description" placeholder="Write Ticket Description" name="description" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="register">Register</button>
                <br>
                <br>
              </form>
            </div>
          </div>
        </div>
        <div class="col-sm-2"></div>
        <div class="col-sm-5" style="background-color:lavender;">
          <div class="card">
            <div class="card-body">
              <div class="container-fluid">
                <h1 style="text-align: center;">Log In</h1
              </div>
            </div>
            <br>
            <form method="post">
              <div class="form-group">
                <label for="username">USERNAME:</label>
                <input type="text" class="form-control" style="width: 50%" id="text" placeholder="Enter Name" name="username" required>
              </div>
              <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" style="width: 50%" id="pwd" placeholder="Enter password" name="password" required>
              </div>
              <button type="submit" class="btn btn-primary" name="login">login</button></a>
              <br>
              <br>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>