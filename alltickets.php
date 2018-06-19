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
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Ticket_id</th>
            <th>Username</th>
            <th>Title</th>
            <th>Description</th>
            <th>Url</th>
            <th>View</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT tickets.id,name,title,description,url FROM user_record inner join tickets on user_record.id=tickets.id" ;
          $result = $db->query($sql);
          if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
          $id = $row['id'];
          echo "<tr>";
            echo "<td> <a href='http://localhost/demo/responsive%20ticket%20system/chat.php?id=$id'>" . $row['id'] . "</a> </td>";
            echo "<td>" . $row['name'] .  "</td>";
            echo "<td>" . $row['title'] .  "</td>";
            echo "<td>" . $row['description'] . "</td>";
            echo "<td>" . $row['url'] . "</td>";
            ?>
            <td> <a href='http://localhost/demo/responsive%20ticket%20system/chat.php?id=<?php echo $row['id'] ?>' >
              <button type="button" class="btn btn-primary btn-sm">View</button>. . </a></td>
            <?php
          echo "</tr>";
          }
        echo "</table>";
        } else {
        echo "0 results";
        }
      
        ?>
        
      </tbody>
    </table>
  </div>
</body>
</html>