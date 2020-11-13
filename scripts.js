var slide2Index = 0;
show2Slides();

function show2Slides() {
  var i;
  var slides2 = document.getElementsByClassName("mySliders1");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides2.length; i++) {
    slides2[i].style.display = "none";  
  }
  slide2Index++;
  if (slide2Index > slides2.length) {slide2Index = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides2[slide2Index-1].style.display = "block";  
  dots[slide2Index-1].className += " active";
  setTimeout(show2Slides, 4000); // Change image every 2 seconds

  
}