<section class="section-sm">
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card border-0 rounded-0 text-center shadow-none overflow-hidden">
                    <a href="{{ url('products/' . $product['id']) }}">
                        <span class="badge badge-primary">NEW</span>
                        <img src="{{ asset($product['img_thumbnail']) }}" alt="" class="card-img-top rounded-0">
                        <div class="card-body">
                            <h4 class="text-uppercase mb-3">{{ $product['name'] }}</h4>
                            <p class="h4 text-muted font-weight-light mb-3" href="{{ url('products/' . $product['id']) }}"></p>
                            <a href="{{ url('cart/add') }}?quantity=1&productID={{ $product['id'] }}" 
                                class="btn btn-primary">Thêm vào giỏ hàng</a>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>