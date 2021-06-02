@extends('layouts.main')

@section('content')
    <div>
        <div>
            <div>{{ get_field('banner_1')['url'] }}</div>
            <div>{{ get_field('title_1') }}</div>
        </div>
        <hr>
        <div>
            <div>{{ get_field('title_2') }}</div>
        </div>
        <hr>
        <div>
            <div>{{ get_field('company_address', 'option') }}</div>
            <div>{{ get_field('company_phone', 'option') }}</div>
            <div>{{ get_field('company_email', 'option') }}</div>
            <div>{{ get_field('company_hours_extended', 'option') }}</div>
        </div>
        <hr>
        <div id="map" class="w-full h-[600px]"></div>
        <hr>
        @template('parts.content', 'enquiry')
    </div>
@endsection
