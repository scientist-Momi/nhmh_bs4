// ADD NEW BLOG ========================
// ADD NEW BLOG ========================
document.getElementById('addBlog').onsubmit = (e) => {
    e.preventDefault();
    }

async function addBlog() {
    const before = document.getElementById('addBlogBtn').innerHTML;
    const btnName = document.getElementById('addBlogBtn');


    let xhr = new XMLHttpRequest();
    xhr.open("POST", "models/addNewBlog", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;

              loadpage(btnName);
              setTimeout(() => {
                if (data === "Successful") {
                    showAlert2("New Blog Post has been added.");
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
    let formData = new FormData(document.getElementById('addBlog'));
    xhr.send(formData);
}
// ADD NEW BLOG ========================
// ADD NEW BLOG ========================


// EDIT BLOG =======================
// EDIT BLOG =======================
const buttons = document.querySelectorAll("button[data-editPostID]");
  buttons.forEach(button => {
        button.addEventListener("click", () => {
            const value = button.getAttribute("data-editPostID");
            showEdit(value);
            // alert(value);
            });
  });

function showEdit(value) {

    document.getElementById('number').value = value;

    fetch('models/getOneBlog?blog_id='+ value)
        .then(res => {
            // Status = res.status;
            return res.json()
        })
        .then(data => {
            if (data.msg == "successfull") {
                document.getElementById('out1').value = data.values.title
                document.getElementById('out2').value = data.values.author
                document.getElementById('out3').value = data.values.body
            }
        })
        .catch((data) => {
            console.error("Error:", data.message);
        });
}

document.getElementById('updateBlog').onsubmit = (e) => {
    e.preventDefault();
}
    
function updateBlog() {
    const before = document.getElementById('upBlogBtn').innerHTML;
    const btnName = document.getElementById('upBlogBtn');


    let xhr = new XMLHttpRequest();
    xhr.open("POST", "models/editBlog", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;

              loadpage(btnName);
              setTimeout(() => {
                if (data === "Successful") {
                    showAlert2("Blog has been updated and republished.");
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
    let formData = new FormData(document.getElementById('updateBlog'));
    xhr.send(formData);
}
// EDIT BLOG =======================
// EDIT BLOG =======================

// DELETE BLOG ====================
// DELETE BLOG ====================

$(document).ready(function(){
    // Your code here
    $('.delete-btn1').click(function () {
        var id = $(this).data('id');
        console.log("Debug: id is " + id);
        $('#delete-modal1').modal('show');
        $('#delete-modal1').find('.modal-body').text('Are you sure you want to delete post with id ' + id + '?');
        $('#delete-modal1').find('.delete-confirm-btn1').data('id', id);
    });

    $('.delete-confirm-btn1').click(function(){
        var id = $(this).data('id');
        $.ajax({
        url: 'models/deleteBlogPost?post_id=' + id,
            type: 'GET',
        dataType: 'json',
            success: function(response){
            if (response.msg == "successfull") {
                showAlert2('Blog post has been deleted.');
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









// const buttons1 = document.querySelectorAll("button[data-deletePostID]");
//   buttons1.forEach(button1 => {
//         button1.addEventListener("click", () => {
//             const value = button1.getAttribute("data-deletePostID");
//             deletePost(value);
//             });
//   });

// function deletePost(thePost) {
//     fetch('models/deleteBlogPost?post_id='+ thePost)
//         .then(res => {
//             // Status = res.status;
//             return res.json()
//         })
//         .then(data => {
//             if (data.msg == "successfull") {

//                     showAlert2('Blog post has been deleted.');
//                     setTimeout(() => {
//                             document.location.reload();
//                     }, 2000);
//             }
//         })
//         .catch((data) => {
//             console.error("Error:", data.message);
//         });
// }
// DELETE BLOG ====================
// DELETE BLOG ====================





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
