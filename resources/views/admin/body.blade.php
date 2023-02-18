<div class="main-panel">
    <div class="content-wrapper">
    
    <div class="row ">
        <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title"> Hospital a Doctors</h4>
            <div class="table-responsive">
                <table class="table">   
                <thead>
                    <tr>
                    <th> Doctor Name </th>
                    <th> Phone </th>
                    <th>Speciality</th>
                    <th> Image </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($doctor as $doctors)
                    <tr>
                    <td>
                    {{ $doctors->name }}
                    </td>
                    <td>  {{ $doctors->phone }} </td>
                    <td>  {{ $doctors->specialty }} </td>
                    <td>  <img src="{{ asset('doctorimage/'.$doctors->image.'') }}"> </td>
                    
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>
    </div>

    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
    
    </div>
    </footer>
    <!-- partial -->
</div>