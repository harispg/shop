@extends('admin.master')

@section('cssUnify')
<link  rel="stylesheet" href="/unifyAssets/vendor/custombox/custombox.min.css">
@endsection

@section('content')

<div class="col col-sm-12">
	<h1 class="g-mb-70">New category:</h1>
			<!-- General Forms -->
	<form enctype="multipart/form-data" class="g-brd-around g-brd-gray-light-v4 g-pa-30 g-mb-30" action="{{route('categories.store')}}" method="POST">
			@csrf
		<div class="row">
			<div class="col">
			  <!-- Text Input -->
				  <div class="form-group g-mb-20 {{$errors->has('name')?"u-has-error-v1":""}}">
				    <label class="g-mb-10" for="name">Name</label>
				    <input id="name" name="name" class="form-control form-control-md g-brd-gray-light-v3--focus rounded-0" type="text"  value="{{old('name')}}" placeholder="T-shirt" required>
				    @if($errors->has('name'))
				    <small class="form-control-feedback">{{$errors->first('name')}}</small>
				    @endif
				  </div>
			  <!-- End Text Input -->



			  <div class="
			  	form-group g-mb-20 
			  	{{$errors->has('description')?"u-has-error-v1":""}}">

                <label class="g-mb-10" for="description">Description</label>

                <textarea
                	id="categoryDescription"
	                class="form-control 
	                	   form-control-md
	                	   g-brd-gray-light-v3 
	                	   g-brd-gray-light-v3--focus 
	                	   rounded-0 
	                	   g-resize-none 
	                	   g-overflow-hidden" 
	                name="description"
	                rows="4"
	                placeholder="Category description"
	                required>{{old('description')}}</textarea>

                @if($errors->has('description'))
                	<small class="form-control-feedback">
                		{{$errors->first('description')}}
                	</small>
                @endif
			  </div>

		    </div>
        </div>



		<div class="form-group mb-0 {{$errors->has('photo')?"u-has-error-v1":""}}">
        <h4 class="h6 g-font-weight-600 g-color-black g-mb-20">Plain File Input</h4>
        <label class="u-file-attach-v2 g-color-gray-dark-v5 mb-0">
          <input id="fileAttachment" name="photo" type="file">
          <i class="icon-cloud-upload g-font-size-16 g-pos-rel g-top-2 g-mr-5"></i>
          <span class="js-value">Attach photo</span>
        </label>
        @if($errors->has('photo'))
          <small class="form-control-feedback">{{$errors->first('photo')}}</small>
        @endif
    </div>

    <!-- Editable table -->

    <header class="g-mb-20">
              <h2 class="g-font-weight-400 g-font-size-16 g-color-black mb-0">Editable Table</h2>
            </header>

            <div class="table-responsive">
              <table class="js-editable-table table u-table--v3 u-editable-table--v1 g-color-black">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Project</th>
                    <th>Assignee</th>
                    <th>Latest Activity</th>
                    <th>Tasks Done</th>
                    <th></th>
                    <th>Submit</th>
                  </tr>
                </thead>

                <tbody>
                  <form>
                  <tr>
                    <td>1</td>
                    <td data-field="project"><input type="Text" name="name" value="Wed Development"></td>
                    <td data-field="name">Abbie Hart</td>
                    <td>14 Dec 2017</td>
                    <td>
                      <div class="progress g-height-6 g-rounded-3">
                        <div class="progress-bar g-bg-lightblue-v3 g-rounded-3" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td>
                      <a class="js-edit u-link-v5 g-color-gray-light-v6 g-color-secondary--hover" href="#!">
                        <i class="hs-admin-pencil"></i>
                      </a>
                      <a class="u-link-v5 g-color-gray-light-v6 g-color-secondary--hover g-text-underline--none--hover g-ml-12" href="#!">
                        <i class="hs-admin-trash"></i>
                      </a>
                    </td>
                    <td><button type="submit"class="btn btn-primary">S</button></td>
                  </tr>
                  </form>
                  <tr>
                    <td>2</td>
                    <td data-field="project">Seo Optimization</td>
                    <td data-field="name">John Doe</td>
                    <td>14 Jul 2017</td>
                    <td>
                      <div class="progress g-height-6 g-rounded-3">
                        <div class="progress-bar g-bg-primary g-rounded-3" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td>
                      <a class="js-edit u-link-v5 g-color-gray-light-v6 g-color-secondary--hover" href="#!">
                        <i class="hs-admin-pencil"></i>
                      </a>
                      <a class="u-link-v5 g-color-gray-light-v6 g-color-secondary--hover g-text-underline--none--hover g-ml-12" href="#!">
                        <i class="hs-admin-trash"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td data-field="project">Website Design</td>
                    <td data-field="name">Kyle Campbell</td>
                    <td>10 Jan 2017</td>
                    <td>
                      <div class="progress g-height-6 g-rounded-3">
                        <div class="progress-bar g-bg-lightbrown g-rounded-3" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td>
                      <a class="js-edit u-link-v5 g-color-gray-light-v6 g-color-secondary--hover" href="#!">
                        <i class="hs-admin-pencil"></i>
                      </a>
                      <a class="u-link-v5 g-color-gray-light-v6 g-color-secondary--hover g-text-underline--none--hover g-ml-12" href="#!">
                        <i class="hs-admin-trash"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td data-field="project">Wed Development</td>
                    <td data-field="name">Ann Cooper</td>
                    <td>24 Sep 2017</td>
                    <td>
                      <div class="progress g-height-6 g-rounded-3">
                        <div class="progress-bar g-bg-primary g-rounded-3" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td>
                      <a class="js-edit u-link-v5 g-color-gray-light-v6 g-color-secondary--hover" href="#!">
                        <i class="hs-admin-pencil"></i>
                      </a>
                      <a class="u-link-v5 g-color-gray-light-v6 g-color-secondary--hover g-text-underline--none--hover g-ml-12" href="#!">
                        <i class="hs-admin-trash"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td data-field="project">Admin Panel Design</td>
                    <td data-field="name">Douglas Park</td>
                    <td>30 Jun 2017</td>
                    <td>
                      <div class="progress g-height-6 g-rounded-3">
                        <div class="progress-bar g-bg-lightblue-v3 g-rounded-3" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td>
                      <a class="js-edit u-link-v5 g-color-gray-light-v6 g-color-secondary--hover" href="#!">
                        <i class="hs-admin-pencil"></i>
                      </a>
                      <a class="u-link-v5 g-color-gray-light-v6 g-color-secondary--hover g-text-underline--none--hover g-ml-12" href="#!">
                        <i class="hs-admin-trash"></i>
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>


	 	
	    <!-- End file input advanced -->

      <table class="table">
    <tr>
        <td>Id</td>
        <td>Name</td>
        <td>Description</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><form id="form1" action="/form1" method="POST"><input type="hidden" name="id" value="1"></form></td>
        <td><input form="form1" type="text" name="name" value="Name"></td>
        <td><input form="form1" type="text" name="description" value="Description"></td>
        <td><input form="form1" type="submit" value="Save"></td>
    </tr>
    <tr>
        <td><form id="form2" action="/form2" method="POST"><input type="hidden" name="id" value="1"></form></td>
        <td><input form="form2" type="text" name="name" value="Name"></td>
        <td><input form="form2" type="text" name="description" value="Description"></td>
        <td><input form="form2" type="submit" value="Save"></td>
    </tr>
    <tr>
        <td><form id="form3" action="/form3" method="POST"><input type="hidden" name="id" value="1"></form></td>
        <td><input form="form3" type="text" name="name" value="Name"></td>
        <td><input form="form3" type="text" name="description" value="Description"></td>
        <td><input form="form3" type="submit" value="Save"></td>
    </tr>
</table>

		<!-- Horisontal line -->
		<hr class="g-brd-gray-light-v4 g-mx-minus-30">
     	 
         <button 
         class="btn btn-md btn-xl--md 
 		   u-btn-secondary 
 		   g-width-120--md 
 		   g-font-size-12 
 		   g-font-size-default--md" 
         type="submit">
         	Save Category
     	 </button>


	</form>
			<!-- End Form -->

      <!-- Modal -->

      <a class="btn u-btn-primary" href="#modal19" data-modal-target="#modal19" data-modal-effect="slide">Launch Modal

      </a>

      <!-- Demo modal window -->
      <div id="modal19" class="text-left g-max-width-600 g-bg-white g-overflow-y-auto g-pa-20" style="display: none;">
        <button type="button" class="close" onclick="Custombox.modal.close();">
          <i class="hs-icon hs-icon-close"></i>
        </button>

        <table class="table">
    <tr>
        <td>Id</td>
        <td>Name</td>
        <td>Description</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><form id="form1" action="/form1" method="POST"><input type="hidden" name="id" value="1"></form></td>
        <td><input form="form1" type="text" name="name" value="Name"></td>
        <td><input form="form1" type="text" name="description" value="Description"></td>
        <td><input form="form1" type="submit" value="Save"></td>
    </tr>
    <tr>
        <td><form id="form2" action="/form2" method="POST"><input type="hidden" name="id" value="1"></form></td>
        <td><input form="form2" type="text" name="name" value="Name"></td>
        <td><input form="form2" type="text" name="description" value="Description"></td>
        <td><input form="form2" type="submit" value="Save"></td>
    </tr>
    <tr>
        <td><form id="form3" action="/form3" method="POST"><input type="hidden" name="id" value="1"></form></td>
        <td><input form="form3" type="text" name="name" value="Name"></td>
        <td><input form="form3" type="text" name="description" value="Description"></td>
        <td><input form="form3" type="submit" value="Save"></td>
    </tr>
</table>

        
      </div>
      <!-- End Demo modal window -->
</div>

@endsection

@section('plugin')
  <script src="/backend/assets/vendor/table-edits/build/table-edits.min.js"></script>
@endsection

@section('script')

<script type="text/javascript">
	$(document).on('ready', function(){
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      var config = {
        changeInput: '<div class="u-file-attach-v3 g-mb-15">\
                      <h3 class="g-font-size-16 g-color-gray-dark-v2 mb-0">Drop files here or <span class="g-color-primary">Browse your device</span></h3>\
                      <p class="g-font-size-14 g-color-gray-light-v2 mb-0">Maximum file size 10mb</p>\
                    </div>',
      showThumbs: true,
      templates: {
        box: '<div class="js-result-list row"></div>',
        item: '<div class="js-result-list__item col-md-3 text-center">\
                <div class="g-pa-10 g-brd-around g-brd-gray-light-v2">\
                  <h3 class="g-font-size-16 g-color-gray-dark-v2 g-mb-5">@{{fi-name}}</h3>\
                  <p class="g-font-size-12 g-color-gray-light-v2 g-mb-5">@{{fi-size2}}</p>\
                  <div class="g-mb-10">@{{fi-image}}</div>\
                  <div class="text-left">@{{fi-progressBar}}</div>\
                </div>\
               </div>',
        itemAppend: '<div class="js-result-list__item col-md-3">\
                      <div class="g-pa-10 g-brd-around g-brd-gray-light-v2">\
                        <h3 class="g-font-size-16 g-color-gray-dark-v2 g-mb-5">@{{fi-name}}</h3>\
                        <p class="g-font-size-12 g-color-gray-light-v2 g-mb-5">@{{fi-size2}}</p>\
                        <div class="g-mb-10">@{{fi-image}}</div>\
                        <div class="text-left">@{{fi-progressBar}}</div>\
                        <div>@{{fi-icon}}</div>\
                        <div><i class="js-result-list-item-remove fa fa-close"></i></div>\
                      </div>\
                     </div>',
        progressBar: '<progress class="u-progress-bar-v1"></progress>',
        _selectors: {
          list: '.js-result-list',
          item: '.js-result-list__item',
          progressBar: '.u-progress-bar-v1',
          remove: '.js-result-list-item-remove'
        },
        itemAppendToEnd: false,
        removeConfirmation: true
      },

      uploadFile: {
        //url: '/ajaxPost',
        data: {_token: CSRF_TOKEN},
        type: 'POST',
        enctype: 'multipart/form-data',
        beforeSend: function() {},
        success: function(data, element) {
          var parent = element.find(".u-progress-bar-v1").parent();
          element.find(".u-progress-bar-v1").fadeOut("slow", function() {
            $("<div class=\"text-success g-px-10\"><i class=\"fa fa-check-circle\"></i> Success</div>").hide().appendTo(parent).fadeIn("slow");
          });
        },
        error: function(element) {
          var parent = element.find(".u-progress-bar-v1").parent();
          element.find(".u-progress-bar-v1").fadeOut("slow", function() {
            $("<div class=\"text-error g-px-10\"></div>").hide().appendTo(parent).fadeIn("slow");
          });
        }
      }

      };

	  $.HSCore.helpers.HSFileAttachments.init(config);
    $.HSCore.components.HSFileAttachment.init('.js-file-attachment', config);

    // initialization of editable table
      $('.js-editable-table tr').editable({
        keyboard: true,
        dblclick: true,
        button: true,
        buttonSelector: '.js-edit',
        maintainWidth: true,
        edit: function (values) {
          $('.js-edit i', this).removeClass('hs-admin-pencil').addClass('hs-admin-check g-color-secondary');
        },
        save: function (values) {
          $('.js-edit i', this).removeClass('hs-admin-check g-color-secondary').addClass('hs-admin-pencil');
        }
      });

    // initialization of modals
      $.HSCore.components.HSModalWindow.init('[data-modal-target]');



	});
</script>
@endsection

