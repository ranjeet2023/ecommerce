@include('layout.header')

<div class="untree_co-section before-footer-section">
    <div class="container">
        <div class="row mb-5">
            <form class="col-md-12" method="post">
                <div class="site-blocks-table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="product-thumbnail">Image</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($products) > 0)
                                @foreach ($products as $product)
                                    <tr>
                                        <td class="product-thumbnail">
                                            <img src="{{ asset('images') }}/{{ $product->product_image }}"
                                                alt="Image" class="img-fluid">
                                        </td>
                                        <td class="product-name">
                                            <h2 class="h5 text-black"> {{ $product->name }}</h2>
                                        </td>
                                        <td class="product-price">{{ $product->price }}</td>
                                        <td>
                                            <div href="#" class="btn btn-black remove-from-cart-btn btn-sm"
                                                data-product-id="{{ $product->id }}">X</div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <p>Your cart is empty.</p>
                            @endif
                        </tbody>
                    </table>
                </div>
            </form>
        </div>

        <div class="row">
            <div class="col-md-12 pl-5">
                <div class="row justify-content-end">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-12 float-end">
                                <a href="{{ route('checkout') }}">
                                    <button class="btn btn-black btn-lg py-3 btn-block">Proceed To Checkout</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@include('layout.footer')

<script></script>
