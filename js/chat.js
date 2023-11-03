const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
imageField = form.querySelector(".image-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");
const imgContainer = document.querySelector(".img-container");

form.onsubmit = (e) => {
    e.preventDefault();
}

// Add an event listener to the image field
imageField.addEventListener('change', function () {
    // Clear the existing images in the container
    imgContainer.innerHTML = '';
  
    // Loop through the selected files
    for (const file of this.files) {
      // Create a new div to display the image
      const imageDiv = document.createElement('div');
      imageDiv.classList.add('image');
  
      const img = document.createElement('img');
  
      img.src = URL.createObjectURL(file);
    const clearButton = document.createElement('span');
    clearButton.innerHTML = '&#215;';

    clearButton.classList.add('clear');

      imageDiv.appendChild(clearButton);
  
      imageDiv.appendChild(img);
  
      imgContainer.appendChild(imageDiv);

      clearButton.addEventListener('click', function () {
        imgContainer.removeChild(this.parentElement);
  
        const images = imgContainer.querySelectorAll('.image');
        if (images.length === 0) {
          imgContainer.style.display = 'none';
        }
      })

    }
  
    // Check if there are selected files
    if (this.files.length > 0) {
      imgContainer.style.display = 'flex';
    } else {
      imgContainer.style.display = 'none';
    }
  })

sendBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "assets/insert-chat.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                inputField.value = ""; // Reset the input-field when the message has successfully sent
                imageField.value = ""; // Reset the .image-field when the message has successfully sent
                imgContainer.innerHTML = ""; // Clear the displayed images when the message has successfully sent
                imgContainer.style.display = 'none'; // Hide the imgContainer when there are no images
                scrollToBottom();
            }
        }
    }
    let formData = new FormData(form); //creating form data
    xhr.send(formData); //sending form to php
}

chatBox.onmouseenter = () => {
    chatBox.classList.add("active");
}
chatBox.onmouseleave = () => {
    chatBox.classList.remove("active");
}

setInterval(() =>{
    //start ajax
    let xhr = new XMLHttpRequest(); // creating xml request
    xhr.open("POST", "assets/get-chat.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                chatBox.innerHTML = data;
                if(!chatBox.classList.contains("active")){ // if chatbox does not contain active then scroll bottom
                    scrollToBottom();
                }
            }
        }
    }
    //send the formdata in ajax php
    let formData = new FormData(form); //creating form data
    xhr.send(formData); //sending form to php
}, 500); // this will run every 500ms.

function scrollToBottom() {
  chatBox.scrollTop = chatBox.scrollHeight - chatBox.clientHeight;
}

document.addEventListener("click", function(e){
  if(e.target.classList.contains("gallery-item")){
    const src = e.target.getAttribute("src");
    document.querySelector(".modal-img").src = src;
    const myModal = new bootstrap.Modal(document.getElementById('gallery-modal'));
    myModal.show();
  }
})