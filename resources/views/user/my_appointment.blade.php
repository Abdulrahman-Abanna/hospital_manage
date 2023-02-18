
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">

    <title>One Health - Medical Center HTML5 Template</title>

    <link rel="stylesheet" href="../assets/css/maicons.css">

    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

    <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

    <link rel="stylesheet" href="../assets/css/theme.css">
    {{-- <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="tables/css/dataTables.bootstrap4.min.css">

    </head>
    <body>

    <!-- Back to top button -->
    <div class="back-to-top"></div>

    <header>
        <div class="topbar">
        <div class="container">
            <div class="row">
            <div class="col-sm-8 text-sm">
                <div class="site-info">
                <a href="#"><span class="mai-call text-primary"></span> +00 123 4455 6666</a>
                <span class="divider">|</span>
                <a href="#"><span class="mai-mail text-primary"></span> mail@example.com</a>
                </div>
            </div>
            <div class="col-sm-4 text-right text-sm">
                <div class="social-mini-button">
                <a href="#"><span class="mai-logo-facebook-f"></span></a>
                <a href="#"><span class="mai-logo-twitter"></span></a>
                <a href="#"><span class="mai-logo-dribbble"></span></a>
                <a href="#"><span class="mai-logo-instagram"></span></a>
                </div>
            </div>
            </div> <!-- .row -->
        </div> <!-- .container -->
        </div> <!-- .topbar -->

        <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#"><span class="text-primary">One</span>-Health</a>

            <form action="#">
            <div class="input-group input-navbar">
                <div class="input-group-prepend">
                <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
                </div>
                <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username" aria-describedby="icon-addon1">
            </div>
            </form>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupport">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                <a class="nav-link" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="about.html">About Us</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="doctors.html">Doctors</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="blog.html">News</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact</a>
                </li>
                
                @if (Route::has('login'))
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('myappointment') }}" style="background-color:rgb(45, 207, 124)">My appointment</a>
                </li>
                <x-app-layout>
                </x-app-layout>
                
                @else
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="btn btn-primary ml-lg-3" >Login</a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('register') }}" class="btn btn-primary ml-lg-3" >Register</a>
                    </li>
                @endauth
                @endif
            
            </ul>
            </div> <!-- .navbar-collapse -->
        </div> <!-- .container -->
        </nav>
    </header>
    <div class="container-fluid">
    <div class="card">
        <div class="card-header">
    <div class="card-block">

    <table id="example" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Doctor Name</th>
                <th>Date</th>
                <th>Message</th>
                <th>Status</th>
                <th>Cancel Appointment</th>
            </tr>
        </thead>
        <tbody>
        
        </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>

    {{-- delete --}}
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('delete_appointment') }}" method="POST">
            <div class="modal-content">

                <div class="modal-body">
                    @csrf

                    <div class="form-group">
                        <p> Sure delete</p>
                        @csrf
                        <input type="hidden" name="id" id="id">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
    {{-- delete --}}


    <script src="../assets/js/jquery-3.5.1.min.js"></script>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <script src="../assets/vendor/wow/wow.min.js"></script>

    <script src="../assets/js/theme.js"></script>
    {{-- <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script> --}}
    <script src="tables/js/jquery.dataTables.min.js"></script>
    <script src="tables/js/dataTables.bootstrap4.min.js"></script>
    
    <script type="text/javascript">
        $(function(){
        var  table=$('#example').DataTable({
            processing: true,
            serverSide: true,
            ajax:"{{ Route('getdata') }}",
            columns:[{
                data:'doctor',
            },
            {
                data:'date',
            },
            {
                data:'message',
            },
            {
                data:'status',
            },
            {
                data:'cancel appointment',
                orderable: false,
                searchable: false
            },
            
            ],
        });
        });
    </script>
    <script>
        $('#example tbody').on('click', '#deletebtn', function(argument) {
            var id = $(this).attr("data-id");
            console.log(id);
            $('#deletemodal #id').val(id);
        })
    </script>
    </body>
    </html>