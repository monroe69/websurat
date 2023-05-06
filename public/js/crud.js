/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/my_crud/hapus.js":
/*!***************************************!*\
  !*** ./resources/js/my_crud/hapus.js ***!
  \***************************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

var tools = __webpack_require__(/*! ./tools */ "./resources/js/my_crud/tools.js");

var href;
var csrf_token = $('meta[name="csrf_token"]').attr("content");
$("body").on("click", ".btnHapus", function (e) {
  e.preventDefault();
  href = $(this).data("id");
  Swal.fire({
    title: "Apa anda yakin?",
    text: "Data yang telah dihapus tidak dapat dikembalikan!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Hapus",
    cancelButtonText: "Batal"
  }).then(function (result) {
    if (result.isConfirmed) {
      $.ajax({
        url: "".concat(tools.uri, "/").concat(href),
        type: "POST",
        data: {
          _method: "DELETE",
          _token: csrf_token
        },
        beforeSend: function beforeSend() {// lakukan sesuatu sebelum data dikirim
        },
        success: function success(response) {
          // return console.log(response);
          // lakukan sesuatu jika data sudah terkirim
          Swal.fire("Berhasil!", response.pesan, response.type);
          var oTable = $("#my_table").dataTable();
          oTable.fnDraw(false);

          if (tools.route === "gejala" || tools.route === "aturan") {
            // refresh page
            return location.reload();
          }
        }
      });
    }
  });
});

/***/ }),

/***/ "./resources/js/my_crud/tambah.js":
/*!****************************************!*\
  !*** ./resources/js/my_crud/tambah.js ***!
  \****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "removeFile": () => (/* binding */ removeFile),
/* harmony export */   "removeImages": () => (/* binding */ removeImages)
/* harmony export */ });
var tools = __webpack_require__(/*! ./tools */ "./resources/js/my_crud/tools.js");

toastr.options = {
  closeButton: true,
  debug: false,
  newestOnTop: false,
  progressBar: true,
  positionClass: "toast-top-right",
  preventDuplicates: false,
  onclick: null,
  showDuration: "300",
  hideDuration: "1000",
  timeOut: "5000",
  extendedTimeOut: "1000",
  showEasing: "swing",
  hideEasing: "linear",
  showMethod: "fadeIn",
  hideMethod: "fadeOut"
};

function tampilForm() {
  document.getElementById("judul_form").innerText = "From Tambah Data";
  document.getElementById("tombolForm").innerText = "Simpan Data";
  $(".tampilModal").modal("show");
}

var btnTambah = document.getElementById("tambah");

if (btnTambah) {
  btnTambah.addEventListener("click", function () {
    tampilForm();
    tools.save_method = "add";
    $("#id").val("");
    $(".inputReset").val("");
    $(".selectReset").val("").trigger("change");
    removeImages();
    removeFile();
  });
}

function formBiasa() {
  $("#formKu").on("submit", function (e) {
    e.preventDefault();
    var id = $("#id").val();
    var dataKu = $("#formKu").serialize();
    var url;
    var method;

    if (tools.save_method == "add") {
      url = "".concat(tools.uri);
      method = "POST";
    } else {
      url = "".concat(tools.uri, "/:id");
      url = url.replace(":id", id);
      method = "PUT";
    }

    $.ajax({
      url: url,
      type: method,
      data: dataKu,
      success: function success(response) {
        // return console.log(response);
        toastr[response.type](response.pesan, response.judul);

        if (response.type !== "error") {
          if (tools.route === "gejala" || tools.route === "aturan") {
            // refresh page
            return location.reload();
          }

          $("#id").val("");
          $(".inputReset").val("");
          var oTable = $("#my_table").dataTable();
          oTable.fnDraw(false);
          $(".selectReset").val("").trigger("change");
        }

        if (tools.save_method == "Ubah") {
          $(".tampilModal").modal("hide");
        }
      }
    }).fail(function (res) {
      console.log(res);
    });
  });
}

function formGambar() {
  $("#formGambar").on("submit", function (e) {
    e.preventDefault();
    var id = $("#id").val();
    var dataKu = new FormData(this);
    var url;

    if (tools.save_method == "add") {
      url = "".concat(tools.uri);
    } else {
      url = "".concat(tools.uri, "/:id");
      url = url.replace(":id", id);
      dataKu.append("_method", "PUT");
    }

    $.ajax({
      url: url,
      type: "POST",
      data: dataKu,
      contentType: false,
      cache: false,
      processData: false,
      success: function success(response) {
        // return console.log(response);
        toastr[response.type](response.pesan, response.judul);

        if (response.type !== "error") {
          $("#id").val("");
          $(".inputReset").val("");
          var oTable = $("#my_table").dataTable();
          oTable.fnDraw(false);
          $(".selectReset").val("").trigger("change");

          if (tools.save_method == "Ubah") {
            $(".tampilModal").modal("hide");
          }

          removeImages();
          removeFile();
        }
      }
    }).fail(function (jqXHR, ajaxOptions, thrownError) {
      alert("Error. Server tidak merespon");
    });
  });
}

var removeImages = function removeImages() {
  var images = document.querySelectorAll(".images-upload");
  var fotoPreview = document.querySelector(".fotoPreview");

  if (fotoPreview) {
    fotoPreview.style.transition = "all 0.3s ease-in-out";
    fotoPreview.style.opacity = "0"; // remove image

    setTimeout(function () {
      fotoPreview.style.backgroundImage = "";
      fotoPreview.style.display = "none";
      images.forEach(function (image) {
        image.value = "";
      }); // delete fotoPreview

      fotoPreview.remove();
    }, 100);
  }

  var buttonDelete = document.querySelector(".remove-image");

  if (buttonDelete) {
    buttonDelete.remove();
  }

  var foto_lama = document.querySelector(".foto_lama");

  if (foto_lama) {
    foto_lama.remove();
  }
};

var removeFile = function removeFile() {
  // find data-span="file_surat"
  var spans = document.querySelector("[data-span='file_surat']");

  if (spans) {
    spans.innerHTML = "";
  } // remove file


  var file_surat = document.querySelector("#file_surat");

  if (file_surat) {
    file_surat.value = "";
  }
}; // Script Tambah & Ubah


if (tools.route === "surat" || tools.route === "surat_masuk" || tools.route === "surat_keluar") {
  formGambar();
} else {
  formBiasa();
}



/***/ }),

/***/ "./resources/js/my_crud/tools.js":
/*!***************************************!*\
  !*** ./resources/js/my_crud/tools.js ***!
  \***************************************/
/***/ ((module) => {

// Variable
var route = document.getElementById("route").textContent;
var save_method;
var uri = "/crud/".concat(route);
module.exports = {
  route: route,
  save_method: save_method,
  uri: uri
};

/***/ }),

/***/ "./resources/js/my_crud/ubah.js":
/*!**************************************!*\
  !*** ./resources/js/my_crud/ubah.js ***!
  \**************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _tambah__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./tambah */ "./resources/js/my_crud/tambah.js");
var tools = __webpack_require__(/*! ./tools */ "./resources/js/my_crud/tools.js");



function dataForm(data) {
  // Jika route surat
  if (tools.route === "surat") {
    $("#id").val(data.id);
    $("#no_surat").val(data.no_surat);
    $("#tgl_surat").val(data.tgl_surat);
    $("#perihal").val(data.perihal);
    (0,_tambah__WEBPACK_IMPORTED_MODULE_0__.removeFile)();
    $(".tampilModal").modal("show");
    $("#judul").html("Silahkan Merubah Data");
    $("#tombolForm").html("Ubah Data");
  } // Jika route surat_masuk


  if (tools.route === "surat_masuk") {
    $("#id").val(data.id);
    $("#no_surat").val(data.surat.no_surat);
    $("#tgl_surat").val(data.surat.tgl_surat);
    $("#perihal").val(data.surat.perihal);
    $("#asal_surat").val(data.asal_surat);
    $("#tgl_masuk").val(data.tgl_masuk);
    (0,_tambah__WEBPACK_IMPORTED_MODULE_0__.removeFile)();
    $(".tampilModal").modal("show");
    $("#judul").html("Silahkan Merubah Data");
    $("#tombolForm").html("Ubah Data");
  } // Jika route surat_keluar


  if (tools.route === "surat_keluar") {
    $("#id").val(data.id);
    $("#no_surat").val(data.surat.no_surat);
    $("#tgl_surat").val(data.surat.tgl_surat);
    $("#perihal").val(data.surat.perihal);
    $("#tujuan_surat").val(data.tujuan_surat);
    $("#tgl_keluar").val(data.tgl_keluar);
    (0,_tambah__WEBPACK_IMPORTED_MODULE_0__.removeFile)();
    $(".tampilModal").modal("show");
    $("#judul").html("Silahkan Merubah Data");
    $("#tombolForm").html("Ubah Data");
  }
}

$("body").on("click", ".btnUbah", function (e) {
  e.preventDefault();
  var href = $(this).data("id");
  tools.save_method = "Ubah";
  $.ajax({
    url: "".concat(tools.uri, "/").concat(href, "/edit"),
    type: "GET",
    dataType: "JSON",
    beforeSend: function beforeSend() {// lakukan sesuatu sebelum data dikirim
    },
    success: function success(data) {
      // return console.log(data);
      dataForm(data);
    }
  });
});

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
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!******************************!*\
  !*** ./resources/js/crud.js ***!
  \******************************/
__webpack_require__(/*! ./my_crud/tools */ "./resources/js/my_crud/tools.js");

__webpack_require__(/*! ./my_crud/tambah */ "./resources/js/my_crud/tambah.js");

__webpack_require__(/*! ./my_crud/hapus */ "./resources/js/my_crud/hapus.js");

__webpack_require__(/*! ./my_crud/ubah */ "./resources/js/my_crud/ubah.js");
})();

/******/ })()
;