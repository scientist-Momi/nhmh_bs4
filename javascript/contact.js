// new enquiry
// new enquiry
document.getElementById('contactForm').onsubmit = (e) => {
    e.preventDefault();
    }

async function newContact() {
    const before = document.getElementById('contactBtn').innerHTML;
    const btnName = document.getElementById('contactBtn');


    let xhr = new XMLHttpRequest();
    xhr.open("POST", "models/contactForm.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;

              loadpage(btnName);
              setTimeout(() => {
                if (data === "Successfull") {
                    stoploader(btnName, before);
                    document.getElementById('error').style.display = "none";
                    document.getElementById('success').style.display = "block";
                    document.getElementById('succmsg').innerHTML = "Your message has been sent. We would be in touch with you soon.";
                    setTimeout(() => {
                        document.location.reload();
                    }, 4000);

                } else {
                    stoploader(btnName, before);
                    // showAlert(data);   
                    document.getElementById('error').style.display = "block";
                    document.getElementById('errmsg').innerHTML = data;

                }
            }, 2000);
          }
      }
    }
    let formData = new FormData(document.getElementById('contactForm'));
    xhr.send(formData);
}
// new enquiry
// new enquiry


function loadpage(theID) {
    if (theID.disabled = true) {
            theID.innerHTML = 
                            `<div class="spinner-border text-light loader" role="status" >
                                <span class="visually-hidden">Loading...</span>
                            </div>`;
    }

}

function stoploader(theID1, before) {
    theID1.disabled = false;
    theID1.innerHTML = before;
}