let myCarousel = document.querySelector('#carousel')
  let carousel = new bootstrap.Carousel(myCarousel, {
    interval: 5000, 
    wrap: true     
  })

function toggleChipNumber() {
    var chipCheckbox = document.getElementById("chip");
    var chipNumberField = document.getElementById("chipNumberField");

    if (chipCheckbox.checked == true) {
        chipNumberField.style.display = "block";
    } else {
        chipNumberField.style.display = "none";
    }
}

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

