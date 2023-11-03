const closedBtn = document.getElementById("closedbtn");
const addBtn = document.getElementById("addBtn");
const editButtons = document.querySelectorAll('.openModalButton');

// Add a click event listener to each edit button
editButtons.forEach(editButton => {
  editButton.addEventListener('click', () => {
    openModal(editButton);
  }); 
});

function openModal(button) {
  let xhr = new XMLHttpRequest();
  let hiddenId = button.getAttribute("data-hiddenid");
  let url = "assets/update.php?hiddenid=" + hiddenId;
  xhr.open("GET", url, true);
  $('#updateModal').modal('show');

  xhr.onload = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let modalContent = document.getElementById("modal-content");
        modalContent.innerHTML = xhr.responseText;
      }
    }
  };
  xhr.send();
}


addBtn.onclick = () => {
  $('#addproductModal').modal('show');
}

function getRandomColor() {
  var letters = '0123456789ABCDEF';
  var color = '#';
  for (var i = 0; i < 6; i++) {
    color += letters[Math.floor(Math.random() * 16)];
  }
  return color;
}

function applyRandomBackgroundColor(span) {
  span.style.backgroundColor = getRandomColor();
}

function resetBackgroundColor(span) {
  span.style.backgroundColor = '';
}

function checkCheckbox(id) {
  const checkbox = document.getElementById(id);
  if (checkbox) {
    checkbox.checked = !checkbox.checked;

    // Get the corresponding <span> element
    const span = checkbox.nextElementSibling;

    if (checkbox.checked) {
      applyRandomBackgroundColor(span);
      span.style.color = "white"
    } else {
      resetBackgroundColor(span);
      span.style.color = "black"
    }
  }
}
document.querySelector("button[data-dismiss='modal']").addEventListener("click", function() {
  const checkboxes = document.querySelectorAll(".tags");
  checkboxes.forEach(function(checkbox) {
    checkbox.checked = false;
    resetBackgroundColor(checkbox.nextElementSibling);
    checkbox.nextElementSibling.style.color = "black";
  });
});