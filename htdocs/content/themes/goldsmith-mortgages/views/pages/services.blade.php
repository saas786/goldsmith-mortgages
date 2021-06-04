@extends('layouts.main')

@section('content')
    <div class="bg-no-repeat bg-cover bg-center w-full h-[90vh] relative" style="background-image: url({{ get_field('banner_1')['url'] }});">
        <div class="absolute inset-0 bg-cape-palliser bg-opacity-25 w-full h-full"></div>
        <div data-aos="fade-down" data-aos-duration="500" data-aos-once="true" class="flex flex-col items-center justify-center absolute inset-0">
            <div class="pattern-3 font-primary text-[50px] xl:text-[65px] leading-[60px] xl:leading-[75px] text-white text-center">{{ get_field('title_1') }}</div>
        </div>
    </div>
    <div class="container px-[15px] mx-auto mt-[-50px] flex h-[100px] relative z-[1]">
        <div data-aos="fade-right" data-aos-duration="500" data-aos-once="true" class="w-[33%] h-full">
            <a class="flex items-center justify-center font-primary text-[13px] xl:text-[18px] text-white text-center bg-mine-shaft w-full h-full transition-all ease-in-out duration-300 hover:text-black hover:bg-cape-palliser" href="{!! $service_array[0]->guid !!}">{{ $service_array[0]->post_title }}</a>
        </div>
        <div data-aos="fade-up" data-aos-duration="500" data-aos-once="true" class="w-[33%] h-full">
            <a class="flex items-center justify-center font-primary text-[13px] xl:text-[18px] text-white text-center bg-dove-gray w-full h-full transition-all ease-in-out duration-300 hover:text-black hover:bg-cape-palliser" href="{!! $service_array[1]->guid !!}">{{ $service_array[1]->post_title }}</a>
        </div>
        <div data-aos="fade-left" data-aos-duration="500" data-aos-once="true" class="w-[33%] h-full">
            <a class="flex items-center justify-center font-primary text-[13px] xl:text-[18px] text-white text-center bg-tundora w-full h-full transition-all ease-in-out duration-300 hover:text-black hover:bg-cape-palliser" href="{!! $service_array[2]->guid !!}">{{ $service_array[2]->post_title }}</a>
        </div>
    </div>
    <div class="container px-[15px] py-[170px] mx-auto">
        <div class="grid grid-cols-2 gap-y-[75px] xl:gap-x-[75px]">
            @while($service->have_posts())
                {{ $service->the_post() }}
                <div data-aos="fade-up" data-aos-duration="500" data-aos-once="true" class="col-span-2 xl:col-span-1 flex flex-col" x-data="{ hover: false }">
                    <a class="block w-full h-[400px] mb-[60px] relative" href="{{ the_permalink() }}" x-on:mouseover="hover = true" x-on:mouseover.away="hover = false" >
                        <div class="absolute inset-0 bg-cape-palliser w-full h-full transition-all ease-in-out duration-300" x-bind:class="hover ? 'bg-opacity-25' : 'bg-opacity-0'"></div>
                        <img class="object-cover object-center w-full h-full" src="{{ get_the_post_thumbnail_url() }}" alt="">
                    </a>
                    <div class="flex-grow flex flex-col justify-between">
                        <div>
                            <div class="font-primary text-cape-palliser text-[24px] pb-[30px]">{{ the_title() }}</div>
                            <div class="font-secondary font-light text-gallery text-[14px] pb-[40px]">{{ the_excerpt() }}</div>
                        </div>
                        <a href="{{ the_permalink() }}" class="self-start font-secondary font-light text-white text-[14px] bg-cape-palliser px-[15px] py-[5px] border-[1px] border-cape-palliser rounded-[30px] mr-[5px] cursor-pointer transition-all ease-in-out duration-300 hover:text-black hover:bg-cape-palliser hover:border-cape-palliser">
                            {{ the_field('label') }}
                        </a>
                    </div>
                </div>
            @endwhile
            @php(wp_reset_postdata())
        </div>
    </div>
    @template('parts.content', 'testimonial')
    @template('parts.content', 'enquiry')
@endsection
