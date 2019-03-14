  Dropzone.autoDiscover=false;

  $(document).ready(function(){
    var CSRF_TOKEN = $("meta[name='csrf-token']").attr('content');
    var API_TOKEN = $("meta[name='api-token']").attr('content');
    $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
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
        init: function() {
            var _this = this;

            $("#sendPhotos").on('click', function(e) {
              _this.processQueue();
            });
            //send all the form data along with the files:
            this.on("sendingmultiple", function(data, xhr, formData) {
                formData.append("_token", jQuery('input[name="_token"]').val());
                formData.append("api_token", API_TOKEN);
            });

            this.on("queuecomplete", function(e, response){
                //AJAX request for fetching new photos array and rendering on frontend
                //bellow are helper functions renderPhotos and giveHtml
                  $.ajax({     
                    type: 'POST',
                    url: '/api/allPhotos',
                    method: 'POST',
                    data: {_token: CSRF_TOKEN, api_token:API_TOKEN},
                    success: function(photos){
                      renderPhotos(photos);
                    }
                  });

                  //window.location.href = "http://127.0.0.1:8000/photos"
              });
        },

      });

    //AJAX RENDERING PHOTOS WITH NEW PHOTOS
      function renderPhotos(photos){
          var numberOfPhotos = photos.length;
          var i=0;
          $(".lightBoxGallery").html("");
          for(i; i<numberOfPhotos; i++){
            giveHtml(photos[i]); 
          }
          //need to run initialization of i-checks after rendering so checkbox can remain pretty
          $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });  
        };

        function giveHtml(photo){
          
          $(".lightBoxGallery").append(
            '<div class="badge m-2 bg-transparent border border-info">\
                <a href="'+photo.path+'" title="'+photo.name+'" data-photo="'+photo.id+'" data-gallery=""><img src="'+photo.thumbnail_path+'"></a> <br />\
                <label class="text-light mt-1 mr-5"> <input type="checkbox" class="i-checks"> Select</label>\
                <button type="button" data-photo="'+photo.id+'" class="btn btn-primary deletePhoto">Delete</button>\
                <form class="deleteForm" data-photo="'+photo.id+'" visibility="hidden" method="POST" action="/photos/'+photo.id+'">\
                    <input hidden name="_token" value="'+CSRF_TOKEN+'">\
                    <input hidden name="_method" value="DELETE">\
                </form>\
            </div>'
            );
        };

        // ---END--- AJAX RENDERING PHOTOS WITH NEW PHOTOS
        

        //Searching photos script
      $("input[name='photoSearch']").on('keyup', function() {
        var searchInput = $("input[name='photoSearch']").val();
        $.ajax({
          type: 'POST',
          url: '/api/findPhotos',
          method: 'POST',
          data: {_token: CSRF_TOKEN, searchQuery: searchInput, api_token:API_TOKEN},
          success: function(photos){
            renderPhotos(photos);
          }
        });
      });


      $("#selectAll").on('click', function(){
        $(".icheckbox_square-green").addClass("checked");
      });
      //function to send a request to delete a photo
      function deletePhotos(photoIds){
        swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete all selected photos!'
      }).then((result) => {
        if (result.value) {
          $.ajax({
          type:"POST",
          url: '/api/photosDelete',
          method: 'DELETE',
          data: {_token:CSRF_TOKEN, _method:"DELETE", photos: photoIds, api_token: API_TOKEN},
          success: function(photos){
            renderPhotos(photos);
            }
        });

          swal.fire({
            title:'Deleted!',
            text: 'Your category has been deleted.',
            type:'success',
            showConfirmButton:false,
            timer: 800
          })
        }
      });
      }

      //deleting a single photo
      $('.lightBoxGallery').on('click','button.deletePhoto', function(){
        var photoIds = [];
        photoIds[0] = $(this).data('photo');   
        deletePhotos(photoIds);   
        //$("form.deleteForm[data-photo="+photoIds[0]+"]").submit();
      });
      //Deleting Multiple Photos
      $("#deleteSelected").on('click', function(){
        var photoIds = [];
        $(".icheckbox_square-green.checked").each(function(){
        photoIds.push($(this).parent().siblings("a").data("photo"));
        });
        deletePhotos(photoIds);
      });

    
  });