@include('Front.Layout.header')

    <section class="section" id="men">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2 class="mt-4">Ürün Listesi</h2>
                        <span>En az üç ürün listelenecek</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="men-item-carousel">
                        <div class="owl-men-item owl-carousel">
                            @if(isset($results) && !@empty($results))
                                @foreach ($results as $result)
                                    <div class="item">
                                        <div class="thumb">
                                            <div class="hover-content">
                                                <ul>
                                                    <li><a href="{{ route('UrunDetay', $result->id) }}"><i class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                            <img src="{{ url($result->mainPic) }}" alt="">
                                        </div>
                                        <div class="down-content">
                                            <h4>{{ $result->name }}</h4>
                                            <span>₺ {{ number_format($result->price, 2, '.', ',') }}</span>
                                            @if($result->rate > 0)
                                                <ul class="stars">
                                                    @for($i = 1; $i <= (int) $result->rate; $i++)
                                                        <li><i class="fa fa-star"></i></li>
                                                    @endfor
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@include('Front.Layout.footer')
