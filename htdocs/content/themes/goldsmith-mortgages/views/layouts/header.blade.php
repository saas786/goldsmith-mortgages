<div class="xl:hidden bg-cod-gray w-full h-[100px] fixed z-[9999]" x-data="{ sidemenu: false }">
    <div class="flex items-center justify-between w-full h-full px-[15px]">
        <a href="{{ $home_url }}">
            <img class="self-center" src="{{ get_field('header_logo', 'option')['url'] }}" alt="">
        </a>
        <div class="flex items-center">
            <div class="flex mr-[30px]">
                <div class="pl-[15px]">
                    <a class="font-primary-default {{ $locale == 'en_NZ' ? 'text-white' : 'text-cape-palliser' }} transition-all ease-in-out duration-300 hover:text-white" href="{{ home_url('/') }}">EN</a>
                </div>
                <div class="pl-[15px]">
                    <a class="font-primary-default {{ $locale == 'zh_CN' ? 'text-white' : 'text-cape-palliser' }} transition-all ease-in-out duration-300 hover:text-white" href="{{ home_url('/zh') }}">CN</a>
                </div>
            </div>
            <div class="flex items-center">
                <span class="dashicons dashicons-menu-alt3 w-[30px] h-[30px] text-[30px] text-cape-palliser transition-all ease-in-out duration-300 hover:text-white cursor-pointer" x-on:click.stop="sidemenu = true"></span>
            </div>
        </div>
    </div>
    <div style="display: none;" x-show="sidemenu">
        <div class="fixed inset-0 flex">
            <div class="fixed inset-0 cursor-pointer" x-on:click="sidemenu = false"
                 x-show="sidemenu"
                 x-transition:enter="transition-all ease-in-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition-all ease-in-out duration-300"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0">
                <div class="absolute inset-0 bg-cape-palliser bg-opacity-75"></div>
            </div>
            <div class="flex flex-col bg-cod-gray w-full max-w-lg pt-[60px] px-[60px] relative"
                 x-show="sidemenu"
                 x-transition:enter="transition-all ease-in-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition-all ease-in-out duration-300"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0">
                <div class="flex items-center justify-center p-[15px] absolute top-0 right-0 cursor-pointer" x-on:click.stop="sidemenu = false">
                    <span class="dashicons dashicons-no-alt w-[50px] h-[50px] text-[50px] text-cape-palliser transition-all ease-in-out duration-300 hover:text-white"></span>
                </div>
                @foreach($menus as $menu)
                    <a class="font-primary font-light text-[24px] {{ $menu->url == $current_url ? 'text-white' : 'text-cape-palliser' }} py-[15px] transition-all ease-in-out duration-300 hover:text-white" href="{{ $menu->url }}">{{ $menu->title }}</a>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div id="header" class="hidden xl:flex items-center justify-between bg-cod-gray w-full h-[120px] px-[260px] transition-all duration-300 ease-in-out fixed z-[9999]">
    <a href="{{ $home_url }}">
        <img class="self-center" src="{{ get_field('header_logo', 'option')['url'] }}" alt="">
    </a>
    <div>
        @foreach($menus as $menu)
            <a class="font-primary font-light text-[18px] {{ $menu->url == $current_url ? 'text-white' : 'text-cape-palliser' }} px-[30px] transition-all ease-in-out duration-300 hover:text-white" href="{{ $menu->url }}">{{ $menu->title }}</a>
        @endforeach
    </div>
    <div class="language">
        {!! pll_the_languages(['echo' => 0, 'dropdown' => 1])  !!}
    </div>
</div>
