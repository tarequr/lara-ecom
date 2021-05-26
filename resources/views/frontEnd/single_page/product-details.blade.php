@extends('frontEnd.master')

@section('content')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index-2.html"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Product</li>
            </ol>
        </div>
    </nav>

    <div class="container">
        <div class="product-single-container product-single-default">
            <div class="row">
                <div class="col-md-5 product-single-gallery">
                    <div class="product-slider-container">
                        <div class="product-single-carousel owl-carousel owl-theme">
                            <div class="product-item">
                                <img class="product-single-image" src="{{ asset('public/upload/product_images/'.$product->image) }}" data-zoom-image="{{ asset('public/upload/product_images/'.$product->image) }}"/>
                            </div>
                            <div class="product-item">
                                <img class="product-single-image" src="{{ asset('public/upload/product_images/'.$product->image) }}" data-zoom-image="{{ asset('public/upload/product_images/'.$product->image) }}"/>
                            </div>
                            <div class="product-item">
                                <img class="product-single-image" src="{{ asset('public/upload/product_images/'.$product->image) }}" data-zoom-image="{{ asset('public/upload/product_images/'.$product->image) }}"/>
                            </div>
                            <div class="product-item">
                                <img class="product-single-image" src="{{ asset('public/upload/product_images/'.$product->image) }}" data-zoom-image="{{ asset('public/upload/product_images/'.$product->image) }}"/>
                            </div>
                        </div>
                        <!-- End .product-single-carousel -->
                        <span class="prod-full-screen">
                            <i class="icon-plus"></i>
                        </span>
                    </div>
                    <div class="prod-thumbnail owl-dots" id='carousel-custom-dots'>
                        <div class="owl-dot">
                            <img src="{{ asset('public/upload/product_images/'.$product->image) }}"/>
                        </div>
                        <div class="owl-dot">
                            <img src="{{ asset('public/upload/product_images/'.$product->image) }}"/>
                        </div>
                        <div class="owl-dot">
                            <img src="{{ asset('public/upload/product_images/'.$product->image) }}"/>
                        </div>
                        <div class="owl-dot">
                            <img src="{{ asset('public/upload/product_images/'.$product->image) }}"/>
                        </div>
                    </div>
                </div><!-- End .product-single-gallery -->

                <div class="col-md-7 product-single-details">
                    <h1 class="product-title">{{ $product->name }}</h1>

                    <div class="ratings-container">
                        <div class="product-ratings">
                            @if($product->productRatings->avg('rating'))
                                @if($product->productRatings->avg('rating') <= 1 || $product->productRatings->avg('rating')  <= 1.5)
                                <span class="ratings" style="width:20%"></span>
                                @elseif($product->productRatings->avg('rating')  <= 2 || $product->productRatings->avg('rating')  <= 2.5)
                                <span class="ratings" style="width:40%"></span>
                                @elseif($product->productRatings->avg('rating')  <= 3 || $product->productRatings->avg('rating')  <= 3.5)
                                <span class="ratings" style="width:60%"></span>
                                @elseif($product->productRatings->avg('rating')  <= 4 || $product->productRatings->avg('rating')  <= 4.5)
                                <span class="ratings" style="width:80%"></span>
                                @elseif($product->productRatings->avg('rating')  == 5)
                                <span class="ratings" style="width:100%"></span>
                                @endif
                            @else
                            <span class="ratings" style="width:0%"></span>
                            @endif
                        </div><!-- End .product-ratings -->

                        <a href="#" class="rating-link">( {{ $product->productRatings->count() }} Reviews )</a>
                    </div><!-- End .ratings-container -->

                    <hr class="short-divider">

                    <div class="price-box">
                        <span class="product-price">TK. {{ $product->price }} </span>
                    </div><!-- End .price-box -->

                    <div class="product-desc">
                        <p>{!! $product->shortDescription !!}</p>
                    </div><!-- End .product-desc -->


                    <hr class="divider">

                    <div class="product-action">
                        <form action="{{ route('insert.cart') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$product->id}}">
                            <div class="product-single-qty">
                                <input class="horizontal-quantity form-control" type="text" name="qty">
                            </div><!-- End .product-single-qty -->

                            <input type="submit" class="btn btn-dark add-cart icon-shopping-cart" title="Add to Cart" value="Add to Cart">
                        </form>
                    </div><!-- End .product-action -->
                    <div class="text-center">
                        @if(Session::get('success'))
                          <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>{{ Session::get('success')}}</strong>
                          </div>
                        @endif
                        @if(Session::get('error'))
                          <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>{{ Session::get('error')}}</strong>
                          </div>
                        @endif
                    </div>
                    <hr class="divider mb-1">

                    <div class="product-single-share">
                        <label class="sr-only">Share:</label>

                        <div class="social-icons mr-2">
                            <a href="#" class="social-icon social-facebook icon-facebook" target="_blank" title="Facebook"></a>
                            <a href="#" class="social-icon social-twitter icon-twitter" target="_blank" title="Twitter"></a>
                            <a href="#" class="social-icon social-linkedin fab fa-linkedin-in" target="_blank" title="Linkedin"></a>
                            <a href="#" class="social-icon social-gplus fab fa-google-plus-g" target="_blank" title="Google +"></a>
                            <a href="#" class="social-icon social-mail icon-mail-alt" target="_blank" title="Mail"></a>
                        </div><!-- End .social-icons -->
                        <form action="{{ route('add.wishlist',$product->id) }}" method="POST">
                            @csrf
                        <button class="add-wishlist" title="Add to Wishlist">Add to Wishlist</button>
                        </form>
                    </div><!-- End .product single-share -->
                </div><!-- End .product-single-details -->
            </div><!-- End .row -->
        </div><!-- End .product-single-container -->

        <div class="product-single-tabs">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content" role="tab" aria-controls="product-desc-content" aria-selected="true">Description</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="product-tab-more-info" data-toggle="tab" href="#product-more-info-content" role="tab" aria-controls="product-more-info-content" aria-selected="false">More Info</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="product-tab-tags" data-toggle="tab" href="#product-tags-content" role="tab" aria-controls="product-tags-content" aria-selected="false">Tags</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="product-tab-reviews" data-toggle="tab" href="#product-reviews-content" role="tab" aria-controls="product-reviews-content" aria-selected="false">Reviews ({{ $product->productRatings->count() }})</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel" aria-labelledby="product-tab-desc">
                    <div class="product-desc-content">
                        <p>{!! $product->longDescription !!}</p>
                    </div><!-- End .product-desc-content -->
                </div><!-- End .tab-pane -->

                <div class="tab-pane fade fade" id="product-more-info-content" role="tabpanel" aria-labelledby="product-tab-more-info">
                    <div class="product-desc-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.</p>
                    </div><!-- End .product-desc-content -->
                </div><!-- End .tab-pane -->

                <div class="tab-pane fade" id="product-tags-content" role="tabpanel" aria-labelledby="product-tab-tags">
                    <div class="product-tags-content">
                        <form action="#">
                            <h4>Add Your Tags:</h4>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" required>
                                <input type="submit" class="btn btn-dark" value="Add Tags">
                            </div><!-- End .form-group -->
                        </form>
                        <p class="note">Use spaces to separate tags. Use single quotes (') for phrases.</p>
                    </div><!-- End .product-tags-content -->
                </div><!-- End .tab-pane -->

                <div class="tab-pane fade" id="product-reviews-content" role="tabpanel" aria-labelledby="product-tab-reviews">
                    <div class="product-reviews-content">
                        <div class="row">
                            <div class="col-xl-7">
                                <h2 class="reviews-title">{{ $product->productRatings->count() }} reviews for Product Long Name</h2>

                                <ol class="comment-list">
                                    @foreach($product->productRatings as $productRating)
                                    <li class="comment-container">
                                        <div class="comment-avatar">
                                            <img src="{{(!empty($productRating->user->image))?url('public/upload/user_images/'.$productRating->user->image):url('public/upload/no-image.png')}}" width="65" height="65" alt="avatar"/>
                                        </div><!-- End .comment-avatar-->

                                        <div class="comment-box">
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    @if($productRating->rating == 1)
                                                    <span class="ratings" style="width:20%"></span>
                                                    @elseif($productRating->rating == 2)
                                                    <span class="ratings" style="width:40%"></span>
                                                    @elseif($productRating->rating == 3)
                                                    <span class="ratings" style="width:60%"></span>
                                                    @elseif($productRating->rating == 4)
                                                    <span class="ratings" style="width:80%"></span>
                                                    @elseif($productRating->rating == 5)
                                                    <span class="ratings" style="width:100%"></span>
                                                    @endif
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .ratings-container -->

                                            <div class="comment-info mb-1">
                                                <h4 class="avatar-name">{{ $productRating->user->name }}</h4> - <span class="comment-date">{{ date('M-d, Y',strtotime($productRating->created_at)) }}</span>
                                            </div><!-- End .comment-info -->

                                            <div class="comment-text">
                                                <p>{{ $productRating->comment }}</p>
                                            </div><!-- End .comment-text -->
                                        </div><!-- End .comment-box -->
                                    </li><!-- comment-container -->
                                    @endforeach
                                </ol><!-- End .comment-list -->
                            </div>

                            <div class="col-xl-5">
                                <div class="add-product-review">

                                    @guest
                                        <h3>Please login first.  <a href="{{ route('customer.login') }}" class="btn btn-primary">Login</a></h3>
                                    @else
                                    <form method="POST" action="{{ route('product.rating.store',$product->id) }}" class="comment-form m-0">
                                        @csrf

                                        <h3 class="review-title">Add a Review</h3>
                                        @if(Session::get('message'))
                                          <div class="alert alert-success alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <strong>{{ Session::get('message')}}</strong>
                                          </div>
                                        @endif
                                        <div class="rating-form">
                                            <label for="rating">Your rating</label>
                                            <span class="rating-stars">
                                                <a class="star-1" href="#" name="rating">1</a>
                                                <a class="star-2" href="#" name="rating">2</a>
                                                <a class="star-3" href="#" name="rating">3</a>
                                                <a class="star-4" href="#" name="rating">4</a>
                                                <a class="star-5" href="#" name="rating">5</a>
                                            </span>

                                            <select name="rating" id="rating" required=""  style="display: none;">
                                                <option value="">Rate…</option>
                                                <option value="5">Perfect</option>
                                                <option value="4">Good</option>
                                                <option value="3">Average</option>
                                                <option value="2">Not that bad</option>
                                                <option value="1">Very poor</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Your Review</label>
                                            <textarea cols="5" rows="6" class="form-control form-control-sm" name="comment"></textarea>
                                            <strong class="text-danger"> {{$errors->has('comment') ? $errors->first('comment') : '' }} </strong>
                                        </div><!-- End .form-group -->
                                        <button class="btn btn-dark ls-n-15">Submit</button>
                                    </form>
                                    @endguest
                                </div><!-- End .add-product-review -->
                            </div>
                        </div>
                    </div><!-- End .product-reviews-content -->
                </div><!-- End .tab-pane -->
            </div><!-- End .tab-content -->
        </div><!-- End .product-single-tabs -->

        <div class="products-section pt-0">
            <h2 class="section-title">Related Products</h2>

            <div class="products-slider owl-carousel owl-theme dots-top">
                <div class="product-default inner-quickview inner-icon">
                    <figure>
                        <a href="product.html">
                            <img src="{{ asset('public/frontEnd')}}/assets/images/products/product-14.jpg">
                        </a>
                        <div class="label-group">
                            <span class="product-label label-sale">-20%</span>
                        </div>
                        <div class="btn-icon-group">
                            <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-shopping-cart"></i></button>
                        </div>
                        <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a> 
                    </figure>
                    <div class="product-details">
                        <div class="category-wrap">
                            <div class="category-list">
                                <a href="category.html" class="product-category">category</a>
                            </div>
                        </div>
                        <h3 class="product-title">
                            <a href="product.html">Product Short Name</a>
                        </h3>
                        <div class="ratings-container">
                            <div class="product-ratings">
                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                <span class="tooltiptext tooltip-top"></span>
                            </div><!-- End .product-ratings -->
                        </div><!-- End .ratings-container -->
                        <div class="price-box">
                            <span class="old-price">$59.00</span>
                            <span class="product-price">$49.00</span>
                        </div><!-- End .price-box -->
                    </div><!-- End .product-details -->
                </div>
                <div class="product-default inner-quickview inner-icon">
                    <figure>
                        <a href="product.html">
                            <img src="{{ asset('public/frontEnd')}}/assets/images/products/product-13.jpg">
                        </a>
                        <div class="btn-icon-group">
                            <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-shopping-cart"></i></button>
                        </div>
                        <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a> 
                    </figure>
                    <div class="product-details">
                        <div class="category-wrap">
                            <div class="category-list">
                                <a href="category.html" class="product-category">category</a>
                            </div>
                        </div>
                        <h3 class="product-title">
                            <a href="product.html">Product Short Name</a>
                        </h3>
                        <div class="ratings-container">
                            <div class="product-ratings">
                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                <span class="tooltiptext tooltip-top"></span>
                            </div><!-- End .product-ratings -->
                        </div><!-- End .ratings-container -->
                        <div class="price-box">
                            <span class="old-price">$59.00</span>
                            <span class="product-price">$49.00</span>
                        </div><!-- End .price-box -->
                    </div><!-- End .product-details -->
                </div>
                <div class="product-default inner-quickview inner-icon">
                    <figure>
                        <a href="product.html">
                            <img src="{{ asset('public/frontEnd')}}/assets/images/products/product-12.jpg">
                        </a>
                        <div class="btn-icon-group">
                            <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-shopping-cart"></i></button>
                        </div>
                        <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a> 
                    </figure>
                    <div class="product-details">
                        <div class="category-wrap">
                            <div class="category-list">
                                <a href="category.html" class="product-category">category</a>
                            </div>
                        </div>
                        <h3 class="product-title">
                            <a href="product.html">Product Short Name</a>
                        </h3>
                        <div class="ratings-container">
                            <div class="product-ratings">
                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                <span class="tooltiptext tooltip-top"></span>
                            </div><!-- End .product-ratings -->
                        </div><!-- End .ratings-container -->
                        <div class="price-box">
                            <span class="old-price">$59.00</span>
                            <span class="product-price">$49.00</span>
                        </div><!-- End .price-box -->
                    </div><!-- End .product-details -->
                </div>
                <div class="product-default inner-quickview inner-icon">
                    <figure>
                        <a href="product.html">
                            <img src="{{ asset('public/frontEnd')}}/assets/images/products/product-11.jpg">
                        </a>
                        <div class="label-group">
                            <span class="product-label label-hot">HOT</span>
                        </div>
                        <div class="btn-icon-group">
                            <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-shopping-cart"></i></button>
                        </div>
                        <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a> 
                    </figure>
                    <div class="product-details">
                        <div class="category-wrap">
                            <div class="category-list">
                                <a href="category.html" class="product-category">category</a>
                            </div>
                        </div>
                        <h3 class="product-title">
                            <a href="product.html">Product Short Name</a>
                        </h3>
                        <div class="ratings-container">
                            <div class="product-ratings">
                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                <span class="tooltiptext tooltip-top"></span>
                            </div><!-- End .product-ratings -->
                        </div><!-- End .ratings-container -->
                        <div class="price-box">
                            <span class="old-price">$59.00</span>
                            <span class="product-price">$49.00</span>
                        </div><!-- End .price-box -->
                    </div><!-- End .product-details -->
                </div>
                <div class="product-default inner-quickview inner-icon">
                    <figure>
                        <a href="product.html">
                            <img src="{{ asset('public/frontEnd')}}/assets/images/products/product-10.jpg">
                        </a>
                        <div class="label-group">
                            <span class="product-label label-hot">HOT</span>
                        </div>
                        <div class="btn-icon-group">
                            <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-shopping-cart"></i></button>
                        </div>
                        <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a> 
                    </figure>
                    <div class="product-details">
                        <div class="category-wrap">
                            <div class="category-list">
                                <a href="category.html" class="product-category">category</a>
                            </div>
                        </div>
                        <h3 class="product-title">
                            <a href="product.html">Product Short Name</a>
                        </h3>
                        <div class="ratings-container">
                            <div class="product-ratings">
                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                <span class="tooltiptext tooltip-top"></span>
                            </div><!-- End .product-ratings -->
                        </div><!-- End .ratings-container -->
                        <div class="price-box">
                            <span class="old-price">$59.00</span>
                            <span class="product-price">$49.00</span>
                        </div><!-- End .price-box -->
                    </div><!-- End .product-details -->
                </div>
                <div class="product-default inner-quickview inner-icon">
                    <figure>
                        <a href="product.html">
                            <img src="{{ asset('public/frontEnd')}}/assets/images/products/product-9.jpg">
                        </a>
                        <div class="label-group">
                            <span class="product-label label-sale">-30%</span>
                        </div>
                        <div class="btn-icon-group">
                            <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-shopping-cart"></i></button>
                        </div>
                        <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a> 
                    </figure>
                    <div class="product-details">
                        <div class="category-wrap">
                            <div class="category-list">
                                <a href="category.html" class="product-category">category</a>
                            </div>
                        </div>
                        <h3 class="product-title">
                            <a href="product.html">Product Short Name</a>
                        </h3>
                        <div class="ratings-container">
                            <div class="product-ratings">
                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                <span class="tooltiptext tooltip-top"></span>
                            </div><!-- End .product-ratings -->
                        </div><!-- End .ratings-container -->
                        <div class="price-box">
                            <span class="old-price">$59.00</span>
                            <span class="product-price">$49.00</span>
                        </div><!-- End .price-box -->
                    </div><!-- End .product-details -->
                </div>
                <div class="product-default inner-quickview inner-icon">
                    <figure>
                        <a href="product.html">
                            <img src="{{ asset('public/frontEnd')}}/assets/images/products/product-8.jpg">
                        </a>
                        <div class="label-group">
                            <span class="product-label label-sale">-20%</span>
                        </div>
                        <div class="btn-icon-group">
                            <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-shopping-cart"></i></button>
                        </div>
                        <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a> 
                    </figure>
                    <div class="product-details">
                        <div class="category-wrap">
                            <div class="category-list">
                                <a href="category.html" class="product-category">category</a>
                            </div>
                        </div>
                        <h3 class="product-title">
                            <a href="product.html">Product Short Name</a>
                        </h3>
                        <div class="ratings-container">
                            <div class="product-ratings">
                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                <span class="tooltiptext tooltip-top"></span>
                            </div><!-- End .product-ratings -->
                        </div><!-- End .ratings-container -->
                        <div class="price-box">
                            <span class="old-price">$59.00</span>
                            <span class="product-price">$49.00</span>
                        </div><!-- End .price-box -->
                    </div><!-- End .product-details -->
                </div>
            </div><!-- End .products-slider -->
        </div><!-- End .products-section -->
    </div><!-- End .container -->
</main><!-- End .main -->
@endsection