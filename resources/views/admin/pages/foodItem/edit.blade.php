@extends('admin.layouts.master')

@section('main-content')
    <div class="row">
        <div class="col-12">
            <h1>Update Food</h1>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('food.update', $foodItems->id) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="mb-3 row">
                            <label for="food_name" class="col-md-4 col-form-label text-md-end">{{ __('Food Name') }}</label>
                            <div class="col-md-6">
                                <input id="food_name" type="text"
                                    class="form-control @error('food_name') is-invalid @enderror" name="food_name"
                                    value="{{$foodItems->food_name}}" required autocomplete="food_name" autofocus>
                                @error('food_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="food_price" class="col-md-4 col-form-label text-md-end">{{ __('Food Price') }}</label>
                            <div class="col-md-6">
                                <input id="food_price" type="text"
                                    class="form-control @error('food_price') is-invalid @enderror" name="food_price"
                                    value="{{$foodItems->food_price}}" required autocomplete="food_price" autofocus>
                                @error('food_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="food_description" class="col-md-4 col-form-label text-md-end">{{ __('Food Description') }}</label>
                            <div class="col-md-6">
                                <textarea id="food_description" class="form-control @error('food_description') is-invalid @enderror" name="description" required autocomplete="food_description">{{$foodItems->description}}</textarea>
                                @error('food_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Food Image') }}</label>
                            <div class="col-md-6">
                                <img src="{{ asset($foodItems->image) }}" alt="" height="100px" width="auto">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="status" class="col-md-4 col-form-label text-md-end">{{ __('Availability Status') }}</label>
                            <div class="col-md-6">
                                <select name="availability_status" id="status" class="form-control">
                                    <option >Available</option>
                                    <option >Unavailable</option>
                                </select>
                            </div>
                        </div>
                    
                        <div class="mb-3 row">
                            <label for="category" class="col-md-4 col-form-label text-md-end">{{ __('Category') }}</label>
                            <div class="col-md-6">
                                <select name="category_id" id="category" class="form-control">
                                    @foreach($categories as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    <!-- Add options dynamically based on your categories -->
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
