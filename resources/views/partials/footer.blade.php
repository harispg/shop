<!-- Footer -->
      <footer class="g-bg-main-light-v1">

        <!-- Copyright -->
        <div class="container g-pt-30 g-pb-10">
          <div class="row justify-content-between align-items-center">
            <div class="col-md-6 g-mb-20">
              <p class="g-font-size-13 mb-0">2018 &copy; Hariscoding. All Rights Reserved.</p>
            </div>

            </div> --}}
          </div>
        </div>
        <!-- End Copyright -->
      </footer>
      <!-- End Footer -->

      <a class="js-go-to u-go-to-v2" href="#!"
         data-type="fixed"
         data-position='{
           "bottom": 15,
           "right": 15
         }'
         data-offset-top="400"
         data-compensation="#js-header"
         data-show-effect="zoomIn">
        <i class="hs-icon hs-icon-arrow-top"></i>
      </a>
    </main>

    <div class="u-outer-spaces-helper"></div>

    <!-- JS Global Compulsory -->
    <script src="/js/app.js"></script>
    <script src="/unifyAssets/vendor/jquery-migrate/jquery-migrate.min.js"></script>

    <!-- JS Implementing Plugins -->
    <script src="/unifyAssets/vendor/hs-megamenu/src/hs.megamenu.js"></script>
    <script src="/unifyAssets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="/unifyAssets/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="/unifyAssets/vendor/chosen/chosen.jquery.js"></script>
    <script src="/unifyAssets/vendor/image-select/src/ImageSelect.jquery.js"></script>
    <script src="/unifyAssets/vendor/jquery.countdown.min.js"></script>
    <script src="/unifyAssets/vendor/slick-carousel/slick/slick.js"></script>

    <script src="/unifyAssets/vendor/appear.js"></script>
    <script  src="/unifyAssets/vendor/jquery.filer/js/jquery.filer.min.js"></script>

    <!-- JS Unify -->
    <script src="/unifyAssets/js/hs.core.js"></script>
    <script src="/unifyAssets/js/components/hs.header.js"></script>
    <script src="/unifyAssets/js/helpers/hs.hamburgers.js"></script>
    <script src="/unifyAssets/js/components/hs.dropdown.js"></script>
    <script src="/unifyAssets/js/components/hs.scrollbar.js"></script>
    <script src="/unifyAssets/js/components/hs.countdown.js"></script>
    <script src="/unifyAssets/js/components/hs.count-qty.js"></script>
    <script src="/unifyAssets/js/components/hs.carousel.js"></script>
    <script src="/unifyAssets/js/components/hs.step-form.js"></script>
    <script src="/unifyAssets/js/components/hs.validation.js"></script>
    <script src="/unifyAssets/js/components/hs.go-to.js"></script>
    <script src="/unifyAssets/js/components/hs.tabs.js"></script>
    <script src="/unifyAssets/js/components/hs.select.js"></script>
    <script src="/unifyAssets/js/helpers/hs.rating.js"></script>
    <script  src="/unifyAssets/js/helpers/hs.focus-state.js"></script>

    <!-- JS Customization -->

    <script src="/unifyAssets/js/custom.js"></script>

    <!-- JS Plugins Init. -->


    
    <script>
      $(document).on('ready', function () {
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      var API_TOKEN = $("meta[name='api-token']").attr("content");

       // initialization of carousel
        $.HSCore.components.HSCarousel.init('[class*="js-carousel"]');

        $('#carouselCus1').slick('setOption', 'responsive', [{
          breakpoint: 1200,
          settings: {
            slidesToShow: 4
          }
        }, {
          breakpoint: 992,
          settings: {
            slidesToShow: 3
          }
        }, {
          breakpoint: 768,
          settings: {
            slidesToShow: 2
          }
        }], true);

      // initialization of header
      $.HSCore.components.HSHeader.init($('#js-header'));
      $.HSCore.helpers.HSHamburgers.init('.hamburger');

      // initialization of HSMegaMenu component
      $('.js-mega-menu').HSMegaMenu({
        event: 'hover',
        pageContainer: $('.container'),
        breakpoint: 991
      });
      // initialization of HSDropdown component
      $.HSCore.components.HSDropdown.init($('[data-dropdown-target]'), {
        afterOpen: function () {
          $(this).find('input[type="search"]').focus();
        }
      });

        // initialization of HSScrollBar component
        $.HSCore.components.HSScrollBar.init($('.js-scrollbar'));
        // initialization of go to
        $.HSCore.components.HSGoTo.init('.js-go-to');

        // initialization of form validation
        $.HSCore.components.HSValidation.init('.js-validate');
        // initialization of custom select
        $.HSCore.components.HSSelect.init('.js-custom-select');

        $.HSCore.helpers.HSFocusState.init();
      // initialization of quantity counter
      $.HSCore.components.HSCountQty.init('.js-quantity');
      // initialization of step form
      $.HSCore.components.HSStepForm.init('.js-step-form');
      });  

      // initialization of countdowns
      var countdowns = $.HSCore.components.HSCountdown.init('.js-countdown', {
        yearsElSelector: '.js-cd-years',
        monthElSelector: '.js-cd-month',
        daysElSelector: '.js-cd-days',
        hoursElSelector: '.js-cd-hours',
        minutesElSelector: '.js-cd-minutes',
        secondsElSelector: '.js-cd-seconds'
      });


    </script>


@yield('script')
  </body>
</html>