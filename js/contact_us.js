send = () =>{
  let name = document.querySelector('#name').value;
  let msg = document.querySelector('#msg').value;
  let contact = document.querySelector('#contact').value;
  let email = document.querySelector('#email').value;

  let fd = new FormData();
  fd.append('name',name);
  fd.append('msg',msg);
  fd.append('contact',contact);
  fd.append('email',email);


    fetch("Sent-msg.php",{
        method:"POST",
        headers:{
            // "Content-Type":"application/json",
            "Accept": 'application/json',
        },
        body: fd
    }).then(res=>res.text()).then((resData)=>{
        console.log(resData);
        alert(resData);
         resData = JSON.parse(resData);
         console.log(resData);
         if(resData=='success'){
             document.getElementById('msg').innerHTML= "<h3>Thank you for contacting us wewillget back to you shortly</h3>";
        }
         else{
             alert('Invalid Details');
         }
      }).catch(err =>{
        alert(err);
    });
}