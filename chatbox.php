<?php include('header.php') ?>
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
  <body>
    <div class="container" style="margin-top: 70px">
      <div class="row" style="margin-left: -30px;">
        <div class="col-sm-8">
          <div class="container-fluid">
            <div class="form-group">
              <textarea class="form-control"  rows="5" id="comment" name="text"></textarea>
            </div>
            <form method="post">
              <div class="form-group">
                <input type="text" class="form-control" id="text" placeholder="Write your comments here!" name="comment">
              </div>
              <input type="file" name="fupload">
              <button type="submit" class="btn btn-primary">Reply</button>
            </form>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="container-fluid">
            <table class="table ">
              <thead>
                <tr>
                  <th>Ticket_id</th>
                  <th>Username</th>
                  <th>Title</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Ali</td>
                  <td>abc</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>