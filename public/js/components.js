/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/components/upload/file.js":
/*!************************************************!*\
  !*** ./resources/js/components/upload/file.js ***!
  \************************************************/
/***/ (() => {

// queryselector file-upload
var file_upload = document.querySelectorAll(".file-upload"); // style file-upload

var fileUpload = function fileUpload() {
  file_upload.forEach(function (file) {
    file.style.display = "none"; // get value attribute id

    var id = file.getAttribute("id"); // find parent

    var parent = file.parentNode; // find children by attribute data-id

    var fileUpload = parent.querySelector("[data-id='".concat(id, "']")); // button style

    fileUpload.style.display = "block";
    fileUpload.addEventListener("click", function (e) {
      e.preventDefault(); // file addlistener

      file.click();
    }); // file change

    file.addEventListener("change", function (e) {
      // get file name
      var name = e.target.value.split("\\").pop(); // add file name to fileUpload

      var span = parent.querySelector("[data-span='".concat(id, "']"));
      span.innerHTML = name; // create span element

      var spanElement = document.createElement("span"); // add class

      spanElement.classList.add("file-name"); // add text

      spanElement.textContent = "x"; // spanElament style

      spanElement.style.cursor = "pointer";
      spanElement.style["float"] = "right"; // spanElement addEventListener

      spanElement.addEventListener("click", function (e) {
        e.preventDefault(); // remove file name

        span.innerHTML = ""; // remove file

        file.value = "";
      }); // append span to fileUpload

      span.appendChild(spanElement);
    });
  });
};

if (file_upload) {
  fileUpload();
}

/***/ }),

/***/ "./resources/js/components/upload/image.js":
/*!*************************************************!*\
  !*** ./resources/js/components/upload/image.js ***!
  \*************************************************/
/***/ (() => {

// select selector all input class images
var images = document.querySelectorAll(".images-upload"); // show image preview to .image-preview

var showImages = function showImages() {
  // loop all input class images
  images.forEach(function (image) {
    image.addEventListener("change", function (e) {
      var imagePreview = document.querySelector(".image-preview"); // reset image preview

      imagePreview.innerHTML = ""; // create element class fotoPreview

      var fotoPreview = document.createElement("div");
      fotoPreview.classList.add("fotoPreview"); // add fotoPreview to imagePreview

      imagePreview.appendChild(fotoPreview);
      fotoPreview.style.backgroundImage = "url(".concat(URL.createObjectURL(e.target.files[0]), ")");
      fotoPreview.style.backgroundSize = "cover";
      fotoPreview.style.display = "block";
      fotoPreview.style.backgroundRepeat = "no-repeat";
      fotoPreview.style.backgroundPosition = "center";
      fotoPreview.style.backgroundColor = "transparent";
      fotoPreview.style.border = "none";
      fotoPreview.style.borderRadius = "50%";
      fotoPreview.style.height = "200px";
      fotoPreview.style.width = "100%";
      fotoPreview.style.display = "block";
      fotoPreview.style.margin = "0 auto";
      fotoPreview.style.boxShadow = "0 0 0 1px #ccc";
      fotoPreview.style.border = "1px solid #ccc";
      fotoPreview.style.padding = "0";
      fotoPreview.style.margin = "0";
      fotoPreview.style.overflow = "hidden";
      fotoPreview.style.position = "relative";
      fotoPreview.style.zIndex = "1";
      fotoPreview.style.transition = "all 0.3s ease-in-out"; // add button delete

      var buttonDelete = document.createElement("button");
      buttonDelete.classList.add("remove-image");
      buttonDelete.innerHTML = "X";
      buttonDelete.style.position = "absolute";
      buttonDelete.style.top = "0";
      buttonDelete.style.right = "0";
      buttonDelete.style.backgroundColor = "transparent";
      buttonDelete.style.border = "none";
      buttonDelete.style.zIndex = "100";
      buttonDelete.style.cursor = "pointer";
      buttonDelete.style.color = "black"; // add to parent fotoPreview

      fotoPreview.parentElement.appendChild(buttonDelete); // add event listener to button delete

      buttonDelete.addEventListener("click", function (e) {
        e.preventDefault(); // transition to hide image

        fotoPreview.style.transition = "all 0.3s ease-in-out";
        fotoPreview.style.opacity = "0"; // remove image

        setTimeout(function () {
          // delete background image from fotoPreview
          fotoPreview.style.backgroundImage = ""; // hide fotoPreview

          fotoPreview.style.display = "none";
          image.value = "";
        }, 300); // remove button delete

        buttonDelete.remove();
      });
    }); // change style of button upload

    image.style.position = "relative";
    image.style.zIndex = "1";
    image.style.border = "none";
    image.style.width = "100%";
    image.style.display = "block";
    image.style.margin = "0 0 10px 0";
    image.style.boxShadow = "0 0 0 1px #ccc";
    image.style.padding = "0";
  });
};

if (images) {
  showImages();
}

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!************************************!*\
  !*** ./resources/js/components.js ***!
  \************************************/
// Images
__webpack_require__(/*! ./components/upload/image */ "./resources/js/components/upload/image.js");

__webpack_require__(/*! ./components/upload/file */ "./resources/js/components/upload/file.js");
})();

/******/ })()
;