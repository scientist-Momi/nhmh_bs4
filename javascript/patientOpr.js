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

//   function cancelApp(deleteID) {
//     fetch('models/cancelApp.php?app_id='+ deleteID)
//         .then(res => {
//             // Status = res.status;
//             return res.json()
//         })
//         .then(data => {
//             if (data.msg == "successfull") {

//                     showAlert2('Appointment has been cancelled. Doctor would be notified.');
//                     setTimeout(() => {
//                             document.location.reload();
//                     }, 2000);
//             }
//         })
//         .catch((data) => {
//             console.error("Error:", data.message);
//         });

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