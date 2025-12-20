<!doctype html>
<html lang="en">
<head>
    @include('frontend.include.css')

    <x-seo
        title="{{ $seo['title'] }}"
        description="{{ $seo['description'] }}"
        keywords="{{ $seo['keywords'] }}"
        image="{{ $seo['image'] }}"
    />

    <style>
        .eventDetails img { border-radius: 22px; }
        .eventMeta { color:#777; font-size:14px; margin-bottom:15px; display:block; }
    </style>
</head>
<body>

@include('frontend.include.topbar')
@include('frontend.include.head')

<div class="main">

<x-inner-banner title="{{ $event['title'] }}" subtitle="School Event"/>

<section class="py-5">
    <div class="container">
        <article class="col-lg-9 mx-auto eventDetails">
            <img src="{{ $event['image'] }}" class="img-fluid mb-4" alt="{{ $event['title'] }}">

            <span class="eventMeta">
                📍 {{ $event['location'] }} |
                📅 {{ $event['date'] }} |
                ⏰ {{ $event['time'] }}
            </span>

            <p>{{ $event['description'] }}</p>
        </article>
    </div>
</section>

</div>

@include('frontend.include.footer')
@include('frontend.include.js')
</body>
</html>
