<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->

<!-- End plugin css for this page -->
@include('admin.css')
<!-- inject:css -->
<!-- endinject -->
<!-- Layout styles -->

</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
        @include('admin.slidebar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_navbar.html -->
        @include('admin.nav')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">     

        @if (session()->has('message'))
        <div class="alert alert-success">
            <button type="btn-close"  class="close"  data-dismiss="alert">
                x
            </button>
        {{ session()->get('message') }}
        </div>

        @endif
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
    <form class="forms-sample" action="{{ url('upload_doctor') }}" method="Post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <div class="mb-3">
            <label for="name" class="form-label"> Doctor Name</label>
            <input type="text" class="form-control bg-white " name="name" id="name" placeholder="Write the name" style="color: black" required="">
          </div>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="number" class="form-control bg-white " id="phone" name="phone" placeholder="Write the number" style="color: black" required="">
        </div>
        <div class="mb-3">
            <label for="select" class="form-label">Speciality</label>
            <select id="select" name="speciality" class="form-select bg-white " style="color: black" required="">
                <option > --Select--</option>
                <option value="skin">skin </option>
                <option value="heart">heart</option>
                <option value="eye">eye</option>
                <option value="nose">nose </option>
            </select>
        </div>
        <div class="mb-3">
            <label for="room" class="form-label"> Room No</label>
            <input type="text" name="room" class="form-control bg-white " id="room" placeholder="Write the room number" style="color: black" required="">
        
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Doctor Image</label>
            <input class="form-control bg-white " name="image" type="file" id="image" required="">
        </div>

        <button type="submit" class="btn btn-success mb-4">Submit</button>
    </form>
</div>
</div>

    </div>
    </div>
    <!-- main-panel ends -->
</div>
</div>

    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
@include('admin.js')
<!-- plugins:js -->
<!-- End custom js for this page -->
</body>
</html>