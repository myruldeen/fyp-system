<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Project Detail
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Students</li>
        <li class="active">Project Detail</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            
            <div class="box-body">
              <div class="row">
              	<?php 
              	if (isset($_GET['id'])) {
              		$student_id = $_GET['id'];
              	} else {
              		$student_id = '';
              	}
              	$sql = "SELECT * FROM projects WHERE student_id = '$student_id'";
              	$query = $conn->query($sql);
              	if ($query) {
              		$row = $query->fetch_assoc();
              	}

              	 ?>
      					<div class="col-lg-4 col-md-4 col-xs-4">
      						<div class="thumbnail">
      					      <img src="<?= (!empty($row['photo'])) ? '../images/'.$row['photo'] : '../images/profile.jpg'; ?>" alt="..."> 
      					    </div> 
      					</div>
      					<div class="col-lg-8">
      						<h2 class="page-header"><?php echo $row['project_title'] ?></h2>
      						<h4><?php echo $row['project_description'] ?></h4><hr>
      					    <p><span class="label label-success"><?php 
                    $query = $conn->query("SELECT * FROM category WHERE id = '".$row['project_category']."'");
                    $db_row = $query->fetch_assoc();
                    echo $db_row['name']; 
                    ?></span></p>
                    <p>
                      <a href='#' class='btn btn-primary btn-flat edit_project' data-id='<?php echo $student_id ?>'><span class='fa fa-edit'></span></a>
                    </p>
      					</div>			
      				</div>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/student_modal.php'; ?>
  <?php include '_modal/_project_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $(document).on('click', '.edit_project', function(e){
    e.preventDefault();
    $('#edit_project').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'project_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.projid').val(response.proid);
      $('#edit_title').val(response.project_title);
      $('#edit_description').val(response.project_description);
      $('#selcategory').val(response.project_category);
      $('#selcategory').html(response.name);

      // $('.del_stu').html(response.fullname);
    }
  });
}

</script>
</body>
</html>
