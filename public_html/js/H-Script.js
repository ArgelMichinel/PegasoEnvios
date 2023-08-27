function FunctionTopnav() {
  var x = document.getElementById("i-menu");
  if (x.className === "fa fa-bars") {
    x.className = "fa fa-times";
  } else {
    x.className = "fa fa-bars";
  }

  var x = document.getElementById("expandible");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}

function openSiNav() {
  document.getElementById("mySidebar").style.width = "250px";
  if (screen.width > 900 ) {
      document.getElementById("main").style.marginLeft = "250px";
      document.getElementById("header").style.marginLeft = "250px";
      document.getElementById("header").style.maxWidth = "calc( 100% - 250px)";
      }
}

function closeSiNav() {
  document.getElementById("mySidebar").style.width = "0";
  if (screen.width > 900 ) {
      document.getElementById("main").style.marginLeft = "0";
      document.getElementById("header").style.marginLeft = "0";
      document.getElementById("header").style.maxWidth = "100%";
      }
}

function closemenu() {
  let menuall = document.getElementById("mySidebar").children;
  for (i = 1; i < menuall.length; i++) {
      menuall[i].style.display = "none";
  }
       
}

function menuenvios() {
  closemenu();
  let menuall = document.getElementById("mySidebar").children;
  
  for (i = 1; i < 8; i++) {
      menuall[i].style.display = "block";
  }
  openSiNav();    
}

function menuclientes() {
  closemenu();
  let menuall = document.getElementById("mySidebar").children;
  
  menuall[8].style.display = "block";
  
  openSiNav();    
}

function menucadetes() {
  closemenu();
  let menuall = document.getElementById("mySidebar").children;
  
  for (i = 9; i < 12; i++) {
      menuall[i].style.display = "block";
  }
  openSiNav();     
}

function menuadminist() {
  closemenu();
  let menuall = document.getElementById("mySidebar").children;
  
  for (i = 12; i < 14; i++) {
      menuall[i].style.display = "block";
  }
  openSiNav();     
}