<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav"
                aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main_nav">
            <ul class="navbar-nav">
            @foreach($categories as $key => $category)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown07"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $category->category_name }}</a>
                    @if($category->products->count()!=0)
                    <div class="dropdown-menu" aria-labelledby="dropdown07">
                       @foreach($category->products as $key => $product)
                        <a class="dropdown-item" href="#">{{ $product->product_name}}</a>
                        @endforeach
                    </div>
                    @endif
                </li>
               @endforeach
            </ul>
        </div>
    </div>
</nav>