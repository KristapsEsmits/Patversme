let myCarousel = document.querySelector('#carousel')
  let carousel = new bootstrap.Carousel(myCarousel, {
    interval: 5000, 
    wrap: true     
  })
//////////////////////////////////////////////////////////////////////////////////////////////
function toggleChipNumber() {
    let chipCheckbox = document.getElementById("chip");
    let chipNumberField = document.getElementById("chipNumberField");

    if (chipCheckbox.checked == true) {
        chipNumberField.style.display = "block";
    } else {
        chipNumberField.style.display = "none";
    }
}
//////////////////////////////////////////////////////////////////////////////////////////////
const container = document.querySelector(".container"),
      pwShowHide = document.querySelectorAll(".showHidePw"),
      pwFields = document.querySelectorAll(".password"),
      signUp = document.querySelector(".signup-link"),
      login = document.querySelector(".login-link");

    //   js code to show/hide password and change icon
    pwShowHide.forEach(eyeIcon =>{
        eyeIcon.addEventListener("click", ()=>{
            pwFields.forEach(pwField =>{
                if(pwField.type ==="password"){
                    pwField.type = "text";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye-slash", "uil-eye");
                    })
                }else{
                    pwField.type = "password";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye", "uil-eye-slash");
                    })
                }
            }) 
        })
    })
//////////////////////////////////////////////////////////////////////////////////////////////
let type = localStorage.getItem('type');
let age = localStorage.getItem('age');
let availability = localStorage.getItem('availability');

// Set the values of the dropdown menus if they exist in the local storage
if (type) {
    document.querySelector('#type [value="' + type + '"]').selected = true;
}
if (age) {
    document.querySelector('#age [value="' + age + '"]').selected = true;
}
if (availability) {
    document.querySelector('#availability [value="' + availability + '"]').selected = true;
}

// Store the values of the dropdown menus in the local storage when they are changed
document.querySelectorAll('[data-name]').forEach(function(select) {
    select.addEventListener('change', function() {
        localStorage.setItem(select.dataset.name, select.value);
    });
});

//////////////////////////////////////////////////////////////////////////////////////////////
function showForm() {
    let form = document.getElementById("form");
    document.getElementById("visitBtn").style.display = "none";
    if (form.style.display === "none") {
        form.style.display = "block";
    } else {
        form.style.display = "none";
    }
}