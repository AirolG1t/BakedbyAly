let btn = document.querySelector('#btn');
let sidebarLinks  = document.querySelector('.sidebar');
let filterBTN = document.querySelector(".filter");

btn.onclick = function () {
  sidebarLinks.classList.toggle('active');
}; 

for (let i = 0; i < sidebarLinks.length; i++) {
sidebarLinks[i].addEventListener("click", function (event) {
  event.preventDefault(); // Prevent the default link behavior

  // Get the href attribute of the clicked link
  const href = this.getAttribute("href");

  // Open the corresponding HTML file
  if (href) {
    window.location.href = href;
  }
});
}
// To restore the original table content
function restoreOriginalTable() {
  $("#showData").html(originalTable);
}
//order search bar
function initializeLiveSearch() {
  $('#live-search').on("keyup", function() {
    var input = $(this).val();

    if (input !== "") {
      $.ajax({
        url: "assets/live-search.php",
        method: "POST",
        data: { input: input },
        success: function(response) {
          $("#showData").html(response);
        }
      });
    } else {
      restoreOriginalTable();
    }
  });
}

$(document).ready(function() {
  initializeLiveSearch();
});

// Use the class "filter" for the click event
function filterData() {
  $.ajax({
    url: "assets/filter.php",
    method: "POST",
    data: { input: "" },
    success: function(response) {
      // Update the table with new data
      $("#showData").html(response);
    }
  });
}

let originalTable = $("#showData").html();

filterBTN.addEventListener('click', () => {
  if (filterBTN.classList.contains('active')) {
      filterBTN.classList.remove('active');
      restoreOriginalTable();
  } else {
      filterBTN.classList.add('active');
      filterData();
  }
});