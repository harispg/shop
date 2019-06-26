<topnav-component inline-template v-cloak>
  <div class="u-header__section g-brd-bottom g-brd-gray-light-v4 g-transition-0_3">
    <div class="container">
      <div class="row justify-content-between align-items-end g-mx-0--lg">
        
        <a class="navbar-brand" href="{{route('home')}}">
          <p>Online Shop</p>
        </a>
        <div class="col-sm-auto g-pr-15 g-pr-0--sm">
          <div class="d-inline-block mr-5">
            <a id="account-dropdown-invoker-2" class="g-color-text g-color-primary--hover g-font-weight-400 g-text-underline--none--hover" href="#!"
                 aria-controls="account-dropdown-2"
                 aria-haspopup="true"
                 aria-expanded="false"
                 data-dropdown-target="#account-dropdown-2"
                 data-dropdown-type="css-animation"
                 data-dropdown-duration="300"
                 data-dropdown-hide-on-scroll="false"
                 data-dropdown-animation-in="fadeIn"
                 data-dropdown-animation-out="fadeOut">
                  <div class="pb-1 pl-0" v-text="userName"></div>

              </a>
              <ul id="account-dropdown-2" class="list-unstyled u-shadow-v29 g-pos-abs g-bg-white g-width-160 g-pb-5 g-mt-19 g-z-index-2"
                  aria-labelledby="account-dropdown-invoker-2">
                <li v-if="! authenticated">
                  <a class="d-block g-color-text g-color-primary--hover g-text-underline--none--hover g-font-weight-400 g-py-5 g-px-20" href="{{route('login')}}">
                    Login
                  </a>
                </li>
                <li v-if="! authenticated">
                  <a class="d-block g-color-text g-color-primary--hover g-text-underline--none--hover g-font-weight-400 g-py-5 g-px-20" href="{{route('register')}}">
                    Signup
                  </a>
                </li>

                <li v-if="authenticated">
                  <logout-component></logout-component>
                </li>
                <li  v-if="authenticated">
                  <a class="d-block g-color-text g-color-primary--hover g-text-underline--none--hover g-font-weight-400 g-py-5 g-px-20" href="{{route('wishlist.index')}}">
                    Wishlist
                  </a>
                </li>
                <li  v-if="authenticated">
                  <a class="d-block g-color-text g-color-primary--hover g-text-underline--none--hover g-font-weight-400 g-py-5 g-px-20" href="{{route('user.orders.index', ['user' => auth()->id()])}}">
                    Your Orders
                  </a>
                </li>
              </ul>
            </div>
          <!-- Basket -->
          <basket-component v-if="activeOrderId" :orderId="activeOrderId"></basket-component>
          <!-- End Basket -->

          <!-- Search -->
          <div class="d-inline-block g-valign-middle">
            <div class="g-py-10 g-pl-15">
              <a href="#!" class="g-color-black g-color-primary--hover g-font-size-17 g-text-underline--none--hover"
                 aria-haspopup="true"
                 aria-expanded="false"
                 aria-controls="searchform-1"
                 data-dropdown-target="#searchform-1"
                 data-dropdown-type="css-animation"
                 data-dropdown-duration="300"
                 data-dropdown-animation-in="fadeInUp"
                 data-dropdown-animation-out="fadeOutDown">
                <i class="g-pos-rel g-top-3 icon-education-045 u-line-icon-pro"></i>
              </a>
            </div>

            <!-- Search Form -->
            <form id="searchform-1" class="u-searchform-v1 u-dropdown--css-animation u-dropdown--hidden u-shadow-v20 g-max-width-400 g-brd-around g-brd-gray-light-v4 g-bg-white g-right-0 rounded g-pa-10"
            action="/search" method="GET">
              <div class="input-group">
                <input class="form-control g-font-size-13" type="search" name="search" placeholder="Search Products...">
                <div class="input-group-append p-0">
                  <button class="btn u-btn-primary g-font-size-12 text-uppercase g-py-15 g-px-15" type="submit">Go</button>
                </div>
              </div>
            </form>
            <!-- End Search Form -->
          </div>
          <!-- End Search -->
        </div>
      </div>
    </div>
  </div>
</topnav-component>