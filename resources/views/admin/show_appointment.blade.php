
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->

<!-- End plugin css for this page -->

@include('admin.css')
<link rel="stylesheet" href="tables/css/dataTables.bootstrap4.min.css">
<!-- inject:css -->
<!-- endinject -->
{{-- <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css" rel="stylesheet"> --}}


<!-- Layout styles -->

</head>
<body>
<div class="container-scroller">
    {{-- <div class="row p-0 m-0 proBanner" id="proBanner">
    <div class="col-md-12 p-0 m-0">
        <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
        <div class="ps-lg-1">
            <div class="d-flex align-items-center justify-content-between">
            <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
            <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-between">
            <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
            <button id="bannerClose" class="btn border-0 p-0">
            <i class="mdi mdi-close text-white me-0"></i>
            </button>
        </div>
        </div>
    </div>
    </div> --}}
    <!-- partial:partials/_sidebar.html -->
        @include('admin.slidebar')
    <!-- partial -->
    <!-- partial:partials/_navbar.html -->
        @include('admin.nav')
    <!-- partial -->
    
        {{--Start table  --}}
<div class="container-fluid page-body-wrapper">
    <div class="col-lg-12 stretch-card">
     <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table id="example" class="table table-bordered table-contextual">
            <thead >
                <tr>
                    <th >Ill Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Doctor Name</th>
                    <th>Date </th>
                    <th>Message </th>
                    <th>Status </th>
                    <th>Accept</th>
                    <th>Cancel</th>
                    <th>Send_Email</th>
                </tr>
            </thead>
            <tbody>
            
            </tbody>
        </table>
        </div>
        </div>
    </div>
</div>
{{--     end table     --}}
{{-- Start ajax --}}
</div>
</div>
    <!-- main-panel ends -->
    
    <!-- page-body-wrapper ends -->

<!-- container-scroller -->

@include('admin.js')
<!-- plugins:js -->

{{-- <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script> --}}

<script src="tables/js/jquery.dataTables.min.js"></script>
<script src="tables/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
    $(function(){
        var table=$('#example').DataTable({
            processing: true,
            serverSide: true,
            ajax:"{{ Route('getshowappointmet') }}",
            columns:[
                {
                    data:'name'
                },
                {
                    data:'email'
                },
                {
                    data:'phone'
                },
                {
                    data:'doctor'
                    
                },
                {
                    data:'date'
                },
                {
                    data:'message'
                },
                {
                    data:'status'
                },
                {
                    data:'accept'
                    
                },
                {
                    data:'cancel'
                },
                {
                    data:'send_mail'
                },
            ],
        });
    });

$(document).ready(function(){
        $('#example ').DataTables({
            
        });
    });
</script>
<!-- End custom js for this page -->

<style>
    .table thead th  {
        color: white;
        background-color:rgb(223, 157, 70); 
    }
    .table tbody tr.odd td{
        color: rgb(0, 0, 255);

    }
    .table tbody tr.even td{
        color: white;
        background-color: darkslategrey
    }
</style>
</body>
</html>