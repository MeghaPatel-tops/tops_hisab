<!-- <1php
    echo "<pre>";
    print_r($pendinglist);
    exit;
?> -->

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
                    <input type="text" class="form-control" placeholder="Search by Phone Number or Email ID" id="userdata">
                  
                </div>
                <div class="col-md-2">
                    <!-- <button class="btn btn-success w-100" type="button" data-bs-toggle="modal" data-bs-target="#myModal">Search</button> -->
                    <button class="btn btn-success w-100" type="button" onclick="getFriends()">Search</button>
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
                    @foreach($pendinglist as $row)
                    <tr>
                        <td>1.</td>
                        <td>{{$row->username}}</td>
                        <td>{{$row->contact}}</td>
                        <td>{{$row->email}}</td>
                        <td><span class="badge bg-warning text-dark">{{$row->status}}</span></td>
                    </tr>
                    @endforeach
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
                    @foreach($approvedlist as $row)
                    <tr>
                        <td>1.</td>
                        <td>{{$row->username}}</td>
                        <td>{{$row->contact}}</td>
                        <td>{{$row->email}}</td>
                        <!-- <td><span class="badge bg-warning text-dark">{{$row->status}}</span></td> -->
                    </tr>
                    @endforeach
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
        <div class="card" style="width: 400px; border: none; box-shadow: none;">
            <!-- <img class="card-img-top" src="img_avatar1.png" alt="Card image"> -->
            <div class="card-body">
                <h4 class="card-title" id="usernameCard">John Doe</h4>
                <p class="card-text" id="emailCard">Some example text.</p>
                <p class="card-text" id="contactCard">Some example text.</p>
                <form action="{{route('addFriend')}}" method="post">
                    @csrf
                    <input type="hidden" name="friendId" id="friendId">
                    <button type="submit" class="btn btn-success">Add</button>
                </form>
            </div>
            </div>
        
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

</div>
<script>
 function getFriends() {
    let phone = document.getElementById('userdata').value.trim();
    if (!phone) {
        alert("Please enter a phone number");
        return;
    }

    $.ajax({
        method: 'get',
        url: 'http://127.0.0.1:8000/findfriend?phone=' + encodeURIComponent(phone),
        dataType: 'json',
        success: function(data) {
            console.log(data);
            if(data.msg){
                alert(data.msg);
            }
            else{
                prepareModel(data);
            }
          
        },
        error: function(err) {
            console.error("Error fetching friends:", err);
        }
    });
}

    function prepareModel(data){
            //data = JSON.parse(data);
            document.getElementById('usernameCard').innerHTML="Name:"+data.username;
            document.getElementById('emailCard').innerHTML="Email:"+data.email;
            document.getElementById('contactCard').innerHTML="Phone Number:"+data.contact;
            document.getElementById('friendId').value=data.uid;
           $('#myModal').modal('show')

    }
</script>
@endsection
