@extends('layouts.main')

@section('content')
    <div class="bg-no-repeat bg-cover bg-center w-full h-[90vh] relative" style="background-image: url({{ get_field('banner_1')['url'] }});">
        <div class="absolute inset-0 bg-cape-palliser bg-opacity-25 w-full h-full"></div>
        <div data-aos="fade-down" data-aos-duration="500" data-aos-once="true" class="flex flex-col items-center justify-center absolute inset-0">
            <div class="font-primary text-[45px] text-white text-center">{{ get_field('title_1') }}</div>
            <div class="pattern-3 font-primary text-[50px] xl:text-[65px] leading-[60px] xl:leading-[75px] text-white text-center">{{ get_field('subtitle_1') }}</div>
        </div>
    </div>
    <div class="container px-[15px] mx-auto mt-[-125px] flex relative z-[1]">
        <div data-aos="fade-right" data-aos-duration="500" data-aos-once="true" class="w-[33%] p-[30px] xl:py-[40px] xl:px-[40px] bg-mine-shaft">
            <img class="animate-spin-custom mb-[30px]" src="{{ get_field('products_2')[0]['image']['url'] }}" alt="">
            <div class="font-primary text-[18px] text-white pb-[20px]">{{ get_field('products_2')[0]['title'] }}</div>
            <div class="font-secondary text-[12px] text-white">{!! get_field('products_2')[0]['content'] !!}</div>
        </div>
        <div data-aos="fade-up" data-aos-duration="500" data-aos-once="true" class="w-[33%] p-[30px] xl:py-[40px] xl:px-[40px] bg-dove-gray">
            <img class="animate-spin-custom mb-[30px]" src="{{ get_field('products_2')[1]['image']['url'] }}" alt="">
            <div class="font-primary text-[18px] text-white pb-[20px]">{{ get_field('products_2')[1]['title'] }}</div>
            <div class="font-secondary text-[12px] text-white">{!! get_field('products_2')[1]['content'] !!}</div>
        </div>
        <div data-aos="fade-left" data-aos-duration="500" data-aos-once="true" class="w-[33%] p-[30px] xl:py-[40px] xl:px-[40px] bg-tundora">
            <img class="animate-spin-custom mb-[30px]" src="{{ get_field('products_2')[2]['image']['url'] }}" alt="">
            <div class="font-primary text-[18px] text-white pb-[20px]">{{ get_field('products_2')[2]['title'] }}</div>
            <div class="font-secondary text-[12px] text-white">{!! get_field('products_2')[2]['content'] !!}</div>
        </div>
    </div>
    <div class="container px-[15px] py-[170px] mx-auto">
        <div class="grid grid-cols-2 gap-y-[70px] xl:gap-x-[70px]">
            <div data-aos="fade-right" data-aos-duration="500" data-aos-once="true"  class="col-span-2 xl:col-span-1">
                <div class="font-primary text-[24px] text-cape-palliser pb-[40px]">{{ get_field('title_2') }}</div>
                <div class="font-secondary font-light text-[14px] text-white pb-[40px]">{!! get_field('content_2') !!}</div>
            </div>
            <div data-aos="fade-left" data-aos-duration="500" data-aos-once="true" class="col-span-2 xl:col-span-1 flex items-center justify-end">
                <img class="object-cover w-full h-[390px]" src="{{ get_field('image_2')['url'] }}" alt="">
            </div>
        </div>
    </div>
    <div class="px-[15px] xl:px-0 mx-auto bg-mine-shaft">
        <div class="grid grid-cols-2">
            <div data-aos="fade-right" data-aos-duration="500" data-aos-once="true" class="col-span-2 xl:col-span-1">
                <img class="object-cover object-center w-full h-full" src="{{ get_field('image_3')['url'] }}" alt="">
            </div>
            <div data-aos="fade-left" data-aos-duration="500" data-aos-once="true" class="col-span-2 xl:col-span-1 py-[60px] xl:px-[120px]">
                <div class="pattern-1 inline-block font-primary text-[30px] text-cape-palliser">{{ get_field('title_3') }}</div>
                <div class="pb-[20px]"></div>
                <div class="font-secondary font-light text-[14px] text-white">{!! get_field('content_3') !!}</div>
                <div class="grid grid-cols-2 gap-y-[70px] gap-x-[30px] xl:gap-x-[70px] py-[70px]">
                    @foreach(get_field('products_3a') as $product)
                        <div>
                            <img class="animate-pulse mb-[30px]" src="{{ $product['image']['url'] }}" alt="">
                            <div class="font-primary text-[18px] text-white pb-[20px]">{{ $product['title'] }}</div>
                            <div class="font-secondary text-[12px] text-white">{!! $product['content'] !!}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="container px-[15px] py-[180px] mx-auto">
        <div class="grid grid-cols-3 gap-y-[80px] gap-x-[80px]">
            @foreach(get_field('products_3b') as $product)
                <div data-aos="fade-right" data-aos-duration="500" data-aos-once="true" class="col-span-3 xl:col-span-1">
                    <div class="font-primary text-[24px] text-cape-palliser pb-[40px]">{{ $product['title'] }}</div>
                    <div class="font-secondary text-[14px] text-white">{!! $product['content']  !!}</div>
                </div>
            @endforeach
        </div>
    </div>
    @template('parts.content', 'testimonial')
    @template('parts.content', 'enquiry')
@endsection
