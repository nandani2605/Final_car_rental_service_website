let menu = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');

menu.onclick = () => {
    menu.classList.toggle('bx-x');
    navbar.classList.toggle('active');
}

window.onscroll = () => {
    menu.classList.toggle('bx-x');
    navbar.classList.remove('active');
}

const sr = ScrollRevel ({
    distance: '60px',
    duration: 400,
    reset: true
})

sr.reveal('.text',{delay: 200, origin: 'top'})
sr.reveal('.form-container form',{delay: 800, origin: 'left'})
sr.reveal('.heading',{delay: 800, origin: 'top'})
sr.reveal('.ride-container .box',{delay: 600, origin: 'top'})
sr.reveal('.services-container .box',{delay: 600, origin: 'top'})
sr.reveal('.about-container .box',{delay: 600, origin: 'top'})
sr.reveal('.reviews-container',{delay: 600, origin: 'top'})
sr.reveal('.newsletter .box',{delay: 400, origin: 'bottom'})


//searching
const searchInput = document.getElementById('search-input');
const resultsContainer = document.getElementById('results-container');

searchInput.addEventListener('input', function () {
    const query = searchInput.value.trim();
    resultsContainer.innerHTML = ''; // Clear previous results

    if (query.length > 0) {
        // Simulated search results (replace with actual API calls)
        const fakeResults = ['surat', 'bharuch', 'vadodara', 'ankleshwar', 'ahmdabad'];

        fakeResults.forEach(result => {
            if (result.toLowerCase().includes(query.toLowerCase())) {
                const li = document.createElement('li');
                li.textContent = result;
                resultsContainer.appendChild(li);
            }
        });

        resultsContainer.style.display = 'block';
    } else {
        resultsContainer.style.display = 'none';
    }
});


//Sign Up Vadidation
function ValidateForm() {
    var name =
        document.forms["myform"]["name"].value;
    var phone =
        document.forms["myform"]["phone"].value;
    var email =
        document.forms["myform"]["email"].value;
    var address =
        document.forms["myform"]["address"].value;
    var password =
        document.forms["myform"]["pass"].value;
    var password1 =
        document.forms["myform"]["pass1"].value;

   var regEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/g;
   var regPhone=/^\d{10}$/;
   var regName = /\d+$/g;

    if (name == "" || regName.test(name)) {
        window.alert("Please enter your name properly.");
        name.focus();
        return false;
    }

    if(phone == "" || !regPhone.test(phone)) {
        alert("Please enter valid phone number.");
        phone.focus();
        return false;
    }
      
    if (email == "" || !regEmail.test(email)) {
        window.alert("Please enter a valid e-mail address.");
        email.focus();
        return false;
    }

    if (address == "") {
        window.alert("Please enter your address.");
        address.focus();
        return false;
    }

    if(password == "") {
        alert("Please enter your password");
        password.focus();
        return false;
    }

    if(password.length < 7) {
        alert ("Password should be atleast 7 character long");
        password.focus();
        return false;
    }

    if(password != password1)
    {
        alert("Confirm password must be same as setted password");
        return false;
    }
}

//Password Hide-Show
var a;
function pass()
{
if(a==1)
{
document.getElementById('password').type='password';
document.getElementById('pass-icon').src='pass-hide.png';  
a=0;
}
else
{
document.getElementById('password').type='text';
document.getElementById('pass-icon').src='pass-hide1.png';
a=1;    
}
} 

    const Hatchback = document.getElementById("Hatchback");
    const Sedan = document.getElementById("Sedan");
    const cars = document.querySelectorAll(".car");

    Hatchback.addEventListener("change", updateFilters);
    Sedan.addEventListener("change", updateFilters);

    function updateFilters() {
      cars.forEach(car => {
        const isHatchback = car.classList.contains("Hatchback");
        const isSedan = car.classList.contains("Sedan");

        const showCar = 
          (!Hatchback.checked || isHatchback) && 
          (!Sedan.checked || isSedan);

        car.style.display = showCar ? "block" : "none";
      });
    }
  