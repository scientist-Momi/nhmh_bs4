// ADD NEW COMMENT ===============
// ADD NEW COMMENT ===============
document.getElementById('newComment').onsubmit = (e) => {
    e.preventDefault();
    }

function addComment() {
    const before = document.getElementById('addCommentBtn').innerHTML;
    const btnName = document.getElementById('addCommentBtn');


    let xhr = new XMLHttpRequest();
    xhr.open("POST", "models/newBlogComment", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;

              loadpage(btnName);
              setTimeout(() => {
                  if (data === "Successful") {
                    stoploader(btnName, before);
                    document.getElementById('succMsg').style.display = "block";
                    document.getElementById('succ').innerHTML = "Thanks for your comment and contribution.";
                    
                    setTimeout(() => {
                        document.location.reload();
                    }, 2000);

                } else {
                    stoploader(btnName, before);
                    document.getElementById('errMsg').style.display = "block";
                    document.getElementById('err').innerHTML = data;
                }
            }, 2000);
          }
      }
    }
    let formData = new FormData(document.getElementById('newComment'));
    xhr.send(formData);
}
// ADD NEW COMMENT ===============
// ADD NEW COMMENT ===============

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