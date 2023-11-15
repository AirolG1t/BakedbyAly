document.addEventListener("DOMContentLoaded", function () {
    const loginBTN = document.getElementById("loginButton");
    const enterLogin = document.getElementById("loginform");
    const enterSignup = document.getElementById("signupform");
    const forgotAccBTn = document.getElementById("forgotPass");
    let errorTxt = document.querySelector(".error-text");

    // Sign Up Button
    try {
        loginBTN.addEventListener('click', () => {
            document.getElementById("loginForm").reset();
            $('#wrapper-modals').modal('show');
            $('#wrapper-modal').modal('hide');
        });
    }catch(err){}

    // Login Button
    try {
        enterLogin.addEventListener('click', () => {
            document.getElementById("loginForm").reset();
            $('#wrapper-modal').modal('hide'); // Hide the signup modal
            $('#wrapper-modals').modal('show');
            errorTxt.style.display = "none"; // Show the login modal
        });
    }catch(err){}

    // Signup Button
    try {
        enterSignup.addEventListener('click', () => {
            document.getElementById("regForm").reset();
            const previewImage = document.getElementById('preview');
            previewImage.src = 'assets/images/user3.png';
            $('#wrapper-modals').modal('hide'); // Hide the login modal
            $('#wrapper-modal').modal('show'); // Show the signup modal
        });
    }catch(err){}

    // Forgot Password Button
    try {
        forgotAccBTn.addEventListener('click', () => {
            document.getElementById("loginForm").reset();
            $('#wrapper-modals').modal('hide');
            $('#forgotPass-modal').modal('show');
        });
    }catch(err){}

    // Sign Up Form Submission
    try {
        let form1 = document.getElementById("regForm");
        let errTXT = document.querySelector(".error-texts");
        form1.addEventListener("submit", function (e) {
            e.preventDefault(); // Prevent the default form submission
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "assets/signup.php", true);

            xhr.onload = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        let data = xhr.responseText;
                        if (data === "success") {
                            console.log(data);
                            $('#regForm')[0].reset();
                            $('#wrapper-modals').modal('show');
                            $('#wrapper-modal').modal('hide');
                        } else {
                            console.log(data);
                            errTXT.textContent = data;
                            errTXT.style.display = "block"; // Display the error message
                        }
                    }
                }
            };

            let formData1 = new FormData(form1);
            xhr.send(formData1);
        });
    }catch(err){}

    // Login Form Submission
    try {
        let form2 = document.getElementById("loginForm");

        form2.addEventListener("submit", function (e) {
            e.preventDefault();
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "assets/login.php", true);

            xhr.onload = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        let data = xhr.responseText;
                        if (data === "success") {
                            console.log(data);
                            window.location.href = "Customer.php";
                            $('#wrapper-modals').modal('hide');
                        } else if (data === "admin") {
                            console.log(data);
                            window.location.href = "index.php";
                        } else {
                            errorTxt.textContent = data;
                            errorTxt.style.display = "flex";
                        }
                    }
                }
            };

            let formData = new FormData(form2);
            xhr.send(formData);
        });
    }catch(err){}
});



const accBTNs = document.querySelectorAll(".accBTN");

accBTNs.forEach(accBTN => {
    accBTN.addEventListener('click', function() {
        let userOptionElement = accBTN.parentElement.parentElement.querySelector('.form-select');
        if (userOptionElement) {
            let userOption = userOptionElement.value;

            let xhr = new XMLHttpRequest();
            let accId = accBTN.getAttribute("data-hiddenid");

            let url = "assets/accounts.php?accountId=" + accId + "&userOption=" + userOption;
            xhr.open("GET", url, true);

            xhr.onload = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        let data = xhr.responseText;
                        if (data === "success") {
                            console.log("success");
                        } else {
                            errorTxt.textContent = data;
                            errorTxt.style.display ="block";
                        }
                    }
                }
            }
            xhr.send();
        } else {
            console.log(".user-option element not found.");
        }
    });
});

$("#resetForm").on('submit', function(e){
    e.preventDefault(); // Prevent the default form submission
  
      // Collect form data
      let formData = new FormData(this);
      const errTxt = document.querySelector(".error-text");
  
      // Send form data using Ajax
      $.ajax({
          type: 'POST',
          url: 'assets/accounts.php',
          data: formData,
          processData: false,
          contentType: false,
          success: function(response) {
              $('#resetForm')[0].reset();
              $('#wrapper-modals').modal('show');
              $('#forgotPass-modal').modal('hide');
              console.log(response);
          },
          error: function(response) {             
            errTxt.textContent = response;
            errTxt.style.display ="block";
        }
      });
})
$(document).ready(function() {
    // Capture the original table content during page load
    var originalTable = $("#accData").html();

    accountLiveSearch(originalTable);
});

function restoreTable(originalTable) {
    $("#accData").html(originalTable);
}

function accountLiveSearch(originalTable) {
    $('#account-search').on("keyup", function() {
        var input = $(this).val();

        if (input !== "") {
            $.ajax({
                url: "assets/live-search.php",
                method: "POST",
                data: { accS: input },
                success: function(response) {
                    $("#accData").html(response);
                }
            });
        } else {
            // Restore the original table when the input is empty
            restoreTable(originalTable);
        }
    });
}
