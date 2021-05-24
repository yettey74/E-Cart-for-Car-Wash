<!-- Slideshow container -->
<div class="slideshow-container">
<!-- Full-width images with number and caption text -->
<div class="mySlides fade">
    <div class="numbertext"><!--1 / 3--></div>
    <img src="images/logo.png" style="width:100%">
    <div class="text"><!--Rainy Day--></div>
  </div>
  
  <div class="mySlides fade">
    <div class="numbertext"><!--2 / 3--></div>
    <img src="images/happyHour1.jpg" style="width:100%">
    <div class="text"><!--Happy Hour--></div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext"><!--3 / 3--></div>
    <img src="images/prices.jpg" style="width:100%">
    <div class="text"><!--Price List--></div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext"><!--4 / 3--></div>
    <img src="images/rainyDay.jpg" style="width:100%">
    <div class="text"><!--Rainy Day--></div>
  </div>
  <div class="mySlides fade">
    <div class="numbertext"><!--5 / 3--></div>
    <img src="images/offCoffee.jpg" style="width:100%">
    <div class="text"><!--Rainy Day--></div>
  </div>
  <div class="mySlides fade">
    <div class="numbertext"><!--6 / 3--></div>
    <img src="images/happyHourVacum.jpg" style="width:100%">
    <div class="text"><!--Rainy Day--></div>
  </div>
  <div class="mySlides fade">
    <div class="numbertext"><!--7 / 3--></div>
    <img src="images/freeCoffeeDelux.jpg" style="width:100%">
    <div class="text"><!--Rainy Day--></div>
  </div>
  
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span>
  <span class="dot" onclick="currentSlide(4)"></span>
  <span class="dot" onclick="currentSlide(5)"></span>
  <span class="dot" onclick="currentSlide(6)"></span>
  <span class="dot" onclick="currentSlide(7)"></span>
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 3000); // Change image every 3 seconds
}
</script>