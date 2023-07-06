
function updateCounter(counterId, targetNumber) {
  let countElement = document.getElementById(counterId);
  let currentNumber = parseInt(countElement.innerText);

  if (currentNumber < targetNumber) {
      currentNumber += 1;
      countElement.innerText = currentNumber + "%";
      setTimeout(function() {
          updateCounter(counterId, targetNumber);
      }, 200); // Wait for 1 second
  }
}

window.onload = function() {
  updateCounter("counter1", 89);
  updateCounter("counter2", 47);
  updateCounter("counter3", 40);
  updateCounter("counter4", 66);
  updateCounter("counter5", 100);
  updateCounter("counter6", 100);
  updateCounter("counter7", 100);
  updateCounter("counter8", 100);
};


const slides = document.querySelectorAll('.mySlides');
let currentIndex = 0;

function showSlides() {
    const previousIndex = currentIndex;
    currentIndex = (currentIndex + 1) % slides.length;

    slides[previousIndex].classList.remove('active');
    slides[currentIndex].classList.add('active');

    setTimeout(showSlides, 5000); // Change slide every 5 seconds
}

showSlides();