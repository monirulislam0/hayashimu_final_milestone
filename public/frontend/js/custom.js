//For Search Input Box
function openSearch() {
  let searchInput = document.getElementById("search-input");
  let closeBtn = document.getElementById("close-search");
  let searchIcon = document.getElementById("searchIcon");
  searchInput.style.width = "260px";
  searchInput.style.visibility = "visible";
  searchInput.style.opacity = "1";
  closeBtn.style.display = "block";
  searchIcon.style.color = "#ccc";
}

function closeSearch() {
  let searchInput = document.getElementById("search-input");
  let closeBtn = document.getElementById("close-search");
  let searchIcon = document.getElementById("searchIcon");
  searchInput.style.width = "0px";
  searchInput.style.visibility = "hidden";
  searchInput.style.opacity = "0";
  closeBtn.style.display = "none";
  searchIcon.style.color = "#fff";
}

document.addEventListener("click", function (event) {
  let suggestionContainer = document.querySelector(".suggestion-container");
  if (!suggestionContainer.contains(event.target)) {
    suggestionContainer.style.display = "none";
  }
});

function handleViewportChange() {
  let imageSidebar = document.getElementById("imageSidebar");
  let fullSidebar = document.getElementById("fullSidebar");
  let productContainer = document.getElementById("productContainer");

  if (imageSidebar && fullSidebar && productContainer) {
    if (window.innerWidth < 768) {
      // Move Image Sidebar after Product Container
      fullSidebar.removeChild(imageSidebar);
      productContainer.appendChild(imageSidebar);
    }
  }
}

document.addEventListener("DOMContentLoaded", function () {
    let priceElements = document.querySelectorAll('.priceElement');

    function addCommasToNumber(element) {
        let price = element.textContent || element.innerText;
        element.textContent = '৳ ' + price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    priceElements.forEach(addCommasToNumber);
  // Attach the function to window resize event
  window.addEventListener("resize", handleViewportChange);

  // Trigger the function on page load
  handleViewportChange();
  let firstSubItems = document.querySelectorAll(".first-sub-item");

  firstSubItems.forEach(function (item) {
    item.addEventListener("mouseover", adjustSubmenuPosition);
  });

  function adjustSubmenuPosition() {
    let submenuElements = document.querySelectorAll(".submenu-second");

    submenuElements.forEach(function (submenu) {
      let navItem = this; // "this" refers to the specific element that triggered the event

      let submenuBottom =
        navItem.offsetTop + navItem.offsetHeight + submenu.offsetHeight + 20;
      let windowHeight = window.innerHeight;

      if (submenuBottom > windowHeight) {
        // Adjust the submenu position to be at the bottom of the window
        let newSubMenuTop =
          windowHeight - navItem.offsetHeight - submenu.offsetHeight - 50;
        submenu.style.top = newSubMenuTop + "px";
      }
    }, this);
  }

  let unsetWidth = document.getElementById("unset-width");

  for (let i = 0; i < unsetWidth.children.length; i++) {
    unsetWidth.children[i].removeAttribute("style");
  }
  let button = document.getElementById("backToTopBtn");

  window.onscroll = function () {
    scrollFunction();
  };

  function scrollFunction() {
    if (
      document.body.scrollTop > 20 ||
      document.documentElement.scrollTop > 20
    ) {
      button.style.display = "flex";
    } else {
      button.style.display = "none";
    }
  }

  button.onclick = function () {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE, and Opera
  };

  let items = document.querySelectorAll(".carousel-multiple .carousel-item");

  items.forEach((el) => {
    const minPerSlide = 3;
    let next = el.nextElementSibling;
    for (let i = 1; i < minPerSlide; i++) {
      if (!next) {
        // wrap carousel by using first child
        next = items[0];
      }
      let cloneChild = next.cloneNode(true);
      el.appendChild(cloneChild.children[0]);
      next = next.nextElementSibling;
    }
  });
  let expandedImg = document.getElementById("expandedImg");
  let zoomResult = document.getElementById("myresult");

  if (expandedImg && zoomResult) {
    expandedImg.addEventListener("mouseover", function () {
      zoomResult.style.opacity = "1";
      zoomResult.style.visibility = "visible";
    });

    expandedImg.addEventListener("mouseout", function () {
      zoomResult.style.opacity = "0";
      zoomResult.style.visibility = "hidden";
    });
  }
});

function openProductTab(evt, tab) {
  let i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontentProducts");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinksProducts");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tab).style.display = "block";
  evt.currentTarget.className += " active";
}
window.onload = function () {
  imageZoom("expandedImg", "myresult");
};
function productImgOpen(imgs) {
  let expandImg = document.getElementById("expandedImg");
  expandImg.src = imgs.src;
  expandImg.parentElement.style.display = "block";

  let result = document.getElementById("myresult");
  result.style.backgroundImage = "url('" + imgs.src + "')";
}

function imageZoom(imgID, resultID) {
  let img, lens, result, cx, cy;
  img = document.getElementById(imgID);
  result = document.getElementById(resultID);

  // Check if either img or result is null
  if (!img || !result) {
    return;
  }

  /*create lens:*/
  lens = document.createElement("DIV");
  lens.setAttribute("class", "img-zoom-lens");
  /*insert lens:*/
  img.parentElement.insertBefore(lens, img);
  /*calculate the ratio between result DIV and lens:*/
  cx = result.offsetWidth / lens.offsetWidth;
  cy = result.offsetHeight / lens.offsetHeight;
  /*set background properties for the result DIV:*/
  result.style.backgroundImage = "url('" + img.src + "')";
  result.style.backgroundSize = img.width * cx + "px " + img.height * cy + "px";
  /*execute a function when someone moves the cursor over the image, or the lens:*/
  lens.addEventListener("mousemove", moveLens);
  img.addEventListener("mousemove", moveLens);
  /*and also for touch screens:*/
  lens.addEventListener("touchmove", moveLens);
  img.addEventListener("touchmove", moveLens);

  function moveLens(e) {
    let pos, x, y;
    /*prevent any other actions that may occur when moving over the image:*/
    e.preventDefault();
    /*get the cursor's x and y positions:*/
    pos = getCursorPos(e);
    /*calculate the position of the lens:*/
    x = pos.x - lens.offsetWidth / 2;
    y = pos.y - lens.offsetHeight / 2;
    /*prevent the lens from being positioned outside the image:*/
    if (x > img.width - lens.offsetWidth) {
      x = img.width - lens.offsetWidth;
    }
    if (x < 0) {
      x = 0;
    }
    if (y > img.height - lens.offsetHeight) {
      y = img.height - lens.offsetHeight;
    }
    if (y < 0) {
      y = 0;
    }
    /*set the position of the lens:*/
    lens.style.left = x + "px";
    lens.style.top = y + "px";
    /*display what the lens "sees":*/
    result.style.backgroundPosition = "-" + x * cx + "px -" + y * cy + "px";
  }

  function getCursorPos(e) {
    let a,
      x = 0,
      y = 0;
    e = e || window.event;
    /*get the x and y positions of the image:*/
    a = img.getBoundingClientRect();
    /*calculate the cursor's x and y coordinates, relative to the image:*/
    x = e.pageX - a.left;
    y = e.pageY - a.top;
    /*consider any page scrolling:*/
    x = x - window.pageXOffset;
    y = y - window.pageYOffset;
    return { x: x, y: y };
  }
}
