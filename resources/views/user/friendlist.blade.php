@extends('user/master')

@section('content')

<div class="container mt-5">
    {{-- Optional session message --}}
    {{-- 
    @if (session('msg'))
        <div class="alert alert-danger">
            {{ session('msg') }}
        </div>
    @endif 
    --}}

    <h1 class="mb-4 text-center">Friends</h1>

    <!-- Add Friend Section -->
    <div class="card mb-5 shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Add Friend</h5>
        </div>
        <div class="card-body">
            <form class="row g-2">
                <div class="col-md-10">
                    <input type="text" class="form-control" placeholder="Search by Phone Number or Email ID">
                </div>
                <div class="col-md-2">
                    <button class="btn btn-success w-100" type="button" data-bs-toggle="modal" data-bs-target="#myModal">Search</button>
                </div>
            </form>
        </div>
    </div>




    <!-- Pending Approval Section -->
    <div class="card mb-5 shadow-sm">
        <div class="card-header bg-warning text-dark">
            <h5 class="mb-0">Pending Approval</h5>
        </div>
        <div class="card-body">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Sr. No.</th>
                        <th>User Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1.</td>
                        <td>Raju</td>
                        <td>9876543210</td>
                        <td>raju@example.com</td>
                        <td><span class="badge bg-warning text-dark">Pending</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- All Friends List Section -->
    <div class="card mb-5 shadow-sm">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">All Friends List</h5>
        </div>
        <div class="card-body">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Sr. No.</th>
                        <th>User Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1.</td>
                        <td>Raju</td>
                        <td>9876543210</td>
                        <td>raju@example.com</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Friend</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Modal body..
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

</div>
@endsection
