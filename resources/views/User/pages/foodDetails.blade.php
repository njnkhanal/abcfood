@extends('user.layouts.main')
@section('main-content')
<style>
    .icon-hover:hover {
  border-color: red !important;
  background-color: white !important;
  color: red !important;
}

.icon-hover:hover i {
  color: red !important;
}
</style>
<div class="shop-area pt-100 ">
    <div class="container">
      <div class="row mb-50">
        <div class="col-xl-6 col-lg-5">
          <div class="product-zoom-img mb-50">
            <div class="tab-content" id="myTabContent">
              <div
                class="tab-pane fade show active"
                id="home"
                role="tabpanel"
                aria-labelledby="home-tab"
              >
                <img src="{{asset($foodItem->image)}}" alt="" />
              </div>
              
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-lg-7">
          <div class="product-desc ">
            <h2>{{$foodItem->food_name}}</h2>
            {{-- <div class="rating">
              <a href="#"><i class="fas fa-star"></i></a>
              <a href="#"><i class="fas fa-star"></i></a>
              <a href="#"><i class="fas fa-star"></i></a>
              <a href="#"><i class="fas fa-star"></i></a>
              <a href="#"><i class="far fa-star"></i></a>
              <span>(2)</span>
            </div> --}}
            <span>Rs. {{$foodItem->food_price}}</span>
            <p>
                {{$foodItem->description}}
            </p>
            
          <div class="row">
            <dt class="col-3">Category:</dt>
            <dd class="col-9">{{$foodItem->categories['name']}}</dd>

            <dt class="col-3">Status:</dt>
            <dd class="col-9"> {{$foodItem->availability_status}}</dd>
          </div>
          <hr />
          <div class="col-md-4 col-6 mb-3">
            <label class="mb-2 d-block">Quantity</label>
            <div class="input-group mb-3" style="width: 170px;">
              <button class="btn-white border border-secondary px-3" type="button" id="button-addon1" data-mdb-ripple-color="dark">
                <i class="fas fa-minus"></i>
              </button>
              <input type="text" class="form-control text-center border border-secondary" placeholder="14" aria-label="Example text with button addon" aria-describedby="button-addon1" />
              <button class=" btn-white border border-secondary px-3" type="button" id="button-addon2" data-mdb-ripple-color="dark">
                <i class="fas fa-plus"></i>
              </button>
            </div>
          </div>
          <a href="#" class="btn btn-warning shadow-0"> Buy now </a>
          <a href="#" class="btn btn-primary shadow-0"> <i class="me-1 fa fa-shopping-basket"></i> Add to cart </a>
          <a href="#" class="btn btn-light border border-secondary py-2 icon-hover px-3"> <i class="me-1 fa fa-heart fa-lg"></i> Save </a>
            {{-- <div class="pro-details-action">
              <a href="#" class="brand-btn">
                <i class="fas fa-shopping-cart"> </i>ADD TO CART</a
              >
              <a href="#" class="brand-btn">
                <i class="fas fa-shopping-cart"> </i>ORDER NOW</a
              >
              <select name="select" id="number">
                <option value="">01</option>
                <option value="">02</option>
                <option value="">03</option>
                <option value="">04</option>
                <option value="">05</option>
              </select>
            </div> --}}
          </div>
        </div>
</div>  
@endsection  