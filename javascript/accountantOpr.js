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
                    document.querySelector('.out3').value = data.firstname+ " "+ data.lastname;
                    document.querySelector('.out4').value = data.email;
                    document.querySelector('.out5').value = data.phone;
                    document.querySelector('.out6').value = data.address;

                }, 2000);

            }
    })
}

// SEARCHING FOR PATIENT =============
// SEARCHING FOR PATIENT ============


// GET FINANCE HEAD =====================
// GET FINANCE HEAD =====================
document.getElementById('transForm').onsubmit = (e) => {
    e.preventDefault();
}

async function searchTransact(buttonID) {
    
    var btnName2 = document.getElementById(buttonID);

    const before = document.getElementById(buttonID).innerHTML;

    const formData1 = new FormData(document.getElementById('transForm'));
    const patient = formData1.get("patient_id");
    
    fetch('models/financeHead.php?patient_id='+ patient)
        .then(res => {
            return res.json()
        })
        .then(data => {
            Status = data.status;
            const Message = data.message;

            loadpage2(btnName2);
            setTimeout(() => {
                if (Status == 200) {
                    stoploader(btnName2, before);
                    document.getElementById('showTransacts').style.display = "block";
                    document.querySelector('.deposit').innerHTML = `&#8358;`+data.value.deposit;
                    document.querySelector('.debt').innerHTML = `&#8358;`+data.value.debt;
                    document.querySelector('.transDetail').innerHTML = data.value.fullname + " " + data.value.patient_id;
                    document.getElementById('downloadBtn').innerHTML = `
                                <a href='models/getPDFreport.php?patid= ${patient}' target="_blank">
                                    <button class="btn btn-success">Download Transaction Report</button>
                                </a>`;
             
                } else {
                    reverseshowResult1(document.getElementById('showTransacts'));
                    stoploader(btnName2, before);
                    showAlert(data.message);
                }
            }, 2000);
        })
        .catch((data) => {
            console.error("Error:", data.message);
        });

    
    fetch('models/financeBody.php?patient_id='+ patient)
        .then(res => {
            // Status = res.status;
            return res.json()
        })
        .then(transacts => {
           let placeholder = document.querySelector('#transacts');
                let out = "";
                let i = 1;
                    for (let transact of transacts) {               
                    out += `
                            <tr>
                                <td>${i}</td>
                                <td>${transact.value.payment_id}</td>
                                <td>${transact.value.payment_for}</td>
                                <td>${transact.value.deposit}</td>
                                <td>${transact.value.remain}</td>
                                <td>${transact.value.date}</td>
                            </tr>
                        `;
                        i++;
                }
                

            placeholder.innerHTML = out;
        })
        .catch((data) => {
            console.error("Error:", data.message);
        });
}
// GET FINANCE HEAD =====================
// GET FINANCE HEAD =====================


// RETRIEVING SERVICE DATA ======================
// RETRIEVING SERVICE DATA ======================
var service_price;
var service_initial;
function servicePrice(){
    const service_id = document.getElementById('serviceSelect').value;

    

fetch('models/fetchServicePrice.php?service_id='+ service_id)
        .then(res => {
            // Status = res.status;
            return res.json()
        })
    .then(data => {
        if (service_id == 11) {
            document.getElementById('pay0').style.display = "block";
            document.getElementById('pay1').style.display = "none";
            document.getElementById('serviceprice1').value = data.price;   
        } else {
            document.getElementById('pay0').style.display = "none";
            document.getElementById('pay1').style.display = "block";
            document.getElementById('serviceprice').value = data.price;
            service_price = data.price;
            service_initial = data.downpay}

        })
        .catch((data) => {
            console.error("Error:", data.message);
        });
}


var result;
function genRegCode(buttonID) {
    var btnName2 = document.getElementById(buttonID);

    const before = document.getElementById(buttonID).innerHTML;
    result = Math.random().toString(36).substring(2, 12);
    
     loadpage(btnName2);
    setTimeout(() => {
        stoploader(btnName2, before);
        document.getElementById('regCode').value = result;
    }, 2000);

}

// save generated code
function saveRegCode(buttonID) {
        var btnName2 = document.getElementById(buttonID);

    const before = document.getElementById(buttonID).innerHTML;
    const staff = document.getElementById('staffName').value;

    fetch('models/saveRegCode.php?reg_code='+result+'&staff_name='+staff)
        .then(res => {
            // Status = res.status;
            return res.json()
        })
        .then(data => {
            if (data.msg == "successfull") {
                loadpage(btnName2);
                setTimeout(() => {
                    showAlert2('Registration code is active.');
                    stoploader(btnName2, before);
                }, 2000);
            } else {
                loadpage(btnName2);
                setTimeout(() => {
                    stoploader(btnName2, before);
                    showAlert(data.msg);
                }, 2000);
            }
        })
        .catch((data) => {
            console.error("Error:", data.msg);
        });

}
// save generated code

function payType() {
    const type_id = document.getElementById('type_id').value;

    if (type_id == 1) {
        document.getElementById('pay2').style.display = "block";
        document.getElementById('pay3').style.display = "none";
        document.getElementById('fullDeposit').value = service_price;
    } else {
        document.getElementById('pay3').style.display = "block";
        document.getElementById('pay2').style.display = "none";
        document.getElementById('downpay').value= service_initial;
    }
}
// RETRIEVING SERVICE DATA ======================
// RETRIEVING SERVICE DATA ======================

// SAVE PAYMENT FOR FULL PPAYMENT ==============
// SAVE PAYMENT FOR FULL PPAYMENT ==============

document.getElementById('paymentForm').onsubmit = (e) => {
    e.preventDefault();
    }

async function fullPay() {
    const before = document.getElementById('fullPayBtn').innerHTML;
    const btnName = document.getElementById('fullPayBtn');


    let xhr = new XMLHttpRequest();
    xhr.open("POST", "models/NewFullPay.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;

              loadpage(btnName);
              setTimeout(() => {
                if (data === "Successful") {
                    showAlert2("Payment record has been saved. Receipt sent to Patient's email.");
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
    let formData = new FormData(document.getElementById('paymentForm'));
    xhr.send(formData);
}
// SAVE PAYMENT FOR FULL PPAYMENT ==============
// SAVE PAYMENT FOR FULL PPAYMENT ==============


// SAVE PAYMENT FOR INSTALLMENTAL PPAYMENT ==============
// SAVE PAYMENT FOR INSTALLMENTAL PPAYMENT ==============

document.getElementById('paymentForm').onsubmit = (e) => {
    e.preventDefault();
    }

async function instPay() {
    const before = document.getElementById('instPayBtn').innerHTML;
    const btnName = document.getElementById('instPayBtn');


    let xhr = new XMLHttpRequest();
    xhr.open("POST", "models/NewInstPay.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;

              loadpage(btnName);
              setTimeout(() => {
                if (data === "Successful") {
                    showAlert2("Payment record has been saved. Receipt sent to Patient's email.");
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
    let formData = new FormData(document.getElementById('paymentForm'));
    xhr.send(formData);
}
// SAVE PAYMENT FOR INSTALLMENTAL PPAYMENT ==============
// SAVE PAYMENT FOR INSTALLMENTAL PPAYMENT ==============

// GET INSTALLMENT PAY DRAFT ===================
// GET INSTALLMENT PAY DRAFT ===================
document.getElementById('paymentForm').onsubmit = (e) => {
    e.preventDefault();
}

async function payDraft() {
    
    const before = document.getElementById('PayDraftBtn').innerHTML;
    const btnName = document.getElementById('PayDraftBtn');

    const formData1 = new FormData(document.getElementById('paymentForm'));
    
    fetch('models/getPayDraft.php', {
        method: 'POST',
        body: formData1,
    })
        .then(res => {
            return res.json()
        })
        .then(data => {
            const Status = data.status
            
           loadpage(btnName);
              setTimeout(() => {
                if (Status === 200) {
                    stoploader(btnName, before);
                    document.getElementById('toast1').style.display = "none";
                    document.getElementById('pay4').style.display = 'block';
                    document.getElementById('out1').innerHTML = data.output;
                    document.getElementById('out2').value = data.remain;
                    document.getElementById('out3').value = data.interval;
                    document.getElementById('out4').value = data.money_to_pay;
                    
                } else {
                    stoploader(btnName, before);
                    showAlert(data.msg);                   
                }
            }, 2000);
    })
}
// GET INSTALLMENT PAY DRAFT ===================
// GET INSTALLMENT PAY DRAFT ===================


// ADD NEW SERVICE =============================
// ADD NEW SERVICE =============================

document.getElementById('newServiceForm').onsubmit = (e) => {
    e.preventDefault();
}

async function newService(buttonID) {
    const before = document.getElementById(buttonID).innerHTML;
    const btnName = document.getElementById(buttonID);


    let xhr = new XMLHttpRequest();
    xhr.open("POST", "models/addNewService.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;

              loadpage(btnName);
              setTimeout(() => {
                if (data === "Successful") {
                    showAlert2("Added new service.");
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
    let formData = new FormData(document.getElementById('newServiceForm'));
    xhr.send(formData);
}
// ADD NEW SERVICE =============================
// ADD NEW SERVICE =============================


// DELETING SERVICE ===========================
// DELETING SERVICE ===========================

$(document).ready(function(){
    // Your code here
    $('.delete-btn1').click(function () {
        var id = $(this).data('id');
        console.log("Debug: id is " + id);
        $('#delete-modal1').modal('show');
        $('#delete-modal1').find('.modal-body').text('Are you sure you want to delete service with id ' + id + '?');
        $('#delete-modal1').find('.delete-confirm-btn1').data('id', id);
    });

    $('.delete-confirm-btn1').click(function(){
        var id = $(this).data('id');

        $.ajax({
        url: 'models/deleteService.php?delete_id=' + id,
            type: 'GET',
        dataType: 'json',
            success: function(response){
            if (response.msg == "successfull") {
                showAlert2('Service has been deleted.');
                setTimeout(() => {
                        document.location.reload();
                }, 2000);
            }else{
                alert('Error deleting service');
            }
            },
            error: function (xhr, status, error) {
            console.log("Error: " + error);
        }
        });
    });
});






    
// const buttons = document.querySelectorAll("button[data-serviceID]");
//   buttons.forEach(button => {
//         button.addEventListener("click", () => {
//             const value = button.getAttribute("data-serviceID");
//             deleteService(value);
//             });
//   });
// function deleteService(deleteID) {
//     fetch('models/deleteService.php?delete_id='+ deleteID)
//         .then(res => {
//             // Status = res.status;
//             return res.json()
//         })
//         .then(data => {
//             if (data.msg == "successfull") {

//                     showAlert2('Service has been deleted.');
//                     setTimeout(() => {
//                             document.location.reload();
//                     }, 2000);
//             }
//         })
//         .catch((data) => {
//             console.error("Error:", data.message);
//         });

// }
// DELETING SERVICE ===========================
// DELETING SERVICE ===========================


// RETRIEVE DEBTS ============================
// RETRIEVE DEBTS ============================
document.getElementById('srcDebtForm').onsubmit = (e) => {
    e.preventDefault();
}

async function searchDebt() {
    
    const before = document.getElementById('srcDebtBtn').innerHTML;
    const btnName = document.getElementById('srcDebtBtn');

    const formData1 = new FormData(document.getElementById('srcDebtForm'));
    
    fetch('models/getOneDebt.php', {
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
                    document.getElementById('oneDebt').style.display = "block";
                    document.getElementById('twoDebt').style.display = "none";
                        let placeholder = document.querySelector('#showDebts');
                        let out = "";
                    let i = 1;
                    for (let transact of transacts) {    

                            out += `
                                <tr>
                                    <td>${i}</td>
                                    <td><img src="images/patient${transact.value.photo}" class="img_size2"></td>
                                    <td>${transact.value.patient_id}</td>
                                    <td>${transact.value.firstname} ${transact.value.lastname}</td>
                                    <td>${transact.value.amount}</td>
                                    <td>${transact.value.date}</td>
                                    <td><a class="btn btn-success" href="models/clearDebts?delete_id=${transact.value.plan_id}">Clear</a></td>
                                </tr>
                            `;
                            i++;
                

                    }
                    placeholder.innerHTML = out;
                    // placeholder.innerHTML = `<?php echo ${transacts.message}; ?>`
                }

                    

            }, 2000);
           
})

}
// RETRIEVE DEBTS ============================
// RETRIEVE DEBTS ============================


// CLEAR DEBTS =====================
// CLEAR DEBTS =====================
const buttons1 = document.querySelectorAll("button[data-planID]");
  buttons1.forEach(button1 => {
        button1.addEventListener("click", () => {
            const value1 = button1.getAttribute("data-planID");
            alert(value1);
            // clearDebt(value1);
            });
  });
function clearDebt(deleteID) {
    fetch('models/clearDebts.php?delete_id='+ deleteID)
        .then(res => {
            // Status = res.status;
            return res.json()
        })
        .then(data => {
            if (data.msg == "successfull") {

                    showAlert2('Debt has been cleared.');
                    setTimeout(() => {
                            document.location.reload();
                    }, 2000);
            } else {
                showAlert(data.msg);
            }
        })
        .catch((data) => {
            console.error("Error:", data.message);
        });

}
// CLEAR DEBTS =====================
// CLEAR DEBTS =====================


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