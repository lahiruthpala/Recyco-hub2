document.querySelector('.chat[data-chat=default]').classList.add('active-chat')
document.querySelector('.person[data-chat=default]').classList.add('active')

let friends = {
    list: document.querySelector('ul.people'),
    all: document.querySelectorAll('.left .person'),
    name: ''
  },
  chat = {
    container: document.querySelector('.container .right'),
    current: null,
    person: null,
    name: document.querySelector('.container .right .top .name')
  }
  console.log(friends, chat)

friends.all.forEach(f => {
  f.addEventListener('mousedown', () => {
    f.classList.contains('active') || setAciveChat(f)
  })
});

function setAciveChat(f) {
  friends.list.querySelector('.active').classList.remove('active')
  f.classList.add('active')
  chat.current = chat.container.querySelector('.active-chat')
  chat.person = f.getAttribute('data-chat')
  chat.current.classList.remove('active-chat')
  chat.container.querySelector('[data-chat="' + chat.person + '"]').classList.add('active-chat')
  friends.name = f.querySelector('.name').innerText
  chat.name.innerHTML = friends.name
}

function SendMsg(){
      
}
// ---------------------------------------Chat functionality - Web Socket--------------------------------------------------------log

// create a connection 
var conn = new WebSocket(`ws://localhost?chatId=${chatId}`);

// onopen method
conn.onopen = function(e) {
    console.log("Connection established!");
};

// onmessage method
conn.onmessage = function(e) {
  console.log(e.data); 

  var data = JSON.parse(e.data);
  var messageComponent = "";

  const from = data.from;

  if (from == "Me") {
    console.log("Its me");
    if (data.attachment) {
        if (isBase64Image(data.attachment)) {
            messageComponent = `
                <div class="receiver-container">
                    <div class="messageContainer darker">
                        <div class="receiverContent">
                            <p class="receiver" >
                                ${data.newMessage}
                                <img src="${data.attachment}" alt="Attachment" class="attachment-image">
                                <span class="time-left">11:01</span>
                            </p>
                        </div>
                    </div>
                </div>`;
        } else {
            messageComponent = `
                <div class="receiver-container">
                    <div class="messageContainer darker">
                        <div class="receiverContent">
                            ${data.newMessage} (Attachment: <a href="${data.attachment}" download>Download Attachment</a>)
                            <span class="time-left">11:01</span>
                        </div>
                    </div>
                </div>`;
        }
    } else {
        messageComponent = `
            <div class="receiver-container">
                <div class="messageContainer darker">
                    <div class="receiverContent">
                        <p class="receiver" >
                            ${data.newMessage}
                            <span class="time-left">11:01</span>
                        </p>
                    </div>
                </div>
            </div>`;
    }
  } else {
    console.log("another user");
    if (data.attachment) {
        if (isBase64Image(data.attachment)) {
            messageComponent = `
                <div class="sender-container">
                    <div class="messageContainer">
                        <div class="senderContent">
                          <p class="receiver" >
                            ${data.newMessage}
                            <img src="${data.attachment}" alt="Attachment" class="attachment-image">
                            <span class="time-right">11:00</span>
                          </p>
                        </div>
                    </div>
                </div>`;
        } else {
            messageComponent = `
                <div class="sender-container">
                    <div class="messageContainer">
                        <div class="senderContent">
                            ${data.newMessage} (Attachment: <a href="${data.attachment}" download>Download Attachment</a>)
                            <span class="time-right">11:00</span>
                        </p>
                    </div>
                </div>
            </div>`;
        }
    } else {
        messageComponent = `
            <div class="sender-container">
                <div class="messageContainer">
                    <div class="senderContent">
                        <p class="P" >
                            ${data.newMessage}
                            <span class="time-right">11:00</span>
                        </p>
                    </div>
                </div>
            </div>`;
    }
  }

  document.getElementById('chatContainer').innerHTML += messageComponent;

};


// check whether the attachement is an image or not
function isBase64Image(base64) {
  return /^data:image\/(png|jpg|jpeg|gif);base64,/.test(base64);
}



// onclose method
conn.onclose = function(e){
  console.log("Connection closed!");
};


// function which is get executed when a new message is sent
var chatForm = document.getElementById('chatForm');
chatForm.addEventListener('submit', function(e) {
    e.preventDefault(); // Prevent the default form submission behavior
    
    var senderId = document.getElementById('senderId').value;
    var receiverId = document.getElementById('receiverId').value;
    var chatId = document.getElementById('chatId').value;
    var newMessage = document.getElementById('newMessage').value;
    var attachmentInput = document.getElementById('messageAttachement');
    var attachment = attachmentInput.files.length > 0 ? attachmentInput.files[0] : null;
    
    var reader = new FileReader();
    reader.onload = function(event) 
    {
        var data = {
            senderId: senderId,
            receiverId: receiverId,
            chatId: chatId,
            newMessage: newMessage,
            attachment: event.target.result, // Convert attachment to base64 and send
            command: 'private'
          };
        conn.send(JSON.stringify(data));
    };
    
    if (attachment){
        reader.readAsDataURL(attachment); // Convert attachment to base64
    } else {
        var data = {
            senderId: senderId,
            receiverId: receiverId,
            chatId: chatId,
            newMessage: newMessage,
            command: 'private'
        };
        conn.send(JSON.stringify(data));
    }
});