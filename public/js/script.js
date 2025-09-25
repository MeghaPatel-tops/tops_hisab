console.log("script load");

function sendOpt(email){
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const isValid = emailRegex.test(email);
    if(isValid){
        let token = document.getElementById('token').value;
        $.ajax({
            method:"POST",
            url:'http://127.0.0.1:8000/verifymail',
            data:{email:email,},
            headers: {
                'X-CSRF-TOKEN': token,
            },
            success:function(data){
                data = JSON.parse(data)
                console.log(data.status);
                
                if(data.status==1){
                    document.getElementById('otpid').style.display="block";
                }
                if(data.status==2){
                    alert(data.error)    
                }
            },
            error:function(err){
                console.log(err);
            }
        })
    }
}
