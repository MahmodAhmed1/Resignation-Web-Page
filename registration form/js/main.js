window.addEventListener('load', () => {
  const formEl = document.getElementById('myForm');
const formInputs = formEl.querySelectorAll('input');

// Submit form.
formEl.addEventListener('submit', (evt) => {
        evt.preventDefault();
        let password = document.getElementById("password").value;
        let confirmPassword = document.getElementById("confirm_password").value;
        let email = document.getElementById("email").value;

        if (password !== confirmPassword) {
          alert("Passwords do not match with each other");
          return false;
        }

        if (password.length < 8) {
          alert("Password must be at least 8 characters");
          return false;
        }
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
          alert("Please enter a valid email address");
          return false;
        }

        let hasNumber = false;
        for (let i = 0; i < password.length; i++) {
          if (!Number.isNaN(Number(password[i]))) {
            hasNumber = true;
            break;
          }
        }
        if (!hasNumber) {
          alert("Password must contain at least 1 number");
          return false;
        }

        let specialChars = "!@#$%^&*";
        let hasSpecialChar = false;
        for (const char of specialChars) {
          if (password.includes(char)) {
            hasSpecialChar = true;
            break;
          }
        }

        if (!hasSpecialChar) {
          alert(
            "Password must contain at least 1 special character (!@#$%^&*)"
          );
          return false;
        }

        formEl.submit();
});
});

// Ajaax
function checkUserName(){
  jQuery.ajax({
    url:"DB_Ops.php",
    data:'username='+$("#user_name").val(),
    type: "POST",
    success : function(data){
      $("#message").html(data);
    },
    error: function(){}
  });
}

function checkEmail(){
  jQuery.ajax({
    url:"DB_Ops.php",
    data:'email='+$("#email").val(),
    type: "POST",
    success : function(data){
      $("#message").html(data);
    },
    error: function(){}
  });
}

