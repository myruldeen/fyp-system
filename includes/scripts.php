<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
<script src="js/dataTables.min.js"></script>
<script src="js/dataTables.responsive.min.js"></script>


<!-- Data Table Initialize -->
<script>
  $(function () {
    $.extend( $.fn.dataTable.defaults, {
        responsive: true
    });
    $('#example1').DataTable()
    var bookTable = $('#projectlist').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : false,
      'autoWidth'   : false,
       responsive : true
    })

    $('#searchBox').on('keyup', function(){
      bookTable.search(this.value).draw();
  });

  })
</script>