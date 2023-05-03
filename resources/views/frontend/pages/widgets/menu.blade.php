<section id="menu" class="menu">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Our Menu</h2>
            <p>Check Our <span>Yummy Menu</span></p>
        </div>

        <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <li class="nav-item">
                <a class="nav-link show active" data-bs-toggle="tab" href="#all">
                    <h4>Starters</h4>
                </a>
            </li><!-- End tab nav item -->
            @foreach ($categories as $category)
                <li class="nav-item">
                    <a class="nav-link show" data-bs-toggle="tab" href="#{{ $category->slug }}">
                        <h4>{{ $category->title }}</h4>
                    </a>
                </li><!-- End tab nav item -->
            @endforeach
        </ul>


        <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

            <div class="tab-pane fade active show" id="all">

              <div class="tab-header text-center">
                <p>Menu</p>
                <h3>Starters</h3>
              </div>
              <div class="row gy-5">

                @foreach ($allproduct as $product)
                <div class="col-lg-4 menu-item">
                  <a href="{{ asset('uploads/product_photo') }}/{{ $product->product_image }}" class="glightbox"><img src="{{ asset('uploads/product_photo') }}/{{ $product->product_image }}" class="menu-img img-fluid" alt="product_image"></a>
                  <h4>{{ $product->name }}</h4>
                  <p class="ingredients">
                    {{ $product->menu_item }}
                  </p>
                  <p class="price">
                    ${{ $product->price }}
                  </p>
                </div><!-- Menu Item -->
                @endforeach
              </div>
              <div class="col-12 text-center d-flex justify-content-center">
                <div class="py-3">
                    {{ $allproduct->links() }}
                </div>
            </div>
            </div>


            @foreach ($categories as $category)
            <div class="tab-pane fade show" id="{{ $category->slug }}">

              <div class="tab-header text-center">
                <p>Menu</p>
                <h3>{{ $category->title  }}</h3>
              </div>
              <div class="row gy-5">
                @foreach ($category->product as $cprodust)

                <div class="col-lg-4 menu-item">
                    <a href="{{ asset('uploads/product_photo') }}/{{ $cprodust->product_image }}" class="glightbox"><img src="{{ asset('uploads/product_photo') }}/{{ $cprodust->product_image }}" class="menu-img img-fluid" alt="product_image"></a>
                    <h4>{{ $cprodust->name }}</h4>
                    <p class="ingredients">
                      {{ $cprodust->menu_item }}
                    </p>
                    <p class="price">
                      ${{ $cprodust->price }}
                    </p>
                  </div><!-- Menu Item -->

                @endforeach
              </div>
              
            </div>
            @endforeach
    </div>
</section>
