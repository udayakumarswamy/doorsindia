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
      $sql = "INSERT INTO door_testimonials(message, postedBy) VALUES('".$testimonial."', '".$postedBy."')";
      if ($conn->query($sql) === TRUE) {
        echo "Testimonial successfully added.";
      }
    }
  }
?>
  <div class="container dash-wrap">
	<div class="row">
	  <div class="col-md-12">
      <form action="" method="POST">
        <div>
          <label>Testimonial</label>
          <textarea name="testimonial" id="testimonial"></textarea>
        </div>
        <div>
          <label>Testimonial By</label>
          <input type="text" name="postedBy" id="postedBy">
        </div>
        <div>
          <input type="submit" name="submit" id="submit" value="Add Testimonial">
        </div>
      </form>
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