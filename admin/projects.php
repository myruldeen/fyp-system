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
        Project List
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Students</li>
        <li class="active">Project List</li>
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
              <table id="example1" class="table table-bordered">
                <thead>
                	<th>Student</th>
                	<th>Supervisor</th>
                  <th>Photo</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Category</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT *, students.id AS studid, students.fullname AS student, projects.photo AS project_photo, category.name AS category, supervisor.name AS supervisor
                    FROM students 
                    LEFT JOIN projects 
                    ON projects.student_id=students.id 
                    LEFT JOIN supervisor
                    ON supervisor.id = students.supervisor_id
                    LEFT JOIN category
                    ON category.id = projects.project_category";


                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      $photo = (!empty($row['project_photo'])) ? '../images/'.$row['project_photo'] : '../images/profile.jpg';
                      echo "
                        <tr>
                          <td>".$row['student']."</td>
                          <td>".$row['supervisor']."</td>
                          <td>
                            <img src='".$photo."' width='30px' height='30px'>
                           
                          </td>
                          <td>".$row['project_title']."</td>
        				  <td>".$row['project_description']."</td>
        				  <td>".$row['category']."</td>
                         
                        </tr>
                      ";
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

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.photo', function(e){
    e.preventDefault();
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
