$("#login-admin-form").on("submit", function(e){
  document.querySelector("#btn-login").disabled = true;
  e.preventDefault();

  var email = $("#email").val();
  var pass = $("#pass").val();

  let isEmailValid = checkEmail();
  let isPassValid = checkPass();
  let isFormValid = isEmailValid && isPassValid;
  if (isFormValid == true) {
      var adata = {
        email: email,
        pass: pass,
      };
      $.ajax({
          url: "http://127.0.0.1:8888/loginAD",
          type: "POST",
          data: adata,
          dataType: 'json',
          success: function (data) {          
          
              document.querySelector("#btn-login").disabled = false;
          },
          error: function (data) {
              showToast("Error", "error", "Có lỗi xảy ra.", 2000);
              document.querySelector("#btn-login").disabled = false;
          },
      });
  }
  else {
      showToast("Error","error","Vui lòng kiểm tra và nhập đúng thông tin.",2000);
      document.querySelector("#btn-login").disabled = false;
  }
});
//Bắt lỗi Form
const emailEl = document.querySelector("#email");
const passEl = document.querySelector("#pass");

const checkEmail = () => {
let valid = false;
const emailQQ = emailEl.value.trim();

if (!isRequired(emailQQ)) {
  showError(emailEl, "Không được để trống !");
} else if (!isEmailValid(emailQQ)) {
  showError(emailEl, "Email không hợp lệ.");
} else {
  showSuccess(emailEl);
  valid = true;
}
return valid;
};
const isEmailValid = (email) => {
const re =
  /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
return re.test(email);
};

const checkPass = () => {
let valid = false;
const passEla = passEl.value;
if (!isRequired(passEla)) {
  showError(passEl, "Không được để trống !");
} else {
  showSuccess(passEl);
  valid = true;
}
return valid;
};

const isRequired = (value) => (value === "" ? false : true);

const showError = (input, message) => {
// get the form-field element
var formField = input.parentElement;
if (input.classList == "passW"){
  formField = input.parentElement.parentElement;
}

// add the error class
formField.classList.remove("success");
formField.classList.add("error");

 // show the error message
 const error = formField.querySelector("#login-admin-form small");
 error.textContent = message;
};

const showSuccess = (input) => {
// get the form-field element
var formField = input.parentElement;
if (input.classList == "passW"){
  formField = input.parentElement.parentElement;
}

// remove the error class
formField.classList.remove("error");
formField.classList.add("success");

// hide the error message
const error = formField.querySelector("small");
error.textContent = "";
};

const debounce = (fn, delay = 500) => {
let timeoutId;
return (...args) => {
  // cancel the previous timer
  if (timeoutId) {
    clearTimeout(timeoutId);
  }
  // setup a new timer
  timeoutId = setTimeout(() => {
    fn.apply(null, args);
  }, delay);
};
};

document.querySelector("#login-admin-form").addEventListener("submit", function (e) {
e.preventDefault();
let isEmailValid = checkEmail();
let isPassValid = checkPass();
let isFormValid = isEmailValid && isPassValid;
});

document.querySelector("#login-admin-form").addEventListener(
"input",
debounce(function (e) {
  switch (e.target.id) {
    case "email":
      checkEmail();
      break;
    case "pass":
      checkPass();
      break;
  }
})
);