
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Title -->
  <title>Static Header &amp; Sidebar | Unify - Responsive Website Template</title>

  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <!-- Favicon -->
  <link rel="shortcut icon" href="../../favicon.ico">

  <!-- Dropzone -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css">

  <!-- Google Fonts -->
  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans%3A400%2C300%2C500%2C600%2C700%7CPlayfair+Display%7CRoboto%7CRaleway%7CSpectral%7CRubik">
  <!-- CSS Global Compulsory -->
  <link rel="stylesheet" href="/unifyAssets/vendor/bootstrap/bootstrap.min.css">
  <!-- CSS Global Icons -->
  <link rel="stylesheet" href="/unifyAssets/vendor/icon-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="/unifyAssets/vendor/icon-line/css/simple-line-icons.css">
  <link rel="stylesheet" href="/unifyAssets/vendor/icon-etlinefont/style.css">
  <link rel="stylesheet" href="/unifyAssets/vendor/icon-line-pro/style.css">
  <link rel="stylesheet" href="/unifyAssets/vendor/icon-hs/style.css">

  <link rel="stylesheet" href="/backend/assets/vendor/hs-admin-icons/hs-admin-icons.css">

  <link rel="stylesheet" href="/unifyAssets/vendor/animate.css">
  <link rel="stylesheet" href="/unifyAssets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.min.css">
  <link rel="stylesheet" href="/backend/assets/vendor/bootstrap-tagsinput/css/bootstrap-tagsinput.css">

  <link rel="stylesheet" href="/backend/assets/vendor/flatpickr/dist/css/flatpickr.min.css">
  <link rel="stylesheet" href="/backend/assets/vendor/bootstrap-select/css/bootstrap-select.min.css">

  <link rel="stylesheet" href="/backend/assets/vendor/chartist-js/chartist.min.css">
  <link rel="stylesheet" href="/backend/assets/vendor/chartist-js-tooltip/chartist-plugin-tooltip.css">
  <link rel="stylesheet" href="/unifyAssets/vendor/fancybox/jquery.fancybox.min.css">

  <link rel="stylesheet" href="/unifyAssets/vendor/hamburgers/hamburgers.min.css">

  <!-- CSS Unify -->
  <link rel="stylesheet" href="/backend/assets/css/unify-admin.css">

  <!-- CSS Customization -->
  <link rel="stylesheet" href="/unifyAssets/css/custom.css">

  <!-- Sweetalert2 -->
  <link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
<body>

  @include('admin.header')

  <main class="container-fluid px-0">
    <div class="row no-gutters g-pos-rel g-overflow-x-hidden">
      
      @include('admin.sidebarNav')

      <div class="col g-ml-45 g-ml-0--lg g-pb-65--md">
        <div class="g-pa-20">
          <div class="row">

            @yield('content')
            
{{--             @include('admin.panels')

            @include('admin.statisticCard')

            @include('admin.incomeCard')

            @include('admin.calendarCard')

            @include('admin.activityCard')

            @include('admin.ticketsCard')

            @include('admin.commentsCard') --}}

          </div>
        </div>

        @include('admin.footer')

      </div>
    </div>
  </main>
  <script src="/js/app.js"></script>

  <!-- JS Global Compulsory -->
  <script src="/backend/assets/vendor/jquery/jquery.min.js"></script>
  <script src="/backend/assets/vendor/jquery-migrate/jquery-migrate.min.js"></script>

  <script src="/unifyAssets/vendor/popper.js/popper.min.js"></script>
  <script src="/unifyAssets/vendor/bootstrap/bootstrap.min.js"></script>
  <script src="/unifyAssets/vendor/cookiejs/jquery.cookie.js"></script>


  <!-- jQuery UI Core -->
  <script src="/unifyAssets/vendor/jquery-ui/ui/widget.js"></script>
  <script src="/unifyAssets/vendor/jquery-ui/ui/version.js"></script>
  <script src="/unifyAssets/vendor/jquery-ui/ui/keycode.js"></script>
  <script src="/unifyAssets/vendor/jquery-ui/ui/position.js"></script>
  <script src="/unifyAssets/vendor/jquery-ui/ui/unique-id.js"></script>
  <script src="/unifyAssets/vendor/jquery-ui/ui/safe-active-element.js"></script>

  <!-- jQuery UI Helpers -->
  <script src="/unifyAssets/vendor/jquery-ui/ui/widgets/menu.js"></script>
  <script src="/unifyAssets/vendor/jquery-ui/ui/widgets/mouse.js"></script>

  <!-- jQuery UI Widgets -->
  <script src="/unifyAssets/vendor/jquery-ui/ui/widgets/datepicker.js"></script>

  <!-- JS Plugins Init. -->
  <script src="/unifyAssets/vendor/appear.js"></script>
  <script src="/backend/assets/vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
  <script src="/backend/assets/vendor/flatpickr/dist/js/flatpickr.min.js"></script>
  <script src="/unifyAssets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="/backend/assets/vendor/chartist-js/chartist.min.js"></script>
  <script src="/backend/assets/vendor/chartist-js-tooltip/chartist-plugin-tooltip.js"></script>
  <script src="/backend/assets/vendor/fancybox/jquery.fancybox.min.js"></script>
  <script src="/unifyAssets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="/backend/assets/vendor/bloodhound-js/js/bloodhound.min.js"></script>
  <script src="/backend/assets/vendor/bloodhound-js/js/typeahead.jquery.min.js"></script>
  <script src="/backend/assets/vendor/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
  <script src="/unifyAssets/vendor/jquery.filer/js/jquery.filer.min.js"></script>
  <script src="/unifyAssets/vendor/jquery.maskedinput/src/jquery.maskedinput.js"></script>

  <!-- JS Unify -->
  <script src="/unifyAssets/js/hs.core.js"></script>
  <script src="/backend/assets/js/components/hs.side-nav.js"></script>
  <script src="/unifyAssets/js/helpers/hs.hamburgers.js"></script>
  <script src="/backend/assets/js/components/hs.range-datepicker.js"></script>
  <script src="/unifyAssets/js/components/hs.datepicker.js"></script>
  <script src="/unifyAssets/js/components/hs.dropdown.js"></script>
  <script src="/unifyAssets/js/components/hs.scrollbar.js"></script>
  <script src="/backend/assets/js/components/hs.area-chart.js"></script>
  <script src="/backend/assets/js/components/hs.donut-chart.js"></script>
  <script src="/backend/assets/js/components/hs.bar-chart.js"></script>
  <script src="/unifyAssets/js/components/hs.count-qty.js"></script>
  <script src="/unifyAssets/js/helpers/hs.focus-state.js"></script>
  <script src="/backend/assets/js/components/hs.popup.js"></script>
  <script src="/unifyAssets/js/helpers/hs.file-attachments.js"></script>
  <script src="/unifyAssets/js/components/hs.file-attachement.js"></script>
  <script src="/unifyAssets/js/components/hs.masked-input.js"></script>

  


  <!-- JS Custom -->
  <script src="/unifyAssets/js/custom.js"></script>

  @yield('script')

  <!-- JS Plugins Init. -->
  <script>
    $(document).on('ready', function () {

      
      // initialization of custom select
      $('.js-select').selectpicker();
  
      // initialization of hamburger
      $.HSCore.helpers.HSHamburgers.init('.hamburger');

  
      // initialization of sidebar navigation component
      $.HSCore.components.HSSideNav.init('.js-side-nav', {
        afterOpen: function() {
          setTimeout(function() {
            $.HSCore.components.HSAreaChart.init('.js-area-chart');
            $.HSCore.components.HSDonutChart.init('.js-donut-chart');
            $.HSCore.components.HSBarChart.init('.js-bar-chart');
          }, 400);
        },
        afterClose: function() {
          setTimeout(function() {
            $.HSCore.components.HSAreaChart.init('.js-area-chart');
            $.HSCore.components.HSDonutChart.init('.js-donut-chart');
            $.HSCore.components.HSBarChart.init('.js-bar-chart');
          }, 400);
        }
      });
  

      // initialization of HSDropdown component
      $.HSCore.components.HSDropdown.init($('[data-dropdown-target]'), {dropdownHideOnScroll: false});
  
      // initialization of custom scrollbar
      $.HSCore.components.HSScrollBar.init($('.js-custom-scroll'));
  
      // initialization of popups
      $.HSCore.components.HSPopup.init('.js-fancybox', {
        btnTpl: {
          smallBtn: '<button data-fancybox-close class="btn g-pos-abs g-top-25 g-right-30 g-line-height-1 g-bg-transparent g-font-size-16 g-color-gray-light-v3 g-brd-none p-0" title=""><i class="hs-admin-close"></i></button>'
        }
      });

      // initialization of forms
      $.HSCore.helpers.HSFileAttachments.init();
      $.HSCore.components.HSFileAttachment.init('.js-file-attachment');
      $.HSCore.helpers.HSFocusState.init();
      $.HSCore.components.HSCountQty.init('.js-quantity');

      // initialization of forms
      $.HSCore.components.HSMaskedInput.init('[data-mask]');

  
    });

      
  </script>

</body>

</html>
