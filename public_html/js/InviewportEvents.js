/**
 * @subrutina para dispara evento inviewport
 * @sacada de la página https://codepen.io/jr-cologne/pen/zdYdmx
 */

// check if element is in view
function inView(element,palabra) {
  var elementHeight = element.clientHeight;
  // get window height
  var windowHeight = window.innerHeight;
  // get number of pixels that the document is scrolled
  var scrollY = window.scrollY || window.pageYOffset;
  
  // get current scroll position (distance from the top of the page to the bottom of the current viewport)
  var scrollPosition = scrollY + windowHeight;
  // get element position (distance from the top of the page to the bottom of the element)
  var elementPosition = element.getBoundingClientRect().top + scrollY + (elementHeight)/10.0;
  
  // is scroll position greater than element position? (is element in view?)
  if (scrollPosition > elementPosition) {
    //console.log(palabra + " pasé");
    element.className=palabra;
    /*return true; */
  }
  
  return false;
}

