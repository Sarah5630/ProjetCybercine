document.addEventListener("DOMContentLoaded", function() {
    let rating = "";
    // Create an empty array for storing highlighted stars
    const highlightedStars = [];
    let allStars = "";
  
    // Select all of the star icons on the page
    allStars = document.querySelectorAll(".fa-star");
  
    // Select the element on the page that will display the rating
    rating = document.querySelector(".rating");
  
    // Set up event listeners for all star icons
    init();
  
    function init() {
      allStars.forEach((star) => {
        // When a star is clicked, save the rating
        star.addEventListener("click", saveRating);
        // When a star is moused over, highlight it and all previous siblings
        star.addEventListener("mouseover", addCSS);
        // When the mouse leaves a star, remove highlighting from it and all previous siblings
        star.addEventListener("mouseleave", removeCSS);
      });
    }
  
    function saveRating(e) {
      // Remove event listeners from all stars
      removeEventListenersFromAllStars();
      // Set the text of the rating element to the value of the data-star attribute of the clicked star
      rating.innerText = e.target.dataset.star;
    }
  
    function removeEventListenersFromAllStars() {
      // Remove event listeners from all stars using a loop and the removeEventListener method
      allStars.forEach((star) => {
        star.removeEventListener("click", saveRating);
        star.removeEventListener("mouseover", addCSS);
        star.removeEventListener("mouseleave", removeCSS);
      });
    }
  
    function addCSS(e, css = "checked") {
      // Add the "checked" class to the clicked star and all previous siblings
      const overedStar = e.target;
      overedStar.classList.add(css);
      const previousStars = getPreviousSiblings(overedStar);
      previousStars.forEach((elem) => elem.classList.add(css));
    }
  
    function removeCSS(e, css = "checked") {
      // Remove the "checked" class from the clicked star and all previous siblings
      const overedStar = e.target;
      overedStar.classList.remove(css);
      const previousStars = getPreviousSiblings(overedStar);
      previousStars.forEach((elem) => elem.classList.remove(css));
    }
  
    function getPreviousSiblings(elem) {
      // Return an array of all previous siblings of the given element that are of type "span"
  
      let sibs = [];
      const spanNodeType = 1;
      while ((elem = elem.previousElementSibling)) {
        if (elem.nodeType === spanNodeType) {
          sibs = [elem, ...sibs];
        }
      }
      return sibs;
    }
  });
  