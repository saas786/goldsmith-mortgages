<div class="fixed bottom-[0] right-[0]">
    <div class="flex items-center justify-end w-full p-[15px]">
        <div id="scroll-to-top-button" class="inline-block text-white bg-cape-palliser rounded-full shadow-xl p-[15px] cursor-pointer transition-all ease-in-out duration-300 opacity-0 hover:text-cod-gray">
            <svg class="w-[40px] h-[40px] " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
            </svg>
        </div>
    </div>
</div>
<div class="bg-mine-shaft">
    <div class="grid grid-cols-12 gap-y-[70px] xl:gap-x-[70px] py-[70px] px-[15px] xl:px-[260px]">
        <div class="col-span-12 xl:col-span-4">
            <img class="pb-[30px]" src="{{ get_field('footer_logo', 'option')['url'] }}" alt="">
            <div class="font-secondary font-light text-[14px] text-white">
                {!!  get_field('footer_content', 'option') !!}
            </div>
        </div>
        <div class="col-span-6 xl:col-span-2 flex">
            <div>
                <div class="pattern-1 font-primary text-[18px] text-cape-palliser">{{ get_field('footer_title_1', 'option') }}</div>
                <div class="pb-[30px]"></div>
                @foreach($menus as $menu)
                    <div class="flex items-center mb-[15px]" x-data="{ hover : false }" x-on:mouseover="hover = true" x-on:mouseover.away="hover = false">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-[15px] min-w-[15px] mr-[10px] transition-all ease-in-out duration-300" fill="none" viewBox="0 0 24 24" x-bind:stroke="hover ? '#A07D3F' : '#FFFFFF'">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                        <a class="font-secondary font-light text-[14px] text-white transition-all ease-in-out duration-300" x-bind:class="hover ? 'text-cape-palliser' : 'text-white'" href="{{ $menu->url }}">{{ $menu->title }}</a>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-span-6 xl:col-span-2 flex">
            <div>
                <div class="pattern-1 font-primary text-[18px] text-cape-palliser">{{ get_field('footer_title_2', 'option') }}</div>
                <div class="pb-[30px]"></div>
                @while($service->have_posts())
                    {{ $service->the_post() }}
                    <div class="flex items-center mb-[15px]" x-data="{ hover : false }" x-on:mouseover="hover = true" x-on:mouseover.away="hover = false">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-[15px] min-w-[15px] mr-[10px] transition-all ease-in-out duration-300" fill="none" viewBox="0 0 24 24" x-bind:stroke="hover ? '#A07D3F' : '#FFFFFF'">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                        <a class="font-secondary font-light text-[14px] text-white transition-all ease-in-out duration-300" x-bind:class="hover ? 'text-cape-palliser' : 'text-white'" href="{{ the_permalink() }}">{{ the_title() }}</a>
                    </div>
                @endwhile
            </div>
        </div>
        <div class="col-span-12 xl:col-span-3">
            <div class="pattern-1 font-primary text-[18px] text-cape-palliser">{{ get_field('footer_title_3', 'option') }}</div>
            <div class="pb-[30px]"></div>
            <div class="flex pb-[15px]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-[20px] min-w-[20px] mr-[30px]" viewBox="0 0 20 20" fill="#ffffff" stroke="#1A1A1A">
                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                </svg>
                <div class="font-secondary font-light text-[14px] leading-[24px] text-white mt-[-5px]">{!! get_field('company_address', 'option')  !!}</div>
            </div>
            <div class="flex pb-[15px]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-[20px] min-w-[20px] mr-[30px]" viewBox="0 0 20 20" fill="#ffffff" stroke="#1A1A1A">
                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                </svg>
                <a class="font-secondary font-light text-[14px] leading-[24px] text-white mt-[-5px]" href="tel:{{ get_field('company_phone', 'option') }}">{!! get_field('company_phone', 'option') !!}</a>
            </div>
            <div class="flex pb-[15px]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-[20px] min-w-[20px] mr-[30px]" viewBox="0 0 20 20" fill="#ffffff" stroke="#1A1A1A">
                    <path fill-rule="evenodd" d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2l-1 2H8l-1-2H5V5z" clip-rule="evenodd"/>
                </svg>
                <a class="font-secondary font-light text-[14px] leading-[24px] text-white mt-[-5px]" href="mailto:{{ get_field('company_email', 'option') }}">{!! get_field('company_email', 'option') !!}</a>
            </div>
            <div class="flex pb-[15px]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-[20px] min-w-[20px] mr-[30px]" viewBox="0 0 24 24" fill="#ffffff" stroke="#1A1A1A">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <div class="font-secondary font-light text-[14px] leading-[24px] text-white mt-[-5px]">{!! get_field('company_hours_minimal', 'option') !!}</div>
            </div>
        </div>
    </div>
</div>
<div class="flex justify-between py-[30px] px-[15px] xl:px-[260px]">
    <div class="font-secondary font-light text-white text-[14px]">{{ get_field('footer_copyright_1', 'option') }}</div>
    <div class="flex font-secondary text-white text-[14px]">
        <div>{{ get_field('footer_copyright_2a', 'option') }}</div>&nbsp;
        <a class="transition-all ease-in-out duration-300 hover:text-cape-palliser" href="{{ get_field('footer_copyright_2_url', 'option') }}" target="_blank">
            <div>{{ get_field('footer_copyright_2b', 'option') }}</div>
        </a>
    </div>
</div>
