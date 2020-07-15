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
        Student List
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Students</li>
        <li class="active">Student List</li>
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
                  <th>Course</th>
                  <th>Photo</th>
                  <th>Student ID</th>
                  <th>Fullname</th>
                  <th>Supervisor</th>
                  <th>Tools</th>
                  <th>Project</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT *, students.id AS studid
                    FROM students 
                    LEFT JOIN course 
                    ON course.id=students.course_id 
                    LEFT JOIN supervisor
                    ON supervisor.id = students.supervisor_id";

                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      $photo = (!empty($row['photo'])) ? '../images/'.$row['photo'] : '../images/profile.jpg';
                      echo "
                        <tr>
                          <td>".$row['code']."</td>
                          <td>
                            <img src='".$photo."' width='30px' height='30px'>
                          </td>
                          <td>".$row['student_id']."</td>
                          <td>".$row['fullname']."</td>
                          <td>".$row['name']."</td>
                          <td>
                            <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['studid']."'><i class='fa fa-edit'></i> View</button>
                          </td>
                          <td>
                            <a href='project_detail.php?id=".$row['studid']."' class='btn btn-primary btn-flat'><span class='fa fa-edit'></span></a>
                          </td>
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

  // $(document).on('click', '.view', function(e){
  //   e.preventDefault();
  //   $('#view_project').modal('show');
  //   var id = $(this).data('id');
  //   getRow(id);
  // });
  $(document).on('click', '.view', function(e){
    e.preventDefault();
    $('#view_project').modal('show');
    var id = $(this).data('id');
    projectDetail(id);
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

function projectDetail(id) {
  $.ajax({
    type: 'POST',
    url: 'project_row.php',
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
