@extends('layouts.main')

@section('content')
    <div class="bg-no-repeat bg-cover bg-center w-full h-[50vh] relative" style="background-image: url({{ get_field('banner_1')['url'] }});">
        <div class="absolute inset-0 bg-cape-palliser bg-opacity-25 w-full h-full"></div>
        <div data-aos="fade-down" data-aos-duration="500" data-aos-once="true" class="flex flex-col items-center justify-center absolute inset-0">
            <div class="pattern-3 font-primary text-[50px] xl:text-[65px] leading-[60px] xl:leading-[75px] text-white text-center">{{ get_field('title_1') }}</div>
        </div>
    </div>
    <div class="container px-[15px] py-[160px] mx-auto">
        <div class="grid grid-cols-2 gap-y-[70px] xl:gap-x-[70px]">
            <div data-aos="fade-right" data-aos-duration="500" data-aos-once="true" class="col-span-2 xl:col-span-1">
                <div class="font-primary text-[24px] text-cape-palliser pb-[40px]">{{ get_field('title_2') }}</div>
                <div class="font-secondary font-light text-[14px] text-white pb-[40px]">{!! get_field('content_2') !!}</div>
                <a href="{{ get_field('page_2') }}" class="self-start font-secondary font-light text-white text-[14px] bg-cape-palliser px-[15px] py-[5px] border-[1px] border-cape-palliser rounded-[30px] mr-[5px] cursor-pointer transition-all ease-in-out duration-300 hover:text-black hover:bg-cape-palliser hover:border-cape-palliser">
                    {{ get_field('label_2') }}
                </a>
            </div>
            <div data-aos="fade-left" data-aos-duration="500" data-aos-once="true" class="col-span-2 xl:col-span-1 flex items-center justify-end">
                <img class="object-cover w-full h-[390px]" src="{{ get_field('image_2')['url'] }}" alt="">
            </div>
        </div>
    </div>
    <div class="bg-mine-shaft">
        <div class="container px-[15px] py-[60px] mx-auto">
            <div data-aos="fade-right" data-aos-duration="500" data-aos-once="true">
                <div class="pattern-1 font-primary text-[30px] text-cape-palliser">{{ get_field('title_3') }}</div>
                <div class="pb-[20px]"></div>
                <div class="font-secondary font-light text-[14px] text-white xl:w-[50%] pb-[50px]">{!! get_field('content_3')  !!}</div>
            </div>
            <div class="grid grid-cols-3">
                @foreach(get_field('products_3') as $product)
                    <div data-aos="fade-left" data-aos-duration="500" data-aos-once="true" class="col-span-3 xl:col-span-1 py-[40px] xl:px-[40px]">
                        <img class="animate-pulse mb-[30px]" src="{{ $product['image']['url'] }}" alt="">
                        <div class="font-primary text-[18px] text-white pb-[20px]">{{ $product['title'] }}</div>
                        <div class="font-secondary text-[12px] text-white">{!! $product['content'] !!}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="container px-[15px] py-[110px] mx-auto">
        <div data-aos="fade-left" data-aos-duration="500" data-aos-once="true" class="flex justify-center">
            <div class="pattern-2 inline-block font-primary text-[30px] text-cape-palliser">{{ get_field('title_4') }}</div>
        </div>
        <div class="grid grid-cols-2">
            @foreach(get_field('products_4') as $product)
                <div data-aos="fade-right" data-aos-duration="500" data-aos-once="true" class="col-span-2 xl:col-span-1 flex flex-col items-center justify-start pt-[120px] pb-[120px]">
                    <img class="mb-0 w-[300px] h-[300px]" src="{{ $product['image']['url'] }}" alt="">
                    <div class="pattern-2 inline-block font-primary text-[24px] text-cape-palliser">{{ $product['name'] }}</div>
                    <div class="pb-[15px]"></div>
                    <div class="font-primary text-[14px] text-cape-palliser pb-[20px]">{{ $product['role'] }}</div>
                    <a class="font-primary text-[14px] text-cape-palliser transition-all ease-in-out duration-300 hover:text-white" href="tel:{{ $product['phone'] }}">{{ $product['phone'] }}</a>
                    <div class="flex">
                        <div class="font-primary text-[14px] text-cape-palliser">{{ get_field('label_4') }}</div>&nbsp;
                        <a class="font-primary text-[14px] text-cape-palliser transition-all ease-in-out duration-300 hover:text-white" href="weixin://dl/chat?{{ $product['wechat_id'] }}">{{ $product['wechat_id'] }}</a>
                    </div>
                    <a class="font-primary text-[14px] text-cape-palliser pb-[40px] transition-all ease-in-out duration-300 hover:text-white" href="mailto:{{ $product['email'] }}">{{ $product['email'] }}</a>
                    <div class="font-secondary font-light text-[14px] text-white text-center w-full xl:w-[70%]">{{ $product['content'] }}</div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
