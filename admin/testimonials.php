<?php
session_start();
include 'header.php';
?>
<div class="container dash-wrap">
  <a href="testimonial_add.php" class="btn btn-info pull-right" role="button">Add Testimonial</a>
  <div class="row">
   <div class="col-md-12">
     <h2>Testimonials List</h2>
     <table class="table">
      <tr>
       <th>S.No</th>
       <th>Message</th>
       <th>Posted By</th>
       <th>Created On</th>
       <th>Actions</th>
     </tr>
     <?php
     $sql = "SELECT * FROM door_testimonials";
     $result = $conn->query($sql);

     if ($result->num_rows > 0) {
      $i = 1;
                // output data of each row
      while($row = $result->fetch_assoc()) {
        ?>
        <tr>
         <td><?php echo $i; $i++; ?></td>
         <td><?php echo $row['message']; ?></td>
         <td><?php echo $row['postedBy']; ?></td>
         <td><?php echo $row['createdOn']; ?></td>
         <td>
          <a href="testimonial_edit.php?id=<?php echo $row["id"] ?>"><i class="glyphicon glyphicon-pencil"></i></a>
          <a href="testimonial_delete.php?id=<?php echo $row["id"] ?>"><i class="glyphicon glyphicon-trash"></i></a>
        </td>
      </tr>
      <?php
    }
  }
  ?>
</table>
</div>
</div>
</div>
</div>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>