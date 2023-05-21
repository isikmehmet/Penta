@include('Front.Layout.header')

    <!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>{{ $urun->name }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->


    <!-- ***** Product Area Starts ***** -->
    <section class="section" id="product">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="left-images">
                        <img src="{{ url($urun->mainPic) }}" alt="{{ $urun->name }}">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="right-content">
                        <h4>{{ $urun->name }}</h4>
                        <span class="price">₺ {{ number_format($urun->price, 2, '.', ',') }}</span>
                        @if($urun->rate > 0)
                            <ul class="stars">
                                @for($i = 1; $i <= (int) $urun->rate; $i++)
                                    <li><i class="fa fa-star"></i></li>
                                @endfor
                            </ul>
                        @endif

                        {!! $urun->description !!}

                        <div class="quantity-content">
                            <div class="left-content">
                                <h6>Adet</h6>
                            </div>
                            <div class="right-content">
                                <div class="quantity buttons_added">
                                    <input type="button" value="-" class="minus"><input type="number" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode=""><input type="button" value="+" class="plus">
                                </div>
                            </div>
                        </div>
                        <div class="total">
                            <h4>Toplam: ₺ {{ number_format($urun->price, 2, '.', ',') }}</h4>
                            <div class="main-border-button"><a href="#">Sepete Ekle</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Product Area Ends ***** -->

@include('Front.Layout.footer')
