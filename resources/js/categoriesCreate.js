$(document).ready(function(){

  //setting CSRF_TOKEN variable
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

  //refresh data in the table after editing
  function refreshData(category){
    //var category = jQuery.parseJSON(data);  
    $("td#name"+category.id).html(category.name);
    $("td#description"+category.id).html(category.description);
    $("img#photo"+category.id).attr('src', "/"+category.thumbnail);
    $("td#date"+category.id).html(category.updated_at);
  };

  //Edit category's change-photo toggler
  $(".table").on('click', '.ec-photo-toggle', function(){
    var _this = $(this);
    var togglerId = _this.data('category');
    var photoDiv = $("div#ec-photo-"+togglerId);
    if(photoDiv.attr("hidden")){
      photoDiv.attr("hidden", false);
      _this.html("Hide");
    }else {
      photoDiv.attr("hidden", true);
      _this.html("Change photo")
    }

  });


  //initialization of custom-file-upload
  $('.custom-file-input').on('change', function() {
     let fileName = $(this).val().split('\\').pop();
     $(this).next('.custom-file-label').addClass("selected").html(fileName);
  }); 


  //initialization data table
  
  var table = $('.categories-table').DataTable({
      pageLength: 10,
      responsive: true,
      dom: '<"html5buttons"B>lTfgitp',
      buttons: [
          {
            extend: 'copy',
            exportOptions: {
            columns: [1,2]
            }
          },
          {
            extend: 'csv', 
            exportOptions: {
            columns: [1,2]
            }
          },
          {
            extend: 'excel', 
            title: 'Articles Categories',
            exportOptions: {
            columns: [1,2]
            }
          },
          {
            extend: 'pdf', 
            title: 'Articles Categories',
            exportOptions: {
            columns: [1,2]
            }
          },
          {extend: 'print',
           customize: function (win){
                  $(win.document.body).addClass('white-bg');
                  $(win.document.body).css('font-size', '10px');

                  $(win.document.body).find('table')
                          .addClass('compact')
                          .css('font-size', 'inherit');
          }
          }
      ],
      "order": [[0, 'desc']],
      "columnDefs": [
        { "orderable": false, "targets": [3,4,5] }
      ]
  });


  //Saving new category
  $("button.btn.btn-primary.save").on('click', function(){
    var saveButton = $(this);
    var name = $("input#nameNew").val();
    var description = $("textarea#descriptionNew").val();
    var photo = $("input#photoNew")[0].files[0];
    if(photo === undefined){photo = ""}
    var formData = new FormData;
    formData.append('photo', photo);
    formData.append('name', name );
    formData.append('description', description);
    formData.append('_token', CSRF_TOKEN);
    $.ajax({
        type: 'POST',
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        url: "/categories",
        method: 'POST',
        data: formData,
        success: function(category){
          var newRow = '<tr class="gradeA">\
          <td id="date'+category.id+'">'+category.updated_at+'</td>\
            <td id="name'+category.id+'">'+category.name+'</td>\
            <td id="description'+category.id+'">'+category.description+'</td>\
            <td>\
              <img id="photo'+category.id+'" src="/'+category.thumbnail+'" width="100" height="100" />\
            </td>\
            <td class="center">\
              <button class="btn btn-outline-primary edit" data-toggle="modal" data-target="#editModalCat'+category.id+'" data-category="'+category.id+'">Edit</button>\
            </td>\
            <td class="center">\
              <button class="btn btn-outline-primary delete" data-toggle="modal" data-target="#deleteModal" data-category="'+category.id+'">Delete</button>\
            </td>\
        </tr>';


          /*table.row.add([
              category.updated_at,
              category.name,
              category.description,
              '<img id="photo'+category.id+'" src="/'+category.thumbnail+'" width="100" height="100" />',
              '<button class="btn btn-outline-primary edit" data-toggle="modal" data-target="#editModalCat'+category.id+'" data-category="'+category.id+'">Edit</button>',
              '<button class="btn btn-outline-primary delete" data-category="'+category.id+'">Delete</button>'
              ]
          ).draw();*/

          $("span#nc-name-error").html("");
          $("span#nc-description-error").html("");
          $("span#nc-photo-error").html("");
          

          //HTML of new modal to be added to the page
          var newModal = '<div class="modal inmodal fade" \
           id="editModalCat'+category.id+'"tabindex="-1" \
           role="dialog"  \
           aria-hidden="true">\
            <div class="modal-dialog modal-lg">\
              <div class="modal-content">\
                  <div class="modal-header">\
                      <button type="button" class="close" data-dismiss="modal">\
                      <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>\
                      <h4 class="modal-title">Edit '+category.name+' category</h4>\
                      <small class="font-bold">You can edit your category name, description or chose a new photo</small>\
                  </div>\
                  <div id="'+category.id+'" class="modal-body">\
                        <div class="form-group">\
                          <label class="col-sm-2 col-form-label pl-0" for="name">Name:</label>\
                          <input class="form-control" type="text" name="name" value="'+category.name+'" required>\
                          <span id="ec-name-error-'+category.id+'"class="text-danger name"></span>\
                        </div>\
                        <div class="form-group">\
                          <label class="col-sm-2 col-form-label pl-0" for="description">Description:</label>\
                          <textarea class="form-control" type="text" name="description" required>'+category.description+'</textarea>  \
                          <span id="ec-description-error-'+category.id+'"class="text-danger"></span>\
                        </div>\
                        <button type="button" class="btn btn-warning ec-photo-toggle" data-category="'+category.id+'">Change photo</button>\
                        <div id="ec-photo-'+category.id+'" class="form-group" hidden>\
                          <label for="photoEdit" class="col-sm-3 col-fomr-label pl-0">Choose new photo...</label>\
                          <div class="custom-file">\
                              <input type="file" name="photoEdit" class="custom-file-input ec-photo">\
                              <label for="photoEdit" class="custom-file-label text-muted">Previous photo will be deleted...</label>\
                          </div>  \
                          <span id="ec-photo-error-'+category.id+'"class="text-danger"></span>\
                        </div>\
                  </div>\
                  <div class="modal-footer">\
                      <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>\
                      <button type="button" class="btn btn-primary ec-save" data-category="'+category.id+'">Save changes</button>\
                  </div>\
              </div>\
            </div>\
          </div>';



          $("tbody").append(newModal);
          $("tbody").prepend(newRow);
          $("#newCategory").modal('toggle');

          swal.fire({
            title: "Done",
            html: "Sucessfully created category",
            type: "success",
            showConfirmButton: false,
            timer: 1500
            });
          //initialization of custom-file-upload
          $('.custom-file-input').on('change', function() {
             let fileName = $(this).val().split('\\').pop();
             $(this).next('.custom-file-label').addClass("selected").html(fileName);
          }); 
        },
        error: function(response){
          $("span#nc-name-error").html("");
          $("span#nc-description-error").html("");
          $("span#nc-photo-error").html("");
          if(response.responseJSON.errors != null){
          var errors=response.responseJSON.errors;
          var nameError = errors.name;
          var descriptionError = errors.description;
          var photoError = errors.photo;
          var nameErrorSpan = $("span#nc-name-error");
          var descriptionErrorSpan = $("span#nc-description-error");
          var photoErrorSpan = $("span#nc-photo-error");

          if(nameError != null){
            nameErrorSpan.html(nameError);
          }else{
            nameErrorSpan.html("");
          }

          if(descriptionError != null){
            descriptionErrorSpan.html(descriptionError);
          }else{
            descriptionErrorSpan.html("");
          }

          if(photoError != null){
            photoErrorSpan.html(photoError);
          }else{
            photoErrorSpan.html("");
          }
          }
          
        }
      
    });

  });


  $(".table").on("click", ".edit", function(){
    var categoryId = $(this).data('category');
    $("#editModalCat"+categoryId).modal('show');
  });

  
  //Editing category
  $(".table-responsive").on('click', '.ec-save', function(){
    var saveButton = $(this);
    var categoryId = saveButton.data('category');
    var name = $("div.modal-body#"+categoryId).find('input[name="name"]').val();
    var description = $("div.modal-body#"+categoryId).find("textarea[name='description']").val();
    var nameErrorSpan = $("span#ec-name-error-"+categoryId);
    var descriptionErrorSpan = $("span#ec-description-error-"+categoryId);
    var photoErrorSpan = $("span#ec-photo-error-"+categoryId); 
    var editPhotoDiv = $("div#ec-photo-"+categoryId);
    var editPhotoTogglerButton = editPhotoDiv.siblings("button");
    var photo = editPhotoDiv.find("input.ec-photo")[0].files[0];
    if(photo === undefined){photo = ""}
    var formData = new FormData;

    formData.append('photo', photo);
    formData.append('name', name );
    formData.append('description', description);
    formData.append('_token', CSRF_TOKEN);
    formData.append('_method', 'PATCH');
    
    $.ajax({
        type: 'POST',
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        url: "/categories/"+categoryId,
        data: formData,
        success: function(category){
          nameErrorSpan.html("");
          descriptionErrorSpan.html("");
          photoErrorSpan.html("");
          $("#editModalCat"+categoryId).modal('hide');
          refreshData(category);
        },
        error: function(response){
          var errors = response.responseJSON.errors;
          nameErrorSpan.html("");
          descriptionErrorSpan.html("");
          photoErrorSpan.html("");

          if(errors.name != null){
            nameErrorSpan.html(errors.name);
          }

          if(errors.description != null){
            descriptionErrorSpan.html(errors.description);
          }

          if(errors.photo != null){
            photoErrorSpan.html(errors.photo);
          }
        }
      
    });

  });


  //Deleting category
  $(".categories-table").on('click','.delete', function(){
    var categoryId = $(this).data('category');
    var row = $(this).closest("tr");
    swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.value) {
          $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: "/categories/"+categoryId,
            data: {_token: CSRF_TOKEN, _method: 'DELETE'},
            success: function(response){
              console.log('deleted sucessfully');
              table.row(row).remove().draw();
            },
            error: function(response){
              console.log('some error occured during deleting category');
              console.log(response);
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
  });

});
