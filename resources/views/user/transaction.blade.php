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

    <!-- <p>No items found.</p> -->
    
    

  

  

   




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
