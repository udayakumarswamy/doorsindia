<?php
  session_start();
  include 'header.php';
  if(isset($_POST['submit'])) {
    $testimonial = addslashes($_POST['testimonial']);
    $postedBy = addslashes($_POST['postedBy']);

    if($testimonial == '') {
      echo "Testimonial field required.";
    } elseif ($postedBy == '') {
      echo "Posted by field required.";
    } else {
      $sql = "UPDATE door_testimonials SET message='".$testimonial."', postedBy='".$postedBy."' WHERE id=".intval($_GET[id]);
      if ($conn->query($sql) === TRUE) {
        echo "Testimonial successfully updated.";
      }
    }
  }
?>
  <div class="container dash-wrap">
	<div class="row">
	  <div class="col-md-12">
      <?php
      $sql = "SELECT * FROM door_testimonials WHERE id=".intval($_GET['id']);
      $result = $conn->query($sql);
      if ($result->num_rows == 0) {
        header("Location: testimonials.php");
      } else {
        $row = $result->fetch_assoc();
      ?>
      <form action="" method="POST">
        <div>
          <label>Testimonial</label>
          <textarea name="testimonial" id="testimonial"><?php echo $row['message']; ?></textarea>
        </div>
        <div>
          <label>Testimonial By</label>
          <input type="text" name="postedBy" id="postedBy" value="<?php echo $row['postedBy']; ?>">
        </div>
        <div>
          <input type="submit" name="submit" id="submit" value="Update Testimonial">
        </div>
      </form>
      <?php
    }
      ?>
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