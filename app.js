// const theme = document.querySelector(".switch"),
// themeInput = document.querySelector(".input"),
// body = document.querySelector("body");
// themeInput.addEventListener("click", () => {
//     if (!body.classList.contains("light-theme")){
//         body.classList.add("light-theme");  
//     }
//     else {
//         body.classList.remove("light-theme");
//     }
// })
let mode = localStorage.getItem('mode');


// if (mode === 'dark'){
//   document.body.classList.remove('light-theme');
// } 
// if (mode === 'light'){
//   document.body.classList.add('light-theme');
// } 

let theme = document.querySelector('.input');
theme.addEventListener('click', () => {
  document.body.classList.toggle('light-theme');
  if (document.body.classList.contains('light-theme')){
    localStorage.setItem('mode', 'light');
  }
  else {
    localStorage.setItem('mode', 'dark');
  }
});

if (mode === 'dark'){
  document.body.classList.remove('light-theme');
} 
if (mode === 'light'){
  document.body.classList.add('light-theme');
} 

// genre switcher 
const genreSwitcher = document.querySelector(".genre-switch-container"),
genreContainer = document.querySelector(".genre"),
downArrow = document.querySelector(".down-arrow");
genreSwitcher.addEventListener("click", () => {
    if (genreContainer.classList.contains("genre-hide")){
        genreContainer.classList.remove("genre-hide");
        genreContainer.classList.add("genre-reveal");
        downArrow.classList.add("show");

    }
    else if (genreContainer.classList.contains("genre-reveal")){
        genreContainer.classList.remove("genre-reveal");
        genreContainer.classList.add("genre-hide");
        downArrow.classList.remove("show");
    }
    // else {
    //     genreContainer.classList.add("genre-hide");

    // }
}) 

// scroll top function 
const Sidelogo = document.querySelector(".topper"),
Sidesearch = document.querySelector(".search-side");
window.onscroll = function() {myFunction()};

function myFunction() {
  if (document.body.scrollTop > 60 || document.documentElement.scrollTop > 60) {
    Sidesearch.classList.add("show");
    Sidelogo.classList.add("show");
  } else {
    Sidesearch.classList.remove("show");
    Sidelogo.classList.remove("show");
  }
}
// signup sign in form 
// const signUpButton = document.getElementById('signUp');
// const signInButton = document.getElementById('signIn');
// const container = document.getElementById('container');

// signUpButton.addEventListener('click', () => {
// 	container.classList.add("right-panel-active");
// });

// signInButton.addEventListener('click', () => {
// 	container.classList.remove("right-panel-active");
// });

// menu side bar 
const bars = document.querySelector(".bars"),
 bars2 = document.querySelector(".bars2"),
sidebar = document.querySelector(".main .left-side"),
main = document.querySelector(".main");
bars.addEventListener("click", () => {
  if (!sidebar.classList.contains("active")){
    sidebar.classList.add("active");
    main.classList.add("active");
  }
  else if (sidebar.classList.contains("active")){
    sidebar.classList.remove("active");
    main.classList.remove("active");
  }

})
bars2.addEventListener("click", () => {
  if (!sidebar.classList.contains("active")){
    sidebar.classList.add("active");
    main.classList.add("active");
  }
  else if (sidebar.classList.contains("active")){
    sidebar.classList.remove("active");
    main.classList.remove("active");
  }

})
// }
const searchTrigger = document.querySelector(".search-trigger"),
searchBar = document.querySelector(".search"),
themecontainer = document.querySelector(".theme"),
rightSide = document.querySelector(".r-right-side");
searchTrigger.addEventListener("click", () => {
  searchBar.style.display = "flex";
  rightSide.style.display = "none";
  themecontainer.style.display = "none";
  searchTrigger.style.display = "none";
  mainclick();
})
function mainclick(){
  main.addEventListener("click", () => {
    searchBar.style.display = "none";
  rightSide.style.display = "block";
  themecontainer.style.display = "block";
  searchTrigger.style.display = "block";
})

}
if (window.innerWidth < 1600) {
  sidebar.classList.add("active");
 main.classList.add("active"); }

const name = document.getElementById("#name");
if (window.innerWidth > 600) {
  name.style.display = "none";  
}
if (window.innerWidth < 600) {
  name.style.display = "none";  
}

// search bar reveal small screen 



  // document.body.addEventListener('click', () => {
  //   searchBar.style.display = "none";
  //   rightSide.style.display = "block";
  //   themecontainer.style.display = "block";
  //   searchTrigger.style.display = "block";
  // });
// \\ scrennnnnnnnn 
// if (window.innerWidth <= 1600) {
//   sidebar.classList.add("active");
//   main.classList.add("active");

// go to preview 
console.log(window.innerWidth);