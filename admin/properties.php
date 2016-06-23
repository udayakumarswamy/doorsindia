<?php
session_start();
include 'header.php';
$result1 = $conn->query("SELECT * FROM door_property_details");
$num_rows = $result1->num_rows;
?>
<div class="container">
	<div class="row">
		<a href="addprop.php" class="btn btn-info pull-right" role="button">Add Property</a>
		<div class="table-container">
			<h2>Properties List</h2>
			<table class="table table-filter">
				<tbody>
					<?php
					$sql = "SELECT * FROM door_property_details";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							?>
							<tr>
								<td>
									<div class="media">
										<div class="media-body">
											<div class="col-md-10">
												<h4 class="title"><?php echo $row["property_name"] ?></h4>
												<p class="summary"><?php echo $row["description"] ?></p>
												<p class="table-price">Rs. <?php echo $row["actual_price"] ?></p>
											</div>
											<div class="col-md-2">
												<div class="media-meta text-right"><?php echo $row["date_of_creat"] ?></div>
												<div class="type text-right">(<?php echo $row["property_type"] ?>)</div>
												<div class="actions">
													<ul>
														<li><a href="../view.php?id=<?php echo $row["id"] ?>" target="_blank"><i class="glyphicon glyphicon-search"></i></a></li>
														<li><a href="edit.php?id=<?php echo $row["id"] ?>"><i class="glyphicon glyphicon-pencil"></i></a></li>
														<li><a href="delete.php?id=<?php echo $row["id"] ?>"><i class="glyphicon glyphicon-trash"></i></a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</td>
							</tr>
							<?php
						}
					} else {
						echo "0 results";
					}
					$conn->close();
					?>
				</tbody>
			</table>
		</div>
	</div>


	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>