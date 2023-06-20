// const updatestaff = document.querySelector("#updatestaff"),
//     update = document.querySelector("#update"),
//     err1 = document.querySelector(".err"),
//     succ1 = document.querySelector(".succ"),
//     errorText1 = document.querySelector(".error-message"),
//     successText1 = document.querySelector(".success-message");

document.getElementById('updateProfile').onsubmit = (e) => {
    e.preventDefault();
}


async function updateProfiles(buttonID) {
    const before = document.getElementById('updateBtn').innerHTML;
    var btnName2 = document.getElementById(buttonID);

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "models/updateStaff.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;

              loadpage(btnName2);
              setTimeout(() => {
                  if (data === "Successful") {
                    stoploader(btnName2, before);
                    // showAlert2("Your changes have been saved");
                    setTimeout(() => {
                    document.location.reload();
                    }, 1000);

                } else {
                    stoploader(btnName2, before);
                    document.querySelector('.errMsg').style.display = 'block';
                    document.querySelector('.errMsg').innerHTML = data;
                                      
                }
              }, 2000);
              
          }
      }
    }
    let formData = new FormData(document.getElementById('updateProfile'));
    xhr.send(formData);
}


function loadpage(theID) {
    if (theID.disabled = true) {
            theID.innerHTML = 
                            `<div class="spinner-border text-light loader" role="status" >
                                <span class="visually-hidden">Loading...</span>
                            </div>`;
    }

}

function showAlert2(info) {
    document.getElementById('toast2').style.display = "block";
    document.getElementById('toast2Msg').innerHTML = info;
}


function stoploader(theID1, before) {
    theID1.disabled = false;
    theID1.innerHTML = before;
}

function closeAlert2() {
    document.getElementById('toast2').style.display = "none";
}