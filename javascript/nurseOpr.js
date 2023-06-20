// VERIFY REGISTRATION CODE ==================
// VERIFY REGISTRATION CODE ==================
function verifyRegCode(buttonID) {
    var btnName2 = document.getElementById(buttonID);
    const before = document.getElementById(buttonID).innerHTML;

    const code = document.getElementById('inputCode').value;
    if (code.length == 10) {
        document.getElementById('inputCode').disabled = true;
        loadpage2(btnName2);
        setTimeout(() => {
            fetch('models/verifyRegCode.php?reg_code='+code)
            .then(res => {
                // Status = res.status;
                return res.json()
            })
            .then(data => {
                if (data.msg == 1) {
                    btnName2.innerHTML = `
                        <button class="btn btn-success text-white w-100">CODE IS ACTIVE
                        </button> 
                    `;
                    document.getElementById('formtoAdd').style.display = "block";
                    document.getElementById('regCode').value = code;

                } else {
                    btnName2.innerHTML = `
                        <button class="btn btn-danger text-white w-100">CODE IS INACTIVE
                        </button> 
                    `;
                }
            })
            .catch((data) => {
                console.error("Error:", data.msg);
            });

        }, 2000);


    }




}
// VERIFY REGISTRATION CODE ==================
// VERIFY REGISTRATION CODE ==================




// ADD PATIENT
// ADD PATIENT
let OTPCode;
const btnName5 = document.getElementById('addPatBtn');

document.getElementById('addPatForm').onsubmit = (e) => {
    e.preventDefault();
    }

function addPat() {
    const before = document.getElementById('addPatBtn').innerHTML;

    const formData = new FormData(document.getElementById('addPatForm'));

    fetch('models/verifyNewPatient.php', {
        method: 'POST',
        body: formData
    })
        .then(res => {
        return res.json()
        })
        .then(data => {
            const Status = data.status
            if (Status !== 200) {
                loadpage(btnName5);
                setTimeout(() => {
                    showAlert(data.message);
                    stoploader(btnName5, before);
                }, 1000);
            } else if(Status == 200) {
                loadpage(btnName5);
                setTimeout(() => {
                    // showAlert2(data.OTP);
                    OTPCode = data.OTP;
                    stoploader(btnName5, before);
                    document.getElementById('formtoAdd').style.display = "none";
                    document.getElementById('verifyOtp').style.display = "block";
                }, 2000);
            }
    }).catch((data) => {
          // Do something for an error here
          console.error("Error:", data.message)
        });
}

function resend() {
    document.getElementById('formtoAdd').style.display = "block";
    document.getElementById('verifyOtp').style.display = "none";
}

function validateOtp() {
    if (document.getElementById('inpOTP').value == OTPCode) {
        
            const formData = new FormData(document.getElementById('addPatForm'));

            fetch('models/addNewPatient.php', {
                method: 'POST',
                body: formData
            })
                .then(res => {
                return res.json()
                })
                .then(data => {
                    const Status = data.status
                    if (Status !== 200) {
                        showAlert(data.message);
                        
                    } else if(Status == 200) {
                        showAlert2(data.message);
                        setTimeout(() => {
                            window.location.reload();
                        }, 2000);
                    }
            }).catch((data) => {
                // Do something for an error here
                console.error("Error:", data.message)
                });
    } else {
        showAlert('Incorrect Code Entered. Please try again.');
    }
}
// ADD PATIENT
// ADD PATIENT




// ADD VITALS FOR PATIENTS====================
// ADD VITALS FOR PATIENTS====================
const btnName3 = document.getElementById('addVitalBtn');

document.getElementById('addVital').onsubmit = (e) => {
    e.preventDefault();
    }

async function addVital() {
    const formData = new FormData(document.getElementById('addVital'));

    const before = document.getElementById('addVitalBtn').innerHTML;

    fetch('models/addNewVitals.php', {
        method: 'POST',
        body: formData
    })
        .then(res => {
        return res.json()
        })
        .then(data => {
            const Status = data.status
            if (Status !== 200) {
                loadpage(btnName3);
                setTimeout(() => {
                    showAlert(data.message);
                    stoploader(btnName3, before);
                }, 1000);
            } else if(Status == 200) {
                loadpage(btnName3);
                setTimeout(() => {
                    showAlert2(data.message);
                    stoploader(btnName3, before);
                    setTimeout(() => {
                        document.location.reload();
                    }, 1000);
                }, 2000);
            }
    }).catch((data) => {
          // Do something for an error here
          console.error("Error:", data.message)
        });
}
// ADD VITALS FOR PATIENTS=====================
// ADD VITALS FOR PATIENTS=====================


// SEARCHING FOR PATIENT =============
// SEARCHING FOR PATIENT =============

document.getElementById('patInp').onsubmit = (e) => {
    e.preventDefault();
}

async function searchPat(buttonID) {
    var btnName2 = document.getElementById(buttonID);

    const before = document.getElementById('searchpat').innerHTML;

    const formData1 = new FormData(document.getElementById('patInp'));
    
    fetch('models/getOnePatient.php', {
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
                    reverseshowResult1(document.getElementById('resultPat1'));
                }, 1000);
            } else if (Status == 200) {
                loadpage2(btnName2);
                setTimeout(() => {
                    stoploader(btnName2, before);
                    showResult1(document.getElementById('resultPat1'));
                    
                    // results
                    document.querySelector('.out1').innerHTML = `<img src="images/patient${data.photo}" alt="" class="img_size" id="userphoto">`
                    document.querySelector('.out2').value = data.patient_id;
                    document.querySelector('.out3').value = data.edd_date;
                    document.querySelector('.out4').value = data.firstname+ " "+ data.lastname;
                    document.querySelector('.out5').value = data.email;
                    document.querySelector('.out6').value = data.phone;
                    document.querySelector('.out7').value = data.address;
                    document.querySelector('.out8').value = data.nokname;
                    document.querySelector('.out10').value = data.nokphone;
                    document.querySelector('.out11').value = data.nokaddress;
                    document.querySelector('.out12').value = data.age;
                    document.querySelector('.out13').value = data.bgroup;
                    document.querySelector('.out14').value = data.genotype;
                    document.querySelector('.out15').value = data.height;
                    document.querySelector('.out16').value = data.children;
                    document.querySelector('.out17').value = data.temperature;
                    document.querySelector('.out18').value = data.blood_pressure;
                    document.querySelector('.out19').value = data.weight;
                    document.querySelector('.out20').value = data.pulse;

                }, 2000);

            }
    })
}


// SEARCHING FOR PATIENT =============
// SEARCHING FOR PATIENT =============


// CALCULATE EDD ===============
// CALCULATE EDD ===============
async function eddCalculate() {
    const formData = new FormData(document.getElementById('eddForm'));

    fetch('models/calculateEDD.php', {
        method: 'POST',
        body: formData
    })
        .then(res => {
        return res.json()
        })
        .then(data => {
            document.querySelector('.eddOut3').value = data.edd;
            document.querySelector('.eddOut2').value = data.gesticu;
            document.querySelector('.eddOut1').value = data.conceptiony;
    }).catch((data) => {
          // Do something for an error here
          console.error("Error:", data.message)
        });
}
// CALCULATE EDD ===============
// CALCULATE EDD ===============


// RECORD EDD=============
// RECORD EDD=============
const btnName4 = document.getElementById('addEddBtn');

document.getElementById('eddForm').onsubmit = (e) => {
    e.preventDefault();
    }

async function addEdd() {
    const formData = new FormData(document.getElementById('eddForm'));

    const before = document.getElementById('addEddBtn').innerHTML;

    fetch('models/addEdd.php', {
        method: 'POST',
        body: formData
    })
        .then(res => {
        return res.json()
        })
        .then(data => {
            const Status = data.status
            if (Status !== 200) {
                loadpage(btnName4);
                setTimeout(() => {
                    showAlert(data.message);
                    stoploader(btnName4, before);
                }, 1000);
            } else if(Status == 200) {
                loadpage(btnName4);
                setTimeout(() => {
                    showAlert2(data.message);
                    stoploader(btnName4, before);
                    // setTimeout(() => {
                    //     document.location.reload();
                    // }, 1000);
                }, 2000);
            }
    }).catch((data) => {
          // Do something for an error here
          console.error("Error:", data.message)
        });
}
// RECORD EDD=============
// RECORD EDD=============


// SEARCHING FOR MEDICAL RECORD =============================
// SEARCHING FOR MEDICAL RECORD =============================
document.getElementById('getMedfrm').onsubmit = (e) => {
    e.preventDefault();
    }

async function searchMedPat(buttonID) {
    const before = document.getElementById(buttonID).innerHTML;
    const btnName = document.getElementById(buttonID);


    let xhr = new XMLHttpRequest();
    xhr.open("POST", "models/medRecords.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;

                loadpage2(btnName);
                setTimeout(() => {
                    
                    stoploader(btnName, before);
                    document.getElementById('medPat1').style.display = "block";
                    document.getElementById('medDataOut').innerHTML = data;

                }, 1000);
            }
          
      }
    }
    let formData = new FormData(document.getElementById('getMedfrm'));
    xhr.send(formData);
}
// SEARCHING FOR MEDICAL RECORD =============================
// SEARCHING FOR MEDICAL RECORD =============================


// SEARCH FOR ONE TRANSACTION ===========================
// SEARCH FOR ONE TRANSACTION ===========================
document.getElementById('transForm').onsubmit = (e) => {
    e.preventDefault();
}

async function searchTransact() {
    
    const before = document.getElementById('transBtn').innerHTML;
    const btnName = document.getElementById('transBtn');

    const formData1 = new FormData(document.getElementById('transForm'));
    
    fetch('models/getOneTransaction.php', {
        method: 'POST',
        body: formData1,
    })
        .then(res => {
            return res.json()
        })
        .then(transacts => {
            loadpage2(btnName);
            setTimeout(() => {
                if (transacts.status == 401) {
                        stoploader(btnName, before);
                        showAlert(transacts.message);
                } else {
                    stoploader(btnName, before);
                    document.getElementById('showTransacts').style.display = "block";
                    document.getElementById('patName').innerHTML = transacts.message.fullname + " [" + transacts.message.patient_id + "]";
                    
                    document.getElementById('transacts').innerHTML = `
                                <tr>                               
                                     <td>${transacts.message.transaction_id}</td>
                                     <td>${transacts.message.service}</td>
                                     <td>${transacts.message.deposit}</td>
                                     <td>${transacts.message.remain}</td>
                                    <td>${transacts.message.date}</td>
                                </tr>
                    `;

                }

                    

            }, 2000);
           
})

}

// SEARCH FOR ONE TRANSACTION ===========================
// SEARCH FOR ONE TRANSACTION ===========================






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

function showAlert2(info2) {
    document.getElementById('toast2').style.display = "block";
    document.getElementById('toast2Msg').innerHTML = info2;
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

function showResult1(showID) {
    showID.style.display = 'block';
}

function reverseshowResult1(showID) {
    showID.style.display = 'none';
}
function showResult(showID, showID2) {
    showID.style.display = 'block';
    showID2.style.display = 'none';
}

function reverseshowResult(showID, showID2) {
    showID.style.display = 'none';
    showID2.style.display = 'block';
}