<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/bootstrap/css/bootstrap.min.css";?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/dist/css/AdminLTE.min.css";?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/dist/css/skins/_all-skins.min.css";?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/plugins/iCheck/flat/blue.css";?>">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/plugins/morris/morris.css";?>">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css";?>">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/plugins/datepicker/datepicker3.css";?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/plugins/daterangepicker/daterangepicker.css";?>">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css";?>">
  <link rel="stylesheet" href="<?php echo base_url()."assets/plugins/datatables/dataTables.bootstrap.css";?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->



 <!-- JAVASCRIPT -->
  <!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url()."assets/plugins/jQuery/jquery-2.2.3.min.js";?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url()."assets/bootstrap/js/bootstrap.min.js";?>"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php echo base_url()."assets/plugins/morris/morris.min.js";?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url()."assets/plugins/sparkline/jquery.sparkline.min.js";?>"></script>
<!-- jvectormap -->
<script src="<?php echo base_url()."assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js";?>"></script>
<script src="<?php echo base_url()."assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js";?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url()."assets/plugins/knob/jquery.knob.js";?>"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php echo base_url()."assets/plugins/daterangepicker/daterangepicker.js";?>"></script>
<!-- datepicker -->
<script src="<?php echo base_url()."assets/plugins/datepicker/bootstrap-datepicker.js";?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url()."assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js";?>"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url()."assets/plugins/slimScroll/jquery.slimscroll.min.js";?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url()."assets/plugins/slimScroll/fastclick.js";?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()."assets/dist/js/app.min.js";?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?php echo base_url()."assets/dist/js/pages/dashboard.js";?>"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url()."assets/dist/js/demo.js";?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url()."assets/plugins/datatables/jquery.dataTables.min.js";?>"></script>
<script src="<?php echo base_url()."assets/plugins/datatables/dataTables.bootstrap.min.js";?>"></script>
<!-- <script>
    $(document).ready(function(){
      $('#example1').dataTable();
    });
</script> -->
<script type="text/javascript">
  $(function () {
    $("#tbl_produk").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  }); 
</script>