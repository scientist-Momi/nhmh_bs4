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


// ADD MEDICAL RECORD===================
// ADD MEDICAL RECORD===================

document.getElementById('addMedForm').onsubmit = (e) => {
    e.preventDefault();
    }

async function addMed() {
    const btnName4 = document.getElementById('addMedBtn');
    const before = document.getElementById('addMedBtn').innerHTML;
    const formData = new FormData(document.getElementById('addMedForm'));

    fetch('models/newMedRecord.php', {
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

// ADD MEDICAL RECORD===================
// ADD MEDICAL RECORD===================


// ADD NEW APPOINTMENT ========================
// ADD NEW APPOINTMENT ========================
document.getElementById('addAppForm').onsubmit = (e) => {
    e.preventDefault();
    }

async function addApp() {
    const btnName5 = document.getElementById('addAppBtn');
    const before = document.getElementById('addAppBtn').innerHTML;
    const formData = new FormData(document.getElementById('addAppForm'));

    fetch('models/newAppointment.php', {
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
                    showAlert2(data.message);
                    stoploader(btnName5, before);
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
// ADD NEW APPOINTMENT ========================
// ADD NEW APPOINTMENT ========================

// CANCEL APPOINTMENT =======================
// CANCEL APPOINTMENT =======================
$(document).ready(function(){
    // Your code here
    $('.delete-btn').click(function () {
        var id = $(this).data('id');
        console.log("Debug: id is " + id);
        $('#delete-modal').modal('show');
        $('#delete-modal').find('.modal-body').text('Are you sure you want to delete appointment with id ' + id + '?');
        $('#delete-modal').find('.delete-confirm-btn').data('id', id);
    });

    $('.delete-confirm-btn').click(function(){
        var id = $(this).data('id');

        $.ajax({
        url: 'models/cancelApp.php?app_id=' + id,
            type: 'GET',
        dataType: 'json',
            success: function(response){
            if (response.msg == "successfull") {

                    showAlert2('Appointment has been cancelled. Patient would be notified.');
                    setTimeout(() => {
                            document.location.reload();
                    }, 2000);
            }else{
                alert('Error cancelling appointment');
            }
            },
            error: function (xhr, status, error) {
            console.log("Error: " + error);
        }
        });
    });
});




// const buttons = document.querySelectorAll("button[data-appID]");
//   buttons.forEach(button => {
//         button.addEventListener("click", () => {
//             const value = button.getAttribute("data-appID");
//             cancelApp(value);
//             });
//   });

// function cancelApp() {
//     const delBtn = document.querySelector('.delete-confirm-btn');
    
//     // var deleteID = delBtn.dataset.id;
//     alert(delBtn.dataset.id);
    // fetch('models/cancelApp.php?app_id='+ deleteID)
    //     .then(res => {
    //         // Status = res.status;
    //         return res.json()
    //     })
    //     .then(data => {
    //         if (data.msg == "successfull") {

    //                 showAlert2('Appointment has been cancelled. Patient would be notified.');
    //                 setTimeout(() => {
    //                         document.location.reload();
    //                 }, 2000);
    //         }
    //     })
    //     .catch((data) => {
    //         console.error("Error:", data.message);
    //     });

// }
// CANCEL APPOINTMENT =======================
// CANCEL APPOINTMENT =======================





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