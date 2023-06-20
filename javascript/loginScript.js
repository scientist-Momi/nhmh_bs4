
document.getElementById('loginForm').onsubmit = (e)=>{
    e.preventDefault();
}

document.getElementById('submit').onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "models/loginScript.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
            if (data === "admin")
            {
              loadpage();
              setTimeout(() => {
              location.href = "admin.dash";
              }, 2000);

            }
            else if(data === "nurse")
            {
              loadpage();
              setTimeout(() => {
              location.href = "nurse.dash";
              }, 2000);
            }
            else if(data === "doctor")
            {
              loadpage();
              setTimeout(() => {
              location.href = "doctor.dash";
              }, 2000);
            }
            else if(data === "patient")
            {
              loadpage();
              setTimeout(() => {
              location.href = "patient.dash";
              }, 2000);
            }
            else if(data === "accountant")
            {
              loadpage();
              setTimeout(() => {
              location.href = "accountant.dash";
              }, 2000);
            }
            else if(data === "blogger")
            {
              loadpage();
              setTimeout(() => {
              location.href = "blogger.dash";
              }, 2000);
            }
            else
            {
              loadpage();
              setTimeout(() => {
                document.querySelector('.errMsg').style.display = 'block';
                document.querySelector('.errMsg').innerHTML = data;

                stoploader(document.getElementById('submit'), 'Sign in');
              }, 2000);
               
            }
          }
      }
    }
    let formData = new FormData(document.getElementById('loginForm'));
    xhr.send(formData);
}






function loadpage() {
    document.getElementById('submit').innerHTML = 
                            `<div class="spinner-border text-light loader" role="status" >
                                <span class="visually-hidden">Loading...</span>
                            </div>`;

    document.getElementById('submit').disabled = true;
}

function stoploader(theID1, before) {
    theID1.disabled = false;
    theID1.innerHTML = before;
}