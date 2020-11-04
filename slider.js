var slide1Index = 0;
show1Slides();

function show1Slides() {
  var i;
  var slides1 = document.getElementsByClassName("mySliders");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides1.length; i++) {
    slides1[i].style.display = "none";  
  }
  slide1Index++;
  if (slide1Index > slides1.length) {slide1Index = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides1[slide1Index-1].style.display = "block";  
  dots[slide1Index-1].className += " active";
  setTimeout(show1Slides, 4000); // Change image every 2 seconds

  
}