  @extends('master')

@section('content')

	<!-- Products -->
      <div class="container">
        <!-- Filters -->
        <div class="d-flex justify-content-end align-items-center g-brd-bottom g-brd-gray-light-v4 g-pt-40 g-pb-20">
          <!-- Show -->
          <div class="g-mr-60">
            <h2 class="h6 align-middle d-inline-block g-font-weight-400 text-uppercase g-pos-rel mb-0">Show:</h2>

            <!-- Secondary Button -->
            <select 
            id="perPage"
            class="bg-transparent border-0" 
            onchange="location = '?page='+{{$articles->currentPage()}}  + '&' + this.value + '&' + document.getElementById('sortBy').value;">
              <option name="showItemsNumber" value="show=8" @if($perPage == 8){{'selected'}}@endif>8</option>
              <option name="showItemsNumber" value="show=12" @if($perPage == 12){{'selected'}}@endif>12</option>
              <option name="showItemsNumber" value="show=20" @if($perPage == 20){{'selected'}}@endif>20</option>
              <option name="showItemsNumber" value="show=32" @if($perPage == 32){{'selected'}}@endif>32</option>
            </select>
            {{-- <div class="d-inline-block btn-group g-line-height-1_2">
              <button type="button" class="btn btn-secondary dropdown-toggle h6 align-middle g-brd-none g-color-gray-dark-v5 g-color-black--hover g-bg-transparent text-uppercase g-font-weight-300 g-font-size-12 g-pa-0 g-pl-10 g-ma-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                8
              </button>
              <div class="dropdown-menu rounded-0">
                <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300" href="#!">All</a>
                <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300" href="#!">5</a>
                <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300" href="#!">15</a>
                <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300" href="#!">20</a>
                <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300" href="#!">25</a>
              </div>
            </div> --}}
            <!-- End Secondary Button -->
          </div>
          <!-- End Show -->

          <!-- Sort By -->
          <div class="g-mr-60">
            <h2 class="h6 align-middle d-inline-block g-font-weight-400 text-uppercase g-pos-rel  mb-0">Sort by:</h2>

            <!-- Secondary Button -->
            <select 
            id="sortBy" 
            class="bg-transparent border-0 " 
            onchange="location ='?page='+{{$articles->currentPage()}}  + '&' + document.getElementById('perPage').value + '&' + this.value;">
              <option name="sortBy" value="sortBy=name" @if($sortBy == 'name'){{'selected'}}@endif>Name</option>
              <option name="sortBy" value="sortBy=updated_at" @if($sortBy == 'updated_at'){{'selected'}}@endif>Date</option>
              <option name="sortBy" value="sortBy=price&ascDesc=ASC" @if($sortBy == 'price' && $ascDesc == 'ASC'){{'selected'}}@endif>Price low to high</option>
              <option name="sortBy" value="sortBy=price&ascDesc=DESC" @if($sortBy == 'price' && $ascDesc == 'DESC'){{'selected'}}@endif>Price high to low</option>
            </select>
            {{-- <div class="d-inline-block btn-group g-line-height-1_2">
              <button type="button" class="btn btn-secondary dropdown-toggle h6 align-middle g-brd-none g-color-gray-dark-v5 g-color-black--hover g-bg-transparent text-uppercase g-font-weight-300 g-font-size-12 g-pa-0 g-pl-10 g-ma-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Bestseller
              </button>
              <div class="dropdown-menu rounded-0">
                <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300" href="#!">Bestseller</a>
                <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300" href="#!">Trending</a>
                <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300" href="#!">Price low to high</a>
                <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300" href="#!">price high to low</a>
              </div>
            </div> --}}
            <!-- End Secondary Button -->
          </div>
          <!-- End Sort By -->

          <!-- Sort By -->
          <ul class="list-inline mb-0">
            <li class="list-inline-item">
              <a class="u-icon-v2 u-icon-size--xs g-brd-gray-light-v3 g-brd-black--hover g-color-gray-dark-v5 g-color-black--hover" href="page-list-filter-left-sidebar-1.html">
                <i class="icon-list"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="u-icon-v2 u-icon-size--xs g-brd-primary g-color-primary" href="page-grid-filter-left-sidebar-1.html">
                <i class="icon-grid"></i>
              </a>
            </li>
          </ul>
          <!-- End Sort By -->
        </div>
        <!-- End Filters -->

        <!-- Products -->
        <div class="row g-pt-30 g-mb-50">
          <articles-collection :items="{{json_encode($articles->toArray()['data'])}}" inline-template v-cloak>
        <div class="row">
         @if($articles->count()==0)
            <div class="col-md-12 ml-5">Sorry, no results for your search...</div>
         @endif
            <div class="article col-6 col-lg-3 g-mb-30" v-for="article in articles" :key="article.id">
              <shop-article :article="article" inline-template>
                  <div>
    <figure class="g-pos-rel g-mb-20">
      <a :href="'/articles/'+this.data.id"><img class="img-fluid" :src="'/'+this.data.photos[0].thumbnail_path" alt="Image Description"></a>  
      
      <figcaption v-if="this.data.new"class="w-100 g-bg-primary g-bg-black--hover text-center g-pos-abs g-bottom-0 g-transition-0_2 g-py-5">
        <a class="g-color-white g-font-size-11 text-uppercase g-letter-spacing-1 g-text-underline--none--hover" href="#!">New Arrival</a>
      </figcaption>
    </figure>

    <div class="media">
      <!-- Product Info -->
      <div class="d-flex flex-column">
        <h4 class="h6 g-color-black mb-1">
          <a class="u-link-v5 g-color-black g-color-primary--hover"
           :href="'/articles/'+this.data.id"
           v-text="this.data.name">
          </a>
        </h4>
        <a class="d-inline-block g-color-gray-dark-v5 g-font-size-13" v-text="this.data.categories[0].name" :href="'/categories/'+this.data.categories[0].name"></a>
        <span class="d-block g-color-black g-font-size-17">@{{this.data.price}}</span>
      </div>
      <!-- End Product Info -->

      <ul class="list-inline media-body text-right">
        <li class="list-inline-item align-middle mx-0">
          <add-to-cart :article_id="this.data.id" inline-template>
              <a ref="addToCart" class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-color-primary--hover g-font-size-15 rounded-circle" href="#!"
             data-tooltip="Add to cart"
             data-tooltip-placement="left"
             @click="addToCart()">
            <i class="addToCart icon-finance-100 u-line-icon-pro" ></i>
          </a>
          </add-to-cart>
        </li>
        <li class="list-inline-item align-middle mx-0">
          <wishlist-component :state="this.data.wished" :article_id="this.data.id" inline-template>
            <a class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-color-primary--hover g-font-size-15 rounded-circle" href="#!"
              :data-tooltip="tooltipTitle()"
              data-tooltip-placement="right"

              >
              <i :class="'g-font-size-18 addToWishlist fa ' + heartColor(this.isWished)" :data-article="this.article_id" @click="heartClicked"></i>
            </a>
          </wishlist-component>
        </li>
      </ul>
      <!-- End Products Icons -->
    </div>
  </div>
              </shop-article>
            </div>
          </div>
          </articles-collection>
        </div>

        <modal-login></modal-login>
        
        <hr class="g-mb-60">
        {{$articles->appends(['show'=>$perPage,'sortBy'=>$sortBy, 'ascDesc'=>$ascDesc])->links()}}
      </div>
      <!-- End Products -->

@endsection

{{-- @section('script')
<script></script>
@endsection --}}