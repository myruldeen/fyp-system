<?php include 'includes/session.php'; ?>
<?php 
  include 'includes/timezone.php'; 
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }
?>
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
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
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
      <!-- Small boxes (Stat box) -->
       <div class="row">
        <div class="col-xs-12">

          <div class="box">
        <?php 

          $q = $conn->query("SELECT student_id FROM projects WHERE student_id = '".$user['id']."'");
          if ($q) {
            if ($q->num_rows == 0) {
              ?>
              <div class="box-header with-border">
              <?php 
              $sql = "SELECT student_id FROM projects WHERE student_id = '".$user['id']."'";
              $q = $conn->query($sql);
              if ($q->num_rows == 0) {
                echo "<a href=\"#addnew\" data-toggle=\"modal\" class=\"btn btn-primary btn-sm btn-flat\"><i class=\"fa fa-plus\"></i> New</a> <- Please add a project";
              }

               ?>
            </div>
              <?php

            } else {
              ?>
              <div class="box-body">
              <table id="example1" class="table table-bordered display nowrap">
                <thead>
                  <th>Course</th>
                  <th>Project</th>
                  <th>Supervisor</th>
                  <th>View/Edit</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT *, students.id AS studid, supervisor.photo AS sp
                    FROM students 
                    LEFT JOIN course 
                    ON course.id=students.course_id 
                    LEFT JOIN supervisor
                    ON supervisor.id = students.supervisor_id
                    LEFT JOIN projects
                    ON projects.student_id = students.id WHERE students.id = '".$user['id']."'";

                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      $photo = (!empty($row['sp'])) ? '../images/'.$row['sp'] : '../images/profile.jpg';
                      echo "
                        <tr>
                          <td>".$row['code']."</td>
                         
                          <td>".$row['project_title']."</td>
                          <td><img src='".$photo."' width='30px' height='30px'> ".$row['name']."</td>
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
              <?php
            }
          }

        ?>
            
             
            
          </div>
        </div>
      </div>
      </section>
      <!-- right col -->
    </div>
  	<?php include 'includes/footer.php'; ?>
    <?php include '_modal/_project_modal.php'; ?>
</div>

<!-- End Chart Data -->
<?php include 'includes/scripts.php'; ?>
</body>
</html>
