@extends('User.layouts.main')
@section('main-content')
    <!-- cart-area start -->
    <div class="cart-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Product Image</th>
                                    <th scope="col">Product NAME</th>
                                    <th scope="col">PRICE</th>
                                    <th scope="col">QUANTITY</th>
                                    <th scope="col">TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($cartItems != null)
                                    @foreach ($cartItems as $key => $cartItem)
                                        @php
                                            if (is_array($cartItem)) {
                                                $food = App\Models\FoodItem::find($cartItem[0]);
                                                $qty = $cartItem[1];
                                            } else {
                                                $food = App\Models\FoodItem::find($cartItem);
                                                $qty = 1;
                                            }
                                            // dd($cartProduct);
                                        @endphp
                                        @if ($food != null)
                                            <tr>
                                                <td>
                                                    <div class="cart-img"><img height="100"
                                                            src="{{ asset($food->image) }}" alt=""></div>
                                                </td>
                                                <td>
                                                    <div class="cart-name">
                                                        <h4><a
                                                                href="{{ route('foodDetail', $food->id) }}">{{ $food->food_name }}</a>
                                                        </h4>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="cart-price"><span>${{ $food->food_price }}</span></div>
                                                </td>
                                                <td>
                                                    <form method="POST" action="{{ route('cart.update', $key) }}"
                                                        class="cart-select">
                                                        @csrf
                                                        <input type="number" name="qty" value="{{ $qty }}"
                                                            class="form-control">
                                                    </form>
                                                </td>
                                                <td>
                                                    <div class="cart-del"><a href="#"><i class="fa fa-trash"
                                                                aria-hidden="true"></i></a></div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row mt-20">
                <div class="col-xl-6 col-lg-6">
                    <div class="coupon-left">
                        <form action="#">
                            <input type="text" placeholder="Coupon code">
                            <button>Apply coupon</button>
                        </form>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="update-cart text-left text-lg-right">
                        <a href="#">CLEAR SHOPPING CART</a>
                        <a href="#">UPDATE SHOPPING CART</a>
                    </div>
                </div>
            </div>
            <div class="row pt-80">
                <div class="col-xl-5 offset-xl-7 col-lg-8  offset-lg-4 pl-0">
                    <div class="section-title mb-20">
                        <h2>CART TOTALS</h2>
                    </div>
                    <div class="cart-total-price">
                        <ul>
                            <li>Subtotal <span>$70</span></li>
                            <li>Total <span>$70</span></li>
                        </ul>
                        <div class="text-right"><a class="btn brand-btn" href="#">CONTINUS SHOPPING</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cart-area start -->
    <!-- service-area-start -->
    <div class="service-area pt-80 pb-40 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="service-wrapper text-center mb-30">
                        <div class="service-img">
                            <img src="img/service/service1.png" alt="" />
                        </div>
                        <div class="service-text">
                            <h3>We cook with passion</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="service-wrapper text-center mb-30">
                        <div class="service-img">
                            <img src="img/service/service2.png" alt="" />
                        </div>
                        <div class="service-text">
                            <h3>Book a table online</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="service-wrapper text-center mb-30">
                        <div class="service-img">
                            <img src="img/service/service3.png" alt="" />
                        </div>
                        <div class="service-text">
                            <h3>Free and fast delivery</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service-area-end -->
    <!-- footer-area-start -->
    <footer>
        <div class="footer-top-area footer2 pt-100 pb-70 black2-bg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="footer-wrapper mb-30">
                            <div class="footer-logo">
                                <a href="index.html"><img src="img/logo/logo.png" alt="" /></a>
                            </div>
                            <div class="footer-text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In laoreet, enim nec venenatis
                                </p>
                            </div>
                            <div class="footer-icon">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                                <a href="#"><i class="fab fa-facebook"></i></a>
                                <a href="#"><i class="fab fa-skype"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="footer-wrapper mb-30">
                            <h3 class="footer-title">Quick Link</h3>
                            <ul class="footer-menu">
                                <li><a href="#"><i class="fas fa-caret-right"></i>About Us</a></li>
                                <li><a href="#"><i class="fas fa-caret-right"></i>Our Services</a></li>
                                <li><a href="#"><i class="fas fa-caret-right"></i>Contact Us</a></li>
                                <li><a href="#"><i class="fas fa-caret-right"></i>Recent News</a></li>
                                <li><a href="#"><i class="fas fa-caret-right"></i>Events</a></li>
                                <li><a href="#"><i class="fas fa-caret-right"></i>Shop</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="footer-wrapper mb-30">
                            <h3 class="footer-title">Photostream</h3>
                            <ul class="footer-img">
                                <li><a href="#"><img alt="" src="img/instagram/1.jpg"></a></li>
                                <li><a href="#"><img alt="" src="img/instagram/2.jpg"></a></li>
                                <li><a href="#"><img alt="" src="img/instagram/3.jpg"></a></li>
                                <li><a href="#"><img alt="" src="img/instagram/4.jpg"></a></li>
                                <li><a href="#"><img alt="" src="img/instagram/5.jpg"></a></li>
                                <li><a href="#"><img alt="" src="img/instagram/6.jpg"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="footer-wrapper mb-30">
                            <h3 class="footer-title">Our Editorial</h3>
                            <div class="footer-info">
                                <p>In laoreet, enima nec venenatis luctus, lectus dolor accumsan magna.</p>
                            </div>
                            <ul class="footer-link">
                                <li><i class="fas fa-home"></i>Bramley Rd, London W10 6SZ</li>
                                <li><i class="fas fa-phone"></i>+44 1234 358 759</li>
                                <li><i class="far fa-envelope"></i>contact@kettle.com</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom-area black-bg pt-25 pb-25">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="copyright text-center">
                            <p><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer-area-end -->
    <!-- Modal Search -->
    <div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form>
                    <input type="text" placeholder="Search here...">
                    <button>
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
