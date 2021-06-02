@extends('layouts.main')

@section('content')
    <div>
        <div>
            <div>{{ get_field('banner_1')['url'] }}</div>
            <div>{{ get_field('title_1') }}</div>
            <div>{{ get_field('subtitle_1') }}</div>
        </div>
        <hr>
        <div>
            @foreach(get_field('products_2') as $product)
                <div>{{ $product['image']['url'] }}</div>
                <div>{{ $product['title'] }}</div>
                <div>{{ $product['content'] }}</div>
            @endforeach
            <div>{{ get_field('title_2') }}</div>
            <div>{{ get_field('content_2') }}</div>
            <div>{{ get_field('image_2')['url'] }}</div>
        </div>
        <hr>
        <div>
            <div>{{ get_field('image_3')['url'] }}</div>
            <div>{{ get_field('title_3') }}</div>
            <div>{{ get_field('content_3') }}</div>
            @foreach(get_field('products_3a') as $product)
                <div>{{ $product['image']['url'] }}</div>
                <div>{{ $product['title'] }}</div>
                <div>{{ $product['content'] }}</div>
            @endforeach
            @foreach(get_field('products_3b') as $product)
                <div>{{ $product['title'] }}</div>
                <div>{{ $product['content'] }}</div>
            @endforeach
        </div>
        @template('parts.content', 'testimonial')
        @template('parts.content', 'enquiry')
    </div>
@endsection
