@extends('layout')

@section('content')
<div class="container py-5 full-body">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 sidebar ">
            <div class="widget">
                <h4>{{ App::islocale('en') ? 'Delivery' : 'خدمة التوصيل' }}</h4>
                <ul id="filters">
                    <li><a href="#" class="current" data-filter="*">{{ App::islocale('en') ? 'All' : 'عرض الكل' }}</a></li>
                    <li><a href="#" data-filter=".delivery-on">{{ App::islocale('en') ? 'Has Delivery' : 'يوجد خدمة التوصيل' }}</a></li>
                    <li><a href="#" data-filter=".delivery-off">{{ App::islocale('en') ? 'No Delivery' : 'لا توجد خدمة توصيل' }}</a></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9">
            <ul id="filters" class="mobile">
                <li><a href="#" class="current" data-filter="*">{{ App::islocale('en') ? 'All' : 'عرض الكل' }}</a></li>
                <li><a href="#" data-filter=".delivery-on">{{ App::islocale('en') ? 'Has Delivery' : 'يوجد خدمة التوصيل' }}</a></li>
                <li><a href="#" data-filter=".delivery-off">{{ App::islocale('en') ? 'No Delivery' : 'لا توجد خدمة توصيل' }}</a></li>
            </ul>
            <div class="row grid">
                @foreach($data as $ph)
                    @foreach($ph as $p)
                        <div class="col sm-12 col-md-12 col-lg-6 col-xl-6 pharm-item pb-4 {{$p->has_delivery == 1 ? 'delivery-on' : 'delivery-off'}}">
                            <div class="box">
                                <figure>
                                    <img src="{{ Storage::url($p->logo) }}" alt="">
                                </figure>
                                <h3>{{ App::isLocale('en') ? $p->name : $p->name_ar }}</h3>
                                <p> {{ App::isLocale('en') ? $p->address : $p->address_ar }}</p>
                                <a href="{{ route('single-pharmacy', $p->slug) }}" class="btn btn-dark">{{ App::islocale('en') ? 'Know More' : 'تعرف أكثر' }}</a>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
