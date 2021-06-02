@extends('layouts.main')

@section('content')
    <div>
        <div>
            <div>{{ get_field('banner_1')['url'] }}</div>
            <div>{{ get_field('title_1') }}</div>
        </div>
        <hr>
        <div>
            @while($service->have_posts())
                {{ $service->the_post() }}
                <div>{{ the_title() }}</div>
                <div>{{ the_permalink() }}</div>
            @endwhile
            @php(wp_reset_postdata())
        </div>
        <hr>
        <div>
            @while($service->have_posts())
                {{ $service->the_post() }}
                <div>{{ the_title() }}</div>
                <div>{{ the_excerpt() }}</div>
                <div>{{ the_permalink() }}</div>
                <div>{{ the_field('label') }}</div>
            @endwhile
            @php(wp_reset_postdata())
        </div>
        <hr>
        @template('parts.content', 'testimonial')
        @template('parts.content', 'enquiry')
    </div>
@endsection
