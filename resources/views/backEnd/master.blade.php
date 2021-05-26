<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('title')</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('public/backEnd/')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="{{asset('public/backEnd/font-awesome/css/font-awesome.css')}}">

  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('public/backEnd/')}}/css/sb-admin-2.min.css" rel="stylesheet">
  

  <link href="{{asset('public/backEnd/')}}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('public/backEnd')}}/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{asset('public/backEnd')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

<!-- Writting style -->
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script>
  @stack('css')
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    @include('backEnd.includes.menu')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        @include('backEnd.includes.header')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        @yield('content')
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      @include('backEnd.includes.footer')
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('public/backEnd/')}}/vendor/jquery/jquery.min.js"></script>
  <script src="{{asset('public/backEnd/')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('public/backEnd/')}}/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('public/backEnd/')}}/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="{{asset('public/backEnd/')}}/vendor/chart.js/Chart.min.js"></script>

  <!-- Data Table -->
  <script src="{{asset('public/backEnd/')}}/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="{{asset('public/backEnd/')}}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('public/backEnd/')}}/js/demo/chart-area-demo.js"></script>
  <script src="{{asset('public/backEnd/')}}/js/demo/chart-pie-demo.js"></script>

  <script src="{{asset('public/backEnd/')}}/js/demo/datatables-demo.js"></script>

  <!-- handlebars -->
  <script src="{{asset('public/backEnd/js/handlebars.min.js')}}"></script>

  <!-- Select2 -->
<script src="{{asset('public/backEnd')}}/plugins/select2/js/select2.full.min.js"></script>

<!-- sweetalert section start here -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript">
  //coustom code start
  $(function (){
    $(document).on('click','#delete',function(e){
      e.preventDefault();
      var link = $(this).attr("href");
      //coustom code end
          Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes!'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = link;
            Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'
            )
          }
        })
    });
  });

</script>
<!-- sweetalert section start here -->

<!--image instant Show script-->
  <script type="text/javascript">
    $(document).ready(function(){
      $('#image').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
          $('#showImage').attr('src',e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
      });
    });
  </script>

<!-- select2 tool -->
  <script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })

    })
  </script>

  <script type="text/javascript">
    $('.demo').iconpicker();
  </script>

  @stack('js')
</body>

</html>
