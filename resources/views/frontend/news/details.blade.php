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
        .newsDetails img { border-radius: 22px; }
        .newsMeta { color:#777; font-size:14px; margin-bottom:15px; display:block; }
    </style>
</head>
<body>

@include('frontend.include.topbar')
@include('frontend.include.head')

<div class="main">

<x-inner-banner title="{{ $news['title'] }}" subtitle="School News"/>

<section class="py-5">
    <div class="container">
        <article class="col-lg-9 mx-auto newsDetails">
            <img src="{{ $news['image'] }}" class="img-fluid mb-4" alt="{{ $news['title'] }}">

            <span class="newsMeta">
                📍 {{ $news['location'] }} |
                📅 {{ $news['date'] }} |
                ⏰ {{ $news['time'] }}
            </span>

            <p>{{ $news['description'] }}</p>
        </article>
    </div>
</section>

</div>

@include('frontend.include.footer')
@include('frontend.include.js')
</body>
</html>
