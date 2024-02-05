@extends('User.layouts.main')
@section('main-content')

    <!-- header-end -->
    <!-- slider start -->
    <div class="slider-area">
        <div class="slider-active">

            {{-- <div class="single-slider pt-300 pb-285 d-flex align-items-center" style="background-image:url({{ asset('assets/img/slider/slider1.jpg') }})"> --}}
            <div class="single-slider pt-300 pb-285 d-flex align-items-center"
                style="background-image:url({{ asset('user/backimg.jpg') }})">
                <div class="container">
                    <div class="row ">
                        <div class="col-xl-12">
                            <div class="slider-content text-center">
                                <span data-animation="fadeInUp" data-delay=".2s">Why wait in long lines when you can dine with
                                    time?</span>
                                <h1 data-animation="fadeInUp" data-delay=".4s">Order, eat, repeat!</h1>
                                {{-- <div class="slider-link" data-animation="fadeInUp" data-delay=".6s">
										<ul>
											<li>ORDER</li>
											<li>EAT</li>
											<li>ENJOY</li>
											<li>REPEAT</li>
										</ul>
									</div> --}}
                                @guest
                                    <div class="slider-button">
                                        <a data-animation="fadeInLeft" data-delay=".8s" href="{{ route('login') }}"
                                            class="btn">Sign In</a>
                                        <a data-animation="fadeInLeft" data-delay=".8s" href="{{ route('register') }}"
                                            class="btn">Sign Up</a>
                                    </div>
                                @endguest

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="single-slider pt-300 pb-285 d-flex align-items-center" style="background-image:url(img/slider/slider1.jpg)">
				   <div class="container">
					   <div class="row ">
						   <div class="col-xl-12">
								<div class="slider-content text-center">
									<span data-animation="fadeInUp" data-delay=".2s">Why do something you don’t like?</span>
									<h1 data-animation="fadeInUp" data-delay=".4s">WE ALSO DON’T KNOW!</h1>
									<div class="slider-link" data-animation="fadeInUp" data-delay=".6s">
										<ul>
											<li>FOUR PEOPLE</li>
											<li>FOUR CITIES</li>
											<li>FOUR STYLES</li>
											<li>FOUR IDEAS </li>
										</ul>
									</div>
									<div class="slider-button">
										<a data-animation="fadeInLeft" data-delay=".8s" href="#" class="btn">purchase theme</a>
										<div class="slider-video" data-animation="fadeInRight" data-delay="1s">
											<a class="popup-video" href="https://www.youtube.com/watch?v=2D3bZE5pXEE"><i class="fas fa-play"></i></a>
											<span>Watch The Overview</span>
										</div>
									</div>
								</div>
						   </div>
					   </div>
				   </div>
				</div>
				<div class="single-slider pt-300 pb-285 d-flex align-items-center" style="background-image:url(img/slider/slider1.jpg)">
				   <div class="container">
					   <div class="row ">
						   <div class="col-xl-12">
								<div class="slider-content text-center">
									<span data-animation="fadeInUp" data-delay=".2s">Why do something you don’t like?</span>
									<h1 data-animation="fadeInUp" data-delay=".4s">WE ALSO DON’T KNOW!</h1>
									<div class="slider-link" data-animation="fadeInUp" data-delay=".6s">
										<ul>
											<li>FOUR PEOPLE</li>
											<li>FOUR CITIES</li>
											<li>FOUR STYLES</li>
											<li>FOUR IDEAS </li>
										</ul>
									</div>
									<div class="slider-button">
										<a data-animation="fadeInLeft" data-delay=".8s" href="#" class="btn">purchase theme</a>
										<div class="slider-video" data-animation="fadeInRight" data-delay="1s">
											<a class="popup-video" href="https://www.youtube.com/watch?v=2D3bZE5pXEE"><i class="fas fa-play"></i></a>
											<span>Watch The Overview</span>
										</div>
									</div>
								</div>
						   </div>
					   </div>
				   </div>
				</div> --}}
        </div>
    </div>
    <!-- slider end -->
    <!-- service-area-start -->

    <div class="container">
        <div class="row p-4">
            <div class="col-md-6 mb-3">
                <div class="input-group">
                    <input type="search" class="form-control form-control-lg rounded" id="searchInput" placeholder="Search"
                        aria-label="Search" aria-describedby="search-addon" />
                    <span class="input-group-text border-0" style="background-color: #bf9410; color:white"
                        id="search-addon">
                        <i class="fas fa-search"></i>
                    </span>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="input-group">
                    <label class="input-group-text" style="background-color: black;color:white"
                        for="sortSelector">Category</label>
                    <select class="form-select" id="sortSelector">
                        <option value="smallToBig">Select</option>
                        <option value="smallToBig">Thuppa</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- special-menu-area-start -->
    <div class="special-menu-area pb-20">
        <div class="container">
            <div class="col-xl-12">
                <div class="section-title text-center mb-55">
                    <h1>Special Menu</h1>
                    <span>CHECK OUT OUR MENU</span>
                </div>
            </div>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        @if (isset($foodItems))
                            @foreach ($foodItems as $foodItem)
                                <div class="col-xl-4 col-lg-4 col-md-6 mb-60">
                                    <div class="shop-wrapper">
                                        <div class="shop-img">
                                            <a href=""><img src=" {{ asset($foodItem->image) }}"
                                                    alt="" /></a>

                                        </div>
                                        <div class="row align-items-center shop-text">
                                            <div class="col">
                                                <h3><a
                                                        href="/foodDetails/{{ $foodItem->id }}">{{ $foodItem->food_name }}</a>
                                                </h3>
                                            </div>
                                            <div class="col-auto">
                                                <a href="{{ route('cart.add', $foodItem->id) }}"
                                                    class="wishlist-button btn btn-cart btn-outline-secondary">
                                                    Add to Cart
                                                </a>
                                                {{-- <button class="wishlist-button btn btn-outline-secondary">
							<i class="fa fa-heart fa-lg" aria-hidden="true"></i>
						</button> --}}
                                            </div>
                                        </div>
                                        <span>{{ $foodItem->food_price }}</span>

                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>No food items available.</p>
                        @endif
                        {{-- <div class="col-xl-4 col-lg-4 col-md-6 mb-60">
            <div class="shop-wrapper">
              <div class="shop-img">
                <a href="#"><img src=" {{ asset('assets/img/shop/shop2.jpg') }}" alt="" /></a>
              
              </div>
              <div class="shop-text">
                <h3><a href="#">Chicken Ball </a></h3>
                <span>$99.90</span>
				<button class="wishlist-button btn btn-outline-secondary">
					<i class="fa fa-heart-o fa-lg" aria-hidden="true"></i>
				</button>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6 mb-60">
            <div class="shop-wrapper">
              <div class="shop-img">
                <a href="#"><img src=" {{ asset('assets/img/shop/shop3.jpg') }}" alt="" /></a>
              </div>
              <div class="shop-text">
                <h3><a href="#">Vegetable Pakura</a></h3>
                <span>$99.90</span>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6 mb-60">
            <div class="shop-wrapper">
              <div class="shop-img">
                <a href="#"><img src=" {{ asset('assets/img/shop/shop4.jpg') }}" alt="" /></a>
              </div>
              <div class="shop-text">
                <h3><a href="#">Special Wonthan</a></h3>
                <span>$99.90</span>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6 mb-60">
            <div class="shop-wrapper">
              <div class="shop-img">
                <a href="#"><img src=" {{ asset('assets/img/shop/shop5.jpg') }}" alt="" /></a>
              </div>
              <div class="shop-text">
                <h3><a href="#">Apple cider sauce and pork</a></h3>
                <span>$99.90</span>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6 mb-60">
            <div class="shop-wrapper">
              <div class="shop-img">
                <a href="#"><img src=" {{ asset('assets/img/shop/shop6.jpg') }}" alt="" /></a>
              </div>
              <div class="shop-text">
                <h3><a href="#">Cheese cake</a></h3>
                <span>$99.90</span>
              </div>
            </div>
          </div> --}}
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row mb-20">
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="shop-wrapper mb-40">
                                <div class="shop-img">
                                    <a href="#">
                                        <a href="#"><img src=" {{ asset('assets/img/shop/shop2.jpg') }}"
                                                alt="" /></a>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <div class="shop-desc">
                                <h2>
                                    <a href="#">Apple cider sauce and pork</a>
                                </h2>
                                <span>$99.90</span>
                                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                                    voluptatum deleniti atque corrupti
                                    quos dolores et quas molestias excepturi sint occaecati cupiditate non provident,
                                    similique sunt in culpa qui officia
                                    deserunt mollitia animi, id est laborum et dolorum fuga.</p>
                                <div class="shop-details">
                                    <a class="btn" href="#">View More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-20">
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="shop-wrapper mb-40">
                                <div class="shop-img">
                                    <a href="#"><img src=" {{ asset('assets/img/shop/shop3.jpg') }}"
                                            alt="" /></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <div class="shop-desc">
                                <h2><a href="#">Chicken Ball</a></h2>
                                <span>$99.90</span>
                                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                                    voluptatum deleniti atque corrupti
                                    quos dolores et quas molestias excepturi sint occaecati cupiditate non provident,
                                    similique sunt in culpa qui officia deserunt
                                    mollitia animi, id est laborum et dolorum fuga.</p>
                                <div class="shop-details">
                                    <a class="btn" href="#">View More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-20">
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="shop-wrapper mb-40">
                                <div class="shop-img">
                                    <a href="#"><img src="img/shop/shop3.jpg" alt="" /></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <div class="shop-desc">
                                <h2><a href="#">Special Wonthan</a></h2>
                                <span>$99.90</span>
                                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                                    voluptatum deleniti atque corrupti
                                    quos dolores et quas molestias excepturi sint occaecati cupiditate non provident,
                                    similique sunt in culpa qui officia deserunt
                                    mollitia animi, id est laborum et dolorum fuga.</p>
                                <div class="shop-details">
                                    <a class="btn" href="#">View More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-20">
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="shop-wrapper mb-40">
                                <div class="shop-img">
                                    <a href="#"><img src="img/shop/shop4.jpg" alt="" /></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <div class="shop-desc">
                                <h2><a href="#">Vegetable Pakura</a></h2>
                                <span>$99.90</span>
                                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                                    voluptatum deleniti atque corrupti
                                    quos dolores et quas molestias excepturi sint occaecati cupiditate non provident,
                                    similique sunt in culpa qui officia deserunt
                                    mollitia animi, id est laborum et dolorum fuga.</p>
                                <div class="shop-details">
                                    <a class="btn" href="#">View More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service-area-start -->
    {{-- <div class="service-area pt-80 pb-40 gray-bg">
			<div class="container">
				<div class="row">
					<div class="col-xl-4 col-lg-4 col-md-6">
						<div class="service-wrapper text-center mb-30">
							<div class="service-img">
								<img src="{{ asset('assets/img/service/service1.png') }}" alt="" />
							</div>
							<div class="service-text">
								<h3>We cook with passion</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-6">
						<div class="service-wrapper text-center mb-30">
							<div class="service-img">
								<img src="{{ asset('assets/img/service/service2.png') }}" alt="" />
							</div>
							<div class="service-text">
								<h3>Book a table online</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-6">
						<div class="service-wrapper text-center mb-30">
							<div class="service-img">
								
								<img src="{{ asset('assets/img/service/service3.png') }}" alt="" />
							</div>
							<div class="service-text">
								<h3>Free and fast delivery</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> --}}
    {{-- footer start --}}
    {{-- <footer>
		<div class="footer-bottom-area pt-25 pb-25 bg-dark">
			<div class="container">
				<div class="row">
					<div class="col-xl-12">
						<div class="copyright text-center">
							<p class=" text-light">@FoodHub. All Right Reserved</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer> --}}
    <!-- footer-area-end -->
    <script>
        function toggleDropdown() {
            var dropdown = document.getElementById("dropdown");
            dropdown.style.display =
                dropdown.style.display === "none" ? "block" : "none";
        }
    </script>
@endsection
