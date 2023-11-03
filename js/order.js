const orderBTN = document.querySelectorAll(".orderButton");
orderBTN.forEach(orderBTN => {
    orderBTN.addEventListener('click', () => {
      openModal(orderBTN);
    });
  });
  
  function openModal(button){
    let xhr = new XMLHttpRequest();
    let orderid = button.getAttribute("data-hiddenid");
    let url = "assets/live-search.php?hiddenid=" + orderid;
    xhr.open("GET", url, true);
    $('#orderModal').modal('show');
    
      xhr.onload = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let modalContent = document.getElementById("modal-content");
                modalContent.innerHTML = xhr.responseText;         
            }
        }
    } 
    xhr.send();
  }