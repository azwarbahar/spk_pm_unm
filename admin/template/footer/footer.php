
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="#">Universitas Negeri Makassar</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <!-- <b>Version</b> 3.0.5 -->
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/spk_pm_unm/assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/spk_pm_unm/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- bs-custom-file-input -->
<script src="/spk_pm_unm/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/spk_pm_unm/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="/spk_pm_unm/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/spk_pm_unm/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/spk_pm_unm/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/spk_pm_unm/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<!-- jQuery Knob Chart -->
<script src="/spk_pm_unm/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- ChartJS -->
<script src="/spk_pm_unm/assets/plugins/chart.js/Chart.min.js"></script>
<!-- Ekko Lightbox -->
<script src="/spk_pm_unm/assets/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/spk_pm_unm/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="/spk_pm_unm/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- Summernote -->
<script src="/spk_pm_unm/assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/spk_pm_unm/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/spk_pm_unm/assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/spk_pm_unm/assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/spk_pm_unm/assets/dist/js/demo.js"></script>
<!-- bootstrap-switch-button -->
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/dist/bootstrap-switch-button.min.js"></script>

<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $("#tbl_example11").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $("#tbl_example12").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $("#tbl_example13").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $("#tbl_example21").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $("#tbl_example22").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $("#tbl_example23").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $("#tbl_example31").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $("#tbl_example32").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $("#tbl_example33").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $("#tbl_example41").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $("#tbl_example42").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $("#tbl_example43").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $("#tbl_example51").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $("#tbl_example52").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $("#tbl_example53").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $("#tbl_example61").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $("#tbl_example62").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $("#tbl_example63").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $("#tbl_example71").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $("#tbl_example72").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $("#tbl_example73").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

    
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Chrome',
          'IE',
          'FireFox',
          'Safari',
          'Opera',
          'Navigator',
      ],
      datasets: [
        {
          data: [700,500,400,600,300,100],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var donutChart = new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });


  })
</script>

<script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init();
  });

  function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

</script>

</body>
</html>
