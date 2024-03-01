@include('layout.header')
<div class="untree_co-section product-section before-footer-section">
    <div class="container">
        <div class="row">

            <!-- Start Column 1 -->
            @foreach ($data as $product)
                <div class="col-12 col-md-4 col-lg-3 mb-5">
                    <div class="product-item">
                        <img src="{{ asset('images') }}/{{ $product->product_image }}"
                            class="img-fluid product-thumbnail">
                        <h3 class="product-title">{{ $product->name }}</h3>
                        <strong class="product-price">${{ $product->price }}</strong>
                        <br>
                        <button type="button" class="btn btn-outline-primary add-to-cart-btn"
                            data-product-id="{{ $product->id }}">Add To
                            Cart<i class="fa fa-shopping-cart"></i></button>
                    </div>
                </div>
            @endforeach
            <!-- End Column 1 -->
        </div>
    </div>
</div>
@include('layout.footer')
