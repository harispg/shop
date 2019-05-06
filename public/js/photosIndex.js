/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/photosIndex.js":
/*!*************************************!*\
  !*** ./resources/js/photosIndex.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

Dropzone.autoDiscover = false;
$(document).ready(function () {
  var CSRF_TOKEN = $("meta[name='csrf-token']").attr('content');
  var API_TOKEN = $("meta[name='api-token']").attr('content');
  $('.i-checks').iCheck({
    checkboxClass: 'icheckbox_square-green',
    radioClass: 'iradio_square-green'
  });
  $('#myDropzone').dropzone({
    url: '/api/photos',
    paramName: 'photos',
    autoProcessQueue: false,
    uploadMultiple: true,
    parallelUploads: 25,
    maxFiles: 25,
    maxFilesize: 2,
    acceptedFiles: 'image/*',
    addRemoveLinks: true,
    init: function init() {
      var _this = this;

      $("#sendPhotos").on('click', function (e) {
        _this.processQueue();
      }); //send all the form data along with the files:

      this.on("sendingmultiple", function (data, xhr, formData) {
        formData.append("_token", jQuery('input[name="_token"]').val());
        formData.append("api_token", API_TOKEN);
      });
      this.on("queuecomplete", function (e, response) {
        //AJAX request for fetching new photos array and rendering on frontend
        //bellow are helper functions renderPhotos and giveHtml
        $.ajax({
          type: 'POST',
          url: '/api/allPhotos',
          method: 'POST',
          data: {
            _token: CSRF_TOKEN,
            api_token: API_TOKEN
          },
          success: function success(photos) {
            renderPhotos(photos);
          }
        }); //window.location.href = "http://127.0.0.1:8000/photos"
      });
    }
  }); //AJAX RENDERING PHOTOS WITH NEW PHOTOS

  function renderPhotos(photos) {
    var numberOfPhotos = photos.length;
    var i = 0;
    $(".lightBoxGallery").html("");

    for (i; i < numberOfPhotos; i++) {
      giveHtml(photos[i]);
    } //need to run initialization of i-checks after rendering so checkbox can remain pretty


    $('.i-checks').iCheck({
      checkboxClass: 'icheckbox_square-green',
      radioClass: 'iradio_square-green'
    });
  }

  ;

  function giveHtml(photo) {
    $(".lightBoxGallery").append('<div class="badge m-2 bg-transparent border border-info">\
                <a href="' + photo.path + '" title="' + photo.name + '" data-photo="' + photo.id + '" data-gallery=""><img src="' + photo.thumbnail_path + '"></a> <br />\
                <label class="text-light mt-1 mr-5"> <input type="checkbox" class="i-checks"> Select</label>\
                <button type="button" data-photo="' + photo.id + '" class="btn btn-primary deletePhoto">Delete</button>\
                <form class="deleteForm" data-photo="' + photo.id + '" visibility="hidden" method="POST" action="/photos/' + photo.id + '">\
                    <input hidden name="_token" value="' + CSRF_TOKEN + '">\
                    <input hidden name="_method" value="DELETE">\
                </form>\
            </div>');
  }

  ; // ---END--- AJAX RENDERING PHOTOS WITH NEW PHOTOS
  //Searching photos script

  $("input[name='photoSearch']").on('keyup', function () {
    var searchInput = $("input[name='photoSearch']").val();
    $.ajax({
      type: 'POST',
      url: '/api/findPhotos',
      method: 'POST',
      data: {
        _token: CSRF_TOKEN,
        searchQuery: searchInput,
        api_token: API_TOKEN
      },
      success: function success(photos) {
        renderPhotos(photos);
      }
    });
  });
  $("#selectAll").on('click', function () {
    $(".icheckbox_square-green").addClass("checked");
  }); //function to send a request to delete a photo

  function deletePhotos(photoIds) {
    swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete all selected photos!'
    }).then(function (result) {
      if (result.value) {
        $.ajax({
          type: "POST",
          url: '/api/photosDelete',
          method: 'DELETE',
          data: {
            _token: CSRF_TOKEN,
            _method: "DELETE",
            photos: photoIds,
            api_token: API_TOKEN
          },
          success: function success(photos) {
            renderPhotos(photos);
          }
        });
        swal.fire({
          title: 'Deleted!',
          text: 'Your category has been deleted.',
          type: 'success',
          showConfirmButton: false,
          timer: 800
        });
      }
    });
  } //deleting a single photo


  $('.lightBoxGallery').on('click', 'button.deletePhoto', function () {
    var photoIds = [];
    photoIds[0] = $(this).data('photo');
    deletePhotos(photoIds); //$("form.deleteForm[data-photo="+photoIds[0]+"]").submit();
  }); //Deleting Multiple Photos

  $("#deleteSelected").on('click', function () {
    var photoIds = [];
    $(".icheckbox_square-green.checked").each(function () {
      photoIds.push($(this).parent().siblings("a").data("photo"));
    });
    deletePhotos(photoIds);
  });
});

/***/ }),

/***/ 2:
/*!*******************************************!*\
  !*** multi ./resources/js/photosIndex.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/haris/Desktop/shop/resources/js/photosIndex.js */"./resources/js/photosIndex.js");


/***/ })

/******/ });