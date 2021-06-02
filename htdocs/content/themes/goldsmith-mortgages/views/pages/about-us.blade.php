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
            <div>{{ get_field('content_2') }}</div>
            <div>{{ get_field('label_2') }}</div>
            <div>{{ get_field('page_2') }}</div>
            <div>{{ get_field('image_2')['url'] }}</div>
        </div>
        <hr>
        <div>
            <div>{{ get_field('title_3') }}</div>
            <div>{{ get_field('content_3') }}</div>
            @foreach(get_field('products_3') as $product)
                <div>{{ $product['image']['url'] }}</div>
                <div>{{ $product['title'] }}</div>
                <div>{{ $product['content'] }}</div>
            @endforeach
        </div>
        <hr>
        <div>
            <div>{{ get_field('title_4') }}</div>
            @foreach(get_field('products_4') as $product)
                <div>{{ $product['image']['url'] }}</div>
                <div>{{ $product['name'] }}</div>
                <div>{{ $product['role'] }}</div>
                <div>{{ $product['phone'] }}</div>
                <div>{{ $product['email'] }}</div>
                <div>{{ $product['content'] }}</div>
            @endforeach
        </div>
    </div>
@endsection
