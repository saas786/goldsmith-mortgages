<div class="bg-mine-shaft">
    <div class="container px-[15px] py-[60px] mx-auto">
        <div class="flex justify-center pb-[60px]">
            <div class="inline-block pattern-2 font-primary text-cape-palliser text-[30px]">{{ get_field('testimonial_title', 'option') }}</div>
            <div class="pb-[50px]"></div>
        </div>
        <div class="swiper-one swiper-container">
            <div class="swiper-wrapper">
                @foreach(get_field('testimonial_clients', 'option') as $testimonial)
                    <div class="swiper-slide">
                        <div class="flex flex-col items-center justify-start">
                            <img class="pb-[50px]" src="{{ $testimonial['image']['url'] }}" alt="">
                            <div class="font-secondary font-light text-[18px] text-white text-center pb-[30px]">{{ $testimonial['content'] }}</div>
                            <div class="font-primary text-[16px] text-cape-palliser pb-[60px]">{{ $testimonial['name'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next absolute top-[15%] right-0"></div>
            <div class="swiper-button-prev absolute top-[15%] left-0"></div>
            <div class="swiper-custom-pagination"></div>
        </div>
    </div>
</div>

