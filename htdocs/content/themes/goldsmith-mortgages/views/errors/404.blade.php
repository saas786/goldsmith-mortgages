@extends('layouts.main')

@section('content')
    <div class="container px-[15px] pt-[180px] mx-auto h-[100vh]">
        <div class="flex items-center text-white transition-all ease-in-out duration-300 hover:text-cape-palliser">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-[15px] min-w-[15px] mr-[15px]" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
            </svg>
            <a href="{{ home_url() }}">{{ pll__('Back to Home', APP_TD) }}</a>
        </div>
    </div>
@endsection
