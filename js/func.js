
/* Side Menu Mobile View */
function menuOpen() {
  document.getElementById("menuSidebar").style.display = "block";
  document.getElementById("menuOverlay").style.display = "block";
}
/* Side Menu Mobile View */
function menuClose() {
  document.getElementById("menuSidebar").style.display = "none";
  document.getElementById("menuOverlay").style.display = "none";
}

/* Top Text Menu View */
function topMenuTextIntroScroll() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.getElementById("topMenuText").classList.add("gs-card-4", "gs-animate-opacity");
    document.getElementById("topMenuIntro").classList.add("gs-show-inline-block");
  } else {
    document.getElementById("topMenuIntro").classList.remove("gs-show-inline-block");
    document.getElementById("topMenuText").classList.remove("gs-card-4", "gs-animate-opacity");
  }
}

/* Create Random Number */
function random(min, max) { 
  return Math.random() * (max - min + 1) + min; 
}

/* Loading Bubbles */
function loadBubbles() {
  for (var i = 0; i < 20; i++) {
    var randomOpacity = (random(1, 4)/10).toFixed(1);
    var randomDelay = Math.floor(random(5, 20));
    var randomDuration = Math.floor(random(1, 5));
    var randomLeft = Math.floor(random(1, 95));
    var randomWidth = Math.floor(random(20, 80));
    $(".bg-bubbles li:nth-child("+i+")").css("border-radius", "50%");
    $(".bg-bubbles li:nth-child("+i+")").css("background-color", "rgba(255, 255, 255, "+randomOpacity+")");
    $(".bg-bubbles li:nth-child("+i+")").css("left", randomLeft+"%");
    $(".bg-bubbles li:nth-child("+i+")").css("width", randomWidth+"px");
    $(".bg-bubbles li:nth-child("+i+")").css("height", randomWidth+"px");
    $(".bg-bubbles li:nth-child("+i+")").css("animation-duration", randomDelay+"s");
    $(".bg-bubbles li:nth-child("+i+")").css("animation-delay", randomDuration+"s");
  }
}

/* Assing Same Value to textbox */
function contactNumberViewInUsername() {
  document.getElementById("username").value = document.getElementById("contact").value;
}

/* Loading popup window */
function loadPopUp(windowNameId){
  $("#"+windowNameId).css("display", "block");
  $("body").css("overflow", "hidden !mportant");
  $(".gs-popup-close").click(function(){
      $(".gs-popup-window").css("display", "none");
      $("body").css("overflow", "scroll !mportant");
  });
}

/* Close popup window */
function windowOnClickClosePopUp(){
  if (event.target == document.getElementsByClassName("gs-popup-window")[0]) { $(".gs-popup-window").css("display", "none"); } 
  if (event.target == document.getElementsByClassName("gs-popup-window")[1]) { $(".gs-popup-window").css("display", "none"); } 
  if (event.target == document.getElementsByClassName("gs-popup-window")[2]) { $(".gs-popup-window").css("display", "none"); } 
  if (event.target == document.getElementsByClassName("gs-popup-window")[3]) { $(".gs-popup-window").css("display", "none"); } 
  if (event.target == document.getElementsByClassName("gs-popup-window")[4]) { $(".gs-popup-window").css("display", "none"); } 
  if (event.target == document.getElementsByClassName("gs-popup-window")[5]) { $(".gs-popup-window").css("display", "none"); } 
}

/* Message Alert Close Button */
function alartCloseBtn() {
  var close = document.getElementsByClassName("closebtn");
  var i;
  for (i = 0; i < close.length; i++) {
    close[i].onclick = function(){
      var div = this.parentElement;
      div.style.opacity = "0";
      setTimeout(function(){ div.style.display = "none"; }, 600);
    }
  }
}

function loadSideBarUserFunction(){
  var dropdown = document.getElementsByClassName("dropdown-btn");
  var i;
  for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var dropdownContent = this.nextElementSibling;
      if (dropdownContent.style.display === "block") { dropdownContent.style.display = "none"; } 
      else { dropdownContent.style.display = "block"; }
    });
  }
}










/**********************************************************************************************************
***********************************************************************************************************/



/*
function myAccordion(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("gs-show") == -1) {
    x.className += " gs-show";
    x.previousElementSibling.className += " gs-theme";
  } else { 
    x.className = x.className.replace("gs-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" gs-theme", "");
  }
}


function submitFunCallAPI() {
  var quote = $("#quote").val();
  if (quote === "") { console.log("This is empty quote value."); }
  else{
      console.log("Quote: "+quote);
      $.ajax({
        type: "get",
        url: "http://api.creativehandles.com/getRandomColor",
        success: function (data, text) {
          if(data === null){ changeColor(quote); console.log("This API return null color value."); }
          else if(data["color"] === "") { changeColor(quote); console.log("This API return empty color value."); }
          else{
            var backColor = data["color"];
            var fontColor = getFontColor(backColor);
            console.log("Quote: "+quote);
            changeColor(quote, backColor, fontColor);
          }
        },
        error: function (request, status, error) { 
          changeColor(quote);
          console.log("Exception in the API call:"+request.responseText); }
      });
  }
}

*/






