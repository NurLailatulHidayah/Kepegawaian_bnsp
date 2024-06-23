var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides((slideIndex += n));
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("slide");
    if (n > slides.length) {
        slideIndex = 1;
    }
    if (n < 1) {
        slideIndex = slides.length;
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[slideIndex - 1].style.display = "block";
}

function autoSlides() {
    slideIndex++;
    showSlides(slideIndex);
    setTimeout(autoSlides, 5000); // Change slide every 5 seconds
}

autoSlides();

// var slideIndex = 1;
// showSlides(slideIndex);

// function plusSlides(n) {
//     showSlides((slideIndex += n));
// }

// function showSlides(n) {
//     var i;
//     var slides = document.getElementsByClassName("slide");
//     if (n > slides.length) {
//         slideIndex = 1;
//     }
//     if (n < 1) {
//         slideIndex = slides.length;
//     }
//     for (i = 0; i < slides.length; i++) {
//         slides[i].style.display = "none";
//     }
//     slides[slideIndex - 1].style.display = "block";
// }

// // var slideIndex = 1;
// // showSlides(slideIndex);

// // function plusSlides(n) {
// //   showSlides(slideIndex += n);
// // }

// // function showSlides(n) {
// //   var i;
// //   var slides = document.getElementsByClassName("slide");
// //   if (n > slides.length) {
// //     slideIndex = 1;
// //   }
// //   if (n < 1) {
// //     slideIndex = slides.length
// //   }
// //   for (i = 0; i < script slides.length; i++) {
// //     slides[i].style.display = "none";
// //   }
// //   slides[slideIndex - 1].style.display = "block";
// // }
