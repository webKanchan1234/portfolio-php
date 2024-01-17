const typewriterText = document.querySelector(".typewriter");
const phrases = [
    "UI Designer",
    "React Developer",
    "Spring Developer",
    "Full Stack Developer",
];

let phraseIndex = 0;
let characterIndex = 0;

function type() {
  if (characterIndex < phrases[phraseIndex].length) {
    typewriterText.textContent += phrases[phraseIndex][characterIndex];
    characterIndex++;
    setTimeout(type, 100);
  } else {
    setTimeout(erase, 1000);
  }
}

function erase() {
  if (characterIndex > 0) {
    typewriterText.textContent = phrases[phraseIndex].substring(0, characterIndex - 1);
    characterIndex--;
    setTimeout(erase, 50);
  } else {
    phraseIndex = (phraseIndex + 1) % phrases.length;
    setTimeout(type, 250);
  }
}

type();

function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more";
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less";
    moreText.style.display = "inline";
  }
}
