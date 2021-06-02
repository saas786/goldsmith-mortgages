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
    </div>
@endsection
