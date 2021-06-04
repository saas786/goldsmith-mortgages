@extends('layouts.main')

@section('content')
    <div class="bg-no-repeat bg-cover bg-center w-full h-[90vh] relative" style="background-image: url({{ get_field('banner_1')['url'] }});">
        <div class="absolute inset-0 bg-cape-palliser bg-opacity-25 w-full h-full"></div>
        <div data-aos="fade-down" data-aos-duration="500" data-aos-once="true" class="flex flex-col items-center justify-center absolute inset-0">
            <div class="pattern-3 font-primary text-[50px] xl:text-[65px] leading-[60px] xl:leading-[75px] text-white text-center">{{ get_field('title_1') }}</div>
        </div>
    </div>
    <div class="container px-[15px] pt-[150px] mx-auto">
        <div class="grid grid-cols-2">
            <div data-aos="fade-right" data-aos-duration="500" data-aos-once="true" class="col-span-2 xl:col-span-1">
                <div class="pattern-1 font-primary text-[30px] text-cape-palliser">{{ get_field('title_2') }}</div>
                <div class="pb-[60px]"></div>
                <div class="flex pb-[30px]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-[20px] min-w-[20px] mr-[30px]" viewBox="0 0 20 20" fill="#ffffff" stroke="#1A1A1A">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                    </svg>
                    <div class="font-secondary font-light text-[16px] leading-[26px] text-white mt-[-5px]">{!! get_field('company_address', 'option')  !!}</div>
                </div>
                <div class="flex pb-[30px]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-[20px] min-w-[20px] mr-[30px]" viewBox="0 0 20 20" fill="#ffffff" stroke="#1A1A1A">
                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                    </svg>
                    <a class="font-secondary font-light text-[16px] leading-[26px] text-white mt-[-5px]" href="tel:{{ get_field('company_phone', 'option') }}">{!! get_field('company_phone', 'option') !!}</a>
                </div>
                <div class="flex pb-[60px]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-[20px] min-w-[20px] mr-[30px]" viewBox="0 0 20 20" fill="#ffffff" stroke="#1A1A1A">
                        <path fill-rule="evenodd" d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2l-1 2H8l-1-2H5V5z" clip-rule="evenodd"/>
                    </svg>
                    <a class="font-secondary font-light text-[16px] leading-[26px] text-white mt-[-5px]" href="mailto:{{ get_field('company_email', 'option') }}">{!! get_field('company_email', 'option') !!}</a>
                </div>
                <div class="flex pb-[30px]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-[20px] min-w-[20px] mr-[30px]" viewBox="0 0 24 24" fill="#ffffff" stroke="#1A1A1A">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <div class="font-secondary font-light text-[16px] leading-[26px] text-white mt-[-5px]">{!! get_field('company_hours_extended', 'option') !!}</div>
                </div>
            </div>
            <div class="col-span-2 xl:col-span-1 flex items-end justify-end">
                <div id="map" class="w-full h-[420px] bg-cape-palliser"></div>
            </div>
        </div>
    </div>
    @template('parts.content', 'enquiry')
@endsection
