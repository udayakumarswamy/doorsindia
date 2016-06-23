<?php
session_start();
include 'header.php';
$result1 = $conn->query("SELECT * FROM door_property_details");
$num_rows = $result1->num_rows;
?>
<div class="container dash-wrap">
	<div class="row">
   <div class="col-md-12">
     <h2>Contacts List</h2>
     <table class="table">
      <tr>
       <th>S.No</th>
       <th>Contact</th>
       <th>Created On</th>
     </tr>
     <?php
     $sql = "SELECT * FROM door_contacts ORDER BY id DESC";
     $result = $conn->query($sql);

     if ($result->num_rows > 0) {
      $i = 1;
                // output data of each row
      while($row = $result->fetch_assoc()) {
        ?>
        <tr>
         <td><?php echo $i; $i++; ?></td>
         <td><?php echo $row['phone']; ?></td>
         <td><?php echo $row['createdOn']; ?></td>
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