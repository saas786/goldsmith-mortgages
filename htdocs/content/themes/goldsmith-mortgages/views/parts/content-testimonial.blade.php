<div>
    <div>{{ get_field('testimonial_title', 'option') }}</div>
    <div class="swiper-one swiper-container">
        <div class="swiper-wrapper">
            @foreach(get_field('testimonial_clients', 'option') as $testimonial)
                <div class="swiper-slide">
                    <div>{{ $testimonial['image']['url'] }}</div>
                    <div>{{ $testimonial['content'] }}</div>
                    <div>{{ $testimonial['name'] }}</div>
                </div>
            @endforeach
        </div>
        <div class="swiper-custom-next"></div>
        <div class="swiper-custom-prev"></div>
        <div class="swiper-custom-pagination"></div>
    </div>
</div>
