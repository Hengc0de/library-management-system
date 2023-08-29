// add hovered class to selected list item
let list = document.querySelectorAll(".navigation li");

function activeLink() {
  list.forEach((item) => {
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};
// // \\ hover 
// let mainbefore = document.querySelector(".main");
// mainbefore.addEventListener("click", () => {
//   mainbefore.style.display = "none";
// })
// show niormal view 


const showBtn = document.querySelector(".show");

// calculate fine on user select date 


  var value = document.getElementById("date");
  // datevalue.addEventListener("change", () => {
    
  // })
  // var datevalue = value.options[value.selectedIndex].value;
  value.addEventListener('input', date);
  function date(){
    var datevalue = value.value;
    datevalue = ( datevalue * 0.05).toFixed(2);
    if (datevalue == 0){
      datevalue = 0.5;
    }
    var fine = document.getElementById("fine");
    fine.value = datevalue;
  
  }
  let mode = localStorage.getItem('mode');
  function myFunction(){
  
    document.body.classList.toggle('light-theme');
    if (document.body.classList.contains('light-theme')){
      localStorage.setItem('mode', 'light');
    }
    else {
      localStorage.setItem('mode', 'dark');
    }
  }
  
  if (mode === 'dark'){
    document.body.classList.remove('light-theme');
  } 
  if (mode === 'light'){
    document.body.classList.add('light-theme');
  } 
  