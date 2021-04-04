@extends('layout')

@section('content')
<div class="container-fluid pb-5 single-page">
    <div class="row">
        <div class="col-12 page-header" style="background-image: url('{{ asset('img/bg.jpg') }}')">
            <h2>{{ App::islocale('en') ? $data['name'] : $data['name_ar'] }}</h2>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-12 pt-5">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    @foreach($data['images'] as $img)
                                        <div class="swiper-slide"><img src="{{Storage::url($img)}}"></div>
                                    @endforeach
                                </div>
                                <!-- Add Arrows -->
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                                <!-- Add Pagination -->
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 pt-4">
                            <h4 class="section-title">{{ App::islocale('en') ? 'Address' : 'العنوان' }}</h4>
                            <ul class="details">
                                <li>
                                    <span class="label">{{ App::islocale('en') ? 'Address Details' : 'تفاصيل العنوان' }}:</span>
                                    <span class="value">{{ App::islocale('en') ? $data['address'] : $data['address_ar'] }}</span>
                                </li>
                                <li>
                                    <span class="label">{{ App::islocale('en') ? 'Address Latitude' : 'عنوان خط العرض' }}:</span>
                                    <span class="value">{{ $data['address_latitude']}}</span>
                                </li>
                                <li>
                                    <span class="label">{{ App::islocale('en') ? 'Address Longitude' : 'عنوان خط الطول' }}:</span>
                                    <span class="value">{{ $data['address_longitude']}}</span>
                                </li>
                            </ul>
                            <h4 class="section-title">{{ App::islocale('en') ? 'Contact Details' : 'بيانات المتصل' }}</h4>
                            <ul class="details">
                                <li>
                                    <span class="label">{{ App::islocale('en') ? 'Email' : 'البريد الإلكتروني' }}:</span>
                                    <span class="value"><a href="mailto:{{ $data['email'] }}">{{ $data['email'] }}</a></span>
                                </li>
                                <li>
                                    <span class="label">{{ App::islocale('en') ? 'Phone' : 'رقم الهاتف' }}</span>
                                    <span class="value"><a href="tel:{{ $data['phone'] }}">{{ $data['phone'] }}</a></span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 pt-4">
                            <h4 class="section-title">{{ App::islocale('en') ? 'Delivery' : 'خدمة التوصيل' }}</h4>
                            <span class="delivery-value"><img src="{{ $data['has_delivery'] == 1 ? asset('img/true.png') : asset('img/false.png')}}" alt="">
                            @if(App::islocale('en'))
                                {{ $data['has_delivery'] == 1 ? 'This pharmacy has delivery services.' : 'This pharmacy doesn\'t deliver.' }}
                            @else
                                {{ $data['has_delivery'] == 1 ? 'هذه الصيدلية لديها خدمات التوصيل.' : 'هذه الصيدلية ليس لديها خدمة التوصيل.' }}
                            @endif
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
