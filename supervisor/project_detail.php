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
					      <img src="https://via.placeholder.com/350C" alt="..."> 
					    </div> 
					</div>
					<div class="col-lg-8">
						<h2 class="page-header"><?php echo $row['project_title'] ?></h2>
						<h4><?php echo $row['project_description'] ?></h4><hr>
					    <p><span class="label label-success"><?php echo $row['category']; ?></span></p>
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
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.view', function(e){
    e.preventDefault();
    $('#view_project').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
  
  $(document).on('click', '.sv', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'student_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.studid').val(response.studid);
      $('#edit_student_id').val(response.student_id);
      $('#edit_fullname').val(response.fullname);
      $('#selcourse').val(response.course_id);
      $('#selcourse').html(response.code);
      $('#selsupervisor').val(response.supervisor_id);
      $('#selsupervisor').html(response.name);
      $('.del_stu').html(response.fullname);
    }
  });
}

</script>
</body>
</html>
