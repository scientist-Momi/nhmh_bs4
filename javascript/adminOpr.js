// ADD NEW STAFF =====================
// ADD NEW STAFF =====================
document.getElementById('addStaff').onsubmit = (e) => {
    e.preventDefault();
    }

async function addStaff() {
    const before = document.getElementById('addStaffBtn').innerHTML;
    const btnName = document.getElementById('addStaffBtn');


    let xhr = new XMLHttpRequest();
    xhr.open("POST", "models/addNewStaff.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;

              loadpage(btnName);
              setTimeout(() => {
                if (data === "Successful") {
                    showAlert2("Added new staff.");
                    stoploader(btnName, before);
                    setTimeout(() => {
                        document.location.reload();
                    }, 2000);

                } else {
                    stoploader(btnName, before);
                    showAlert(data);                   
                }
            }, 2000);
          }
      }
    }
    let formData = new FormData(document.getElementById('addStaff'));
    xhr.send(formData);
}
// ADD NEW STAFF =====================
// ADD NEW STAFF =====================


// SEARCH FOR ONE PATIENT=====
// SEARCH FOR ONE PATIENT=====
document.getElementById('patInp').onsubmit = (e) => {
    e.preventDefault();
    }

async function searchPat(buttonID) {
    var btnName2 = document.getElementById(buttonID);
    const before = document.getElementById('searchpat').innerHTML;

    const formData = new FormData(document.getElementById('patInp'));
    
    fetch('models/getOnePatient.php', {
        method: 'POST',
        body: formData,
    })
        .then(res => {
            return res.json()
        })
        .then(data => {
            const Status = data.status
            
            if (Status !== 200) {
                loadpage2(btnName2);
                setTimeout(() => {
                    showAlert(data.message);
                    // console.log(data.message)
                    stoploader(btnName2, before);
                    reverseshowResult(document.getElementById('resultPat1'), document.getElementById('resultPat2'));
                }, 1000);
            } else if (Status == 200) {
                loadpage2(btnName2);
                setTimeout(() => {
                    stoploader(btnName2, before);
                    showResult(document.getElementById('resultPat1'), document.getElementById('resultPat2'));
                    let placeholder = document.querySelector('#data-output5');
                    let out = "";
          
                        out += `
                                <tr>
                                    <td><img src="images/patient${data.photo}" class="img_size2"></td>
                                    <td>${data.patient_id}</td>
                                    <td>${data.firstname} ${data.lastname}</td>
                                    <td>${data.email}</td>
                                    <td>${data.phone}</td>
                                    <td>${data.address}</td>
                                    <td>${data.age}</td>
                                  
                                    <td>${data.regBy}</td>
                                    <td>${data.created_at}</td> 
                                </tr>
                            `;
                  
                    placeholder.innerHTML = out;

                }, 2000);

            }
    })
}
// SEARCH FOR ONE PATIENT=====
// SEARCH FOR ONE PATIENT=====


// SEARCHING FOR STAFF ===================
// SEARCHING FOR STAFF ===================
document.getElementById('staffInp').onsubmit = (e) => {
    e.preventDefault();
}

async function searchStaff(buttonID) {
    var btnName2 = document.getElementById(buttonID);
    const formData1 = new FormData(document.getElementById('staffInp'));
    const before = document.getElementById('searchstaff').innerHTML;
    
    fetch('models/getOneStaff.php', {
        method: 'POST',
        body: formData1,
    })
        .then(res => {
            return res.json()
        })
        .then(data => {
            const Status = data.status
            
            if (Status !== 200) {
                loadpage2(btnName2);
                setTimeout(() => {
                    showAlert(data.message);
                    // console.log(data.message)
                    stoploader(btnName2, before);
                    reverseshowResult(document.getElementById('resultStaff1'), document.getElementById('resultStaff2'));
                }, 1000);
            } else if (Status == 200) {
                loadpage2(btnName2);
                setTimeout(() => {
                    stoploader(btnName2, before);
                    showResult(document.getElementById('resultStaff1'), document.getElementById('resultStaff2'));
                    let placeholder = document.querySelector('#data-output6');
                    let out = "";
          
                        out += `
                                <tr>
                                    <td><img src="images/staff${data.photo}" class="img_size2"></td>
                                    <td>${data.staff_id}</td>
                                    <td>${data.position}</td>
                                    <td>${data.firstname} ${data.lastname}</td>
                                    <td>${data.email}</td>
                                    <td>${data.phone}</td>
                                    <td>${data.address}</td>
                                    <td>${data.created_at}</td> 
                                </tr>
                            `;
                  
                    placeholder.innerHTML = out;

                }, 2000);

            }
    })
}
// SEARCHING FOR STAFF ===================
// SEARCHING FOR STAFF ===================







function loadpage(theID) {
    if (theID.disabled = true) {
            theID.innerHTML = 
                            `<div class="spinner-border text-light loader" role="status" >
                                <span class="visually-hidden">Loading...</span>
                            </div>`;
    }

}

function loadpage2(theID) {
    if (theID.disabled = true) {
            theID.innerHTML = 
                            `<div class="spinner-border text-primary loader" role="status" >
                                <span class="visually-hidden">Loading...</span>
                            </div>`;
    }

}

function showAlert(info) {
    document.getElementById('toast1').style.display = "block";
    document.querySelector('.toast1Msg').innerHTML = info;
}

function showAlert2(info) {
    document.getElementById('toast2').style.display = "block";
    document.getElementById('toast2Msg').innerHTML = info;
}


function stoploader(theID1, before) {
    theID1.disabled = false;
    theID1.innerHTML = before;
}

function closeAlert() {
    document.getElementById('toast1').style.display = "none";
}

function closeAlert2() {
    document.getElementById('toast2').style.display = "none";
}

function showResult(showID, showID2) {
    showID.style.display = 'block';
    showID2.style.display = 'none';
}

function reverseshowResult(showID, showID2) {
    showID.style.display = 'none';
    showID2.style.display = 'block';
}

