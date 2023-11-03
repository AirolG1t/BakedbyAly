const searchBar = document.querySelector(".users .chat-search input"),
      searchBtn = document.querySelector(".users .chat-search button"),
      userList = document.querySelector(".users .user-list");

searchBtn.onclick = () => {
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchBtn.classList.toggle("active");
}
searchBar.onkeyup = () => {
    let searchTerm = searchBar.value;
    if(searchTerm != ""){
        searchBar.classList.add("active");
    }else {
        searchBar.classList.remove("active");
    }
    let xhr = new XMLHttpRequest(); // creating xml request
    xhr.open("POST", "assets/search.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                userList.innerHTML = data;
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm);
}

setInterval(() =>{
    //start ajax
    let xhr = new XMLHttpRequest(); // creating xml request
    xhr.open("GET", "assets/users.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(!searchBar.classList.contains("active")){ //if active not contains in searchbar then add this data
                    userList.innerHTML = data;
                }
            }
        }
    }
    xhr.send() ;
}, 500); // this will run every 500ms.
