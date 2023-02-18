<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->

<!-- End plugin css for this page -->
<base href="/public" >
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
            <div class="card">
                <div class="card-body">
        @if (session()->has('message'))
        <div class="alert alert-success">
            <button type="btn-close"  class="close"  data-dismiss="alert">
                x
            </button>
        {{ session()->get('message') }}
        </div>

        @endif
    <form action="{{ url('send_emailnotification',$data->id) }}" method="Post" >
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Greeting</label>
            <input type="text" class="form-control bg-white " name="greeting" id="name" style="color: black" >
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Body</label>
            <input type="text" class="form-control bg-white " id="phone" name="body"  style="color: black" >
        </div>
    
        <div class="mb-3">
            <label for="room" class="form-label">Action Text</label>
            <input type="text" name="action_text" class="form-control bg-white " id="room" style="color: black">
        
        </div>
        <div class="mb-3">
            <label for="room" class="form-label">Action Url</label>
            <input type="text" name="action_url" class="form-control bg-white " id="room" style="color: black">
        
        </div>
        <div class="mb-3">
            <label for="room" class="form-label">End Part</label>
            <input type="text" name="end_part" class="form-control bg-white " id="room" style="color: black">
        
        </div>
        

        <button type="submit" class="btn btn-success mb-4">Senting</button>
        </form>
    
    </div>
            </div>
        </div>
    </div>
    <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
@include('admin.js')
<!-- plugins:js -->
<!-- End custom js for this page -->
</body>
</html>