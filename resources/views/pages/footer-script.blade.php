<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- InputMask -->
<script src="{{asset('plugins/inputmask/jquery.inputmask.min.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- bs-custom-file-input -->
<script src="{{asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="{{asset('dist/js/demo.js')}}"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>

<!-- DataTables  & Plugins -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<!-- Date range picker -->
<script>
  $('#reservation').daterangepicker()
</script>

<script>
  $(function () {
    bsCustomFileInput.init();
  });
</script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    $('#startdate').datetimepicker({
        format: 'YYYY-MM-DD'
    })
    $('#enddate').datetimepicker({
        format: 'YYYY-MM-DD'
    })
    //Money Euro
    $('[data-mask]').inputmask()
    // Summernote
    $('#summernote').summernote()
        
  })
</script>

<!-- Deleting School -->
<script>
  $(".delete-school-button").click(function() {
    let school_id = $(this).attr("data-school");
    $("#deleted-school").attr("value",school_id);
  });
</script>

<!-- Deleting Driver -->
<script>
  $(".delete-driver-button").click(function() {
    let driver_id = $(this).attr("data-driver");
    $("#deleted-driver").attr("value",driver_id);
  });
</script>

<!-- Selecting School -->
<script>
  $("#school-list").change(function() {
    var school_code = $(this).children("option:selected").attr('data-school-code');
    if(school_code == "SB"){
      $('#school-name').prop("readonly", false);
      $("#school-name").attr("value","");
    }else{
      $('#school-name').prop("readonly", true);
      $("#school-name").attr("value","");
      $("#school-name").attr("value",school_code);
    }    
  });
</script>

<!-- Confirimg query -->
<script>
  $(".confirm-query-button").click(function() {
    let booking_id = $(this).attr("data-booking");
    $("#confirmed-query").attr("value",booking_id);
  });
</script>

<!-- Approving booking -->
<script>
  $(".approve-booking-button").click(function() {
    let booking_id = $(this).attr("data-booking");
    $("#approved-booking").attr("value",booking_id);
  });
</script>

<!-- Canceling booking -->
<script>
  $(".cancel-booking-button").click(function() {
    let booking_id = $(this).attr("data-booking");
    $("#deleted-booking").attr("value",booking_id);
  });
</script>

<!-- Approving task -->
<script>
  $(".approve-task-button").click(function() {
    let booking_id = $(this).attr("data-booking");
    $("#approved-task").attr("value",booking_id);
  });
</script>

<!-- Selecting Driver -->
<script>
  $("#driver-list").change(function() {
    var vehicle_number = $(this).children("option:selected").attr('data-vehicle-number');
    $("#vehicle-number").attr("value",vehicle_number);
  });
</script>

<!-- Schedule result -->
<script>
  $("#schedule-search-button").click(function() {
    let driver_name = $('#driver-list').children("option:selected").attr('data-driver-name');
    let vehicle_number = $('#driver-list').children("option:selected").attr('data-vehicle-number');
    let driver_slot = $('#driver-slot').children("option:selected").attr('data-driver-slot');
    
    let school_code = $('.info-box-number').attr('data-school-code');
    let time = $('#pickup-time').val();
    let trip_direction = $('.info-box-number').attr('data-trip-direction');
    let student_name = $('#student-name').attr('data-student-name');
    let vehicle = "Bus 3";
    // if(driver_name == " "){
    //   var result = "Information missing";
    // }else{
    //   if(vehicle_number == "undefined" && vehicle_number == "null" && trip_name == "undefined"){

    //   }
    // }
    var result = "Available for: "+driver_name+"/"+vehicle_number+"/"+driver_slot;
    var trip_code = school_code+"/"+vehicle+"/"+trip_direction+" "+student_name+" ("+time+")";
    $("#schedule-result").attr("value",result);
    $(".trip-code").attr("value",trip_code);
  });
</script>


<!-- Ajax Shop ucode -->
<script>
  $("#shopUcode").click(function() {
    const alphabet = 'ABCDEFGHIJKLM';
    const alphabet2 = 'NOPQRSTUVWXYZ';
    const randomCharacter = alphabet[Math.floor(Math.random(2) * alphabet.length)]
    const randomCharacter2 = alphabet2[Math.floor(Math.random(2) * alphabet2.length)]
    var dt = new Date();
    var ucode = "MX"+randomCharacter+dt.getMinutes()+randomCharacter2+String(dt.getSeconds()).padStart(2, '0');
    $("#shop-ucode").val(ucode);
  });
</script>

<!-- NFT Unique ID -->
<script>
  $("#generateNftId").click(function() {
    var uniqueId = "M"+Math.floor(1000 + Math.random()*9000)+"A"+Math.floor(1000 + Math.random()*9000)+"X"+Math.floor(1000 + Math.random()*9000)+"X"+Math.floor(1000 + Math.random()*9000);
    $("#nft-unique-id").val(uniqueId);
  });
</script>
<!-- Subscription type selection -->
<script>
  $("#couponType").change(function() {
    if($('#couponType').val() == 'subscription'){
      $('#subscriptionTypes').show();
      $('#boosterCount').hide();
      $('input[name=booster_count]').val('');
    }else{
      $('#subscriptionTypes').hide();
      $('#boosterCount').show();
      $('input[name=subscription]').prop('checked', false);
    }
  });
</script>
