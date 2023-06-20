var nla;

const buttonset = document.querySelectorAll("div[data-userMsgId]");
  buttonset.forEach(button => {
        button.addEventListener("click", () => {
            const IDneeded = button.getAttribute("data-userMsgId");
            // document.getElementById('incoming_id').value = value;
            nla = IDneeded;
            getChat(IDneeded);
            // document.getElementById('msgUI1').style.display = "block";
            
            // refreshChats();
            });
  });

document.getElementById('messageForm').onsubmit = (e) => {
    e.preventDefault();
    }


async function getChat(id) {
    const formData = new FormData(document.getElementById('messageForm'));
    formData.append('incoming_id', id);

    fetch('models/getChat', {
        method: 'POST',
        body: formData
    })
        .then(res => {
        return res.json()
        })
        .then(data => {
            document.getElementById('msgUI1').style.display = "block";
            document.getElementById('msg_blank').innerHTML = data.value;
            document.getElementById('msgUIimg').src = `images/staff`+data.photo;
            document.getElementById('msgUIname').innerHTML = data.position + " " + data.firstname;
            document.getElementById('msgUIstatus').innerHTML = data.status;
            document.getElementById('incoming_id1').value = data.incoming;
            scrollToBottom();
            // console.log(data.position + " " + data.firstname);
    }).catch((data) => {
          // Do something for an error here
          console.error("Error:", data.message)
        });
}


function closeMsg() {
    document.getElementById('msgUI1').style.display = "none";
}

function scrollToBottom(){
    document.getElementById('msg_blank').scrollTop = document.getElementById('msg_blank').scrollHeight;
}

// insert chat
document.getElementById('sendMessage').onsubmit = (e) => {
    e.preventDefault();
}
    

async function insertChat() {
    const formData1 = new FormData(document.getElementById('sendMessage'));

    fetch('models/insertChat.php', {
        method: 'POST',
        body: formData1
    })
        .then(res => res.json())
        .then(data => {
            // console.log(data)
           
            if (data.msg = "success") {

                document.getElementById('send').value = "";
                scrollToBottom();
                const id = data.id;
                getChat(id);
            }

    }).catch(error => {
        console.error('Error:', error);
    });
}
// insert chat
// insert chat


let typingTimer;
const doneTypingInterval = 2000;
 // time in milliseconds

// Listen for keyboard events on the chat input field
// document.getElementById('send').addEventListener('keyup', () => {
//   clearTimeout(typingTimer);
//   typingTimer = setTimeout(refresh, doneTypingInterval);
// });

// Listen for scroll events on the chat window
// document.getElementById('msg_blank').addEventListener('scroll', () => {
//   clearTimeout(typingTimer);
//   typingTimer = setTimeout(refresh, doneTypingInterval);
// });

// setInterval(() => {
//     getChat(nla);
// }, 2000);




