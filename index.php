<?php include 'includes/conn.php'; ?>
<?php
	$where = '';
	if(isset($_GET['category'])){
		$catid = $_GET['category'];
		$where = 'WHERE category.id = '.$catid;
	}
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue-light layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	  	<br><br><br>
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-8 col-sm-offset-2">
	        		
	        		<div class="box">
	        			<div class="box-header with-border">
	        				<div class="form-group">
				                <input type="text" class="form-control input-lg" id="searchBox" placeholder="Search for Title, Category">
				                <!-- <span class="input-group-btn">
				                    <button type="button" class="btn btn-primary btn-flat btn-lg"><i class="fa fa-search"></i> </button>
				                </span> -->
				            </div>
	        			</div>
	        			<div class="box-body">
	        				<div class="input-group col-sm-5">
				                <span class="input-group-addon">Category:</span>
				                <select class="form-control" id="catlist">
				                	<option value=0>ALL</option>
				                	<?php
				                		$sql = "SELECT * FROM category";
				                		$query = $conn->query($sql);
				                		while($catrow = $query->fetch_assoc()){
				                			$selected = ($catid == $catrow['id']) ? " selected" : "";
				                			echo "
				                				<option value='".$catrow['id']."' ".$selected.">".$catrow['name']."</option>
				                			";
				                		}
				                	?>
				                </select>
				             </div>
	        				<table class="table table-bordered table-striped display nowrap" id="projectlist" >
			        			<thead>
			        				<th>ID</th>
			        				<th>Title</th>
			        				<th>Description</th>
			        				<th>Category</th>
			        			</thead>
			        			<tbody>
			        			<?php
			        				$sql = "SELECT *, projects.id AS project_id FROM projects
			        				LEFT JOIN category
			        				ON category.id = projects.project_category 
			        				$where";
			        				$query = $conn->query($sql);
			        				while($row = $query->fetch_assoc()){
			        					// $status = ($row['status'] == 0) ? '<span class="label label-success">available</span>' : '<span class="label label-danger">not available</span>';
			        					?>
			        					<tr>
			        							
			        							<td><?= $row['project_id'] ?></td>
			        							<td><?= $row['project_title'] ?></td>
			        							<td><?= $row['project_description'] ?></td>
			        							<td><span class="label label-success"><?= $row['name'] ?></span></td>
			        						</tr>
			        					<?php
			        					
			        				}
			        			?>
			        			</tbody>
			        		</table>
	        			</div>
	        		</div>
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
	$('#catlist').on('change', function(){
		if($(this).val() == 0){
			window.location = 'index.php';
		}
		else{
			window.location = 'index.php?category='+$(this).val();
		}
		
	});
});
</script>
</body>
</html>