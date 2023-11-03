const chat = document.querySelector(".chats .card"),
carheader = chat.querySelector(".card .card-header"),
cardBody = chat.querySelector(".card .card-body");

setInterval ( () => {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "assets/home.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                cardBody.innerHTML = data;
            }
        }
    }
    xhr.send();
}, 500);