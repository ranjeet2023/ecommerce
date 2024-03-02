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
                                <th class="product-checkout">Checkout</th>
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
                                        <td>
                                            <a href="{{ route('checkout', ['id' => $product->id]) }}"
                                                class="btn btn-outline">Checkout</a>
                                            Proceed To Checkout
                                            </a>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5">
                                        <p>Your cart is empty.</p>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>

@include('layout.footer')

<script></script>
