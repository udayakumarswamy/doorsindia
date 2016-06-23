<?php
session_start();
include 'header.php';

?>
<div class="container dash-wrap">
	<div class="row">
		<h2 class="col-md-12"><i class="glyphicon glyphicon-th-large"></i> 
			Lastest News</h2>  	 
		</div>
		<div class="row">
			<div class="col-md-12">
				<?php
				if (isset($_POST['submit'])) {
					$news = addslashes($_POST['news']);
					$sql = "UPDATE door_news SET news='".$news."' WHERE id=1";
					if ($conn->query($sql) === TRUE) {
						echo "News successfully updated";
					}
				}


				$news = '';
				$result = $conn->query("SELECT * FROM door_news WHERE id=1");
				$num_rows = $result->num_rows;
				if ($num_rows) {
					$row = $result->fetch_assoc();
					$news = $row['news'];
				}
				?>
				<form method="POST" action="">
					<label>News</label>
					<textarea name="news" id="news"><?php echo $news; ?></textarea>
					<input type="submit" value="Update News" name="submit" id="submit" >
				</form>
			</div>
		</div>
	</div>
	
	

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
