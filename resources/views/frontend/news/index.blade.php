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
        /* FORCE ROW GAP */
        .row {
            row-gap: 30px;
        }

        /* CARD STRUCTURE */
        .newsCard {
            background: #fff;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0,0,0,.08);
            transition: transform .4s;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .newsCard img {
            display: block;
            width: 100%;
            height: 240px;
            object-fit: cover;
        }

        .newsContent {
            padding: 22px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .newsMeta {
            font-size: 14px;
            color: #777;
            margin-bottom: 8px;
        }

        .newsCard:hover {
            transform: translateY(-8px);
        }

        .newsContent h3 {
            font-size: 20px;
            margin: 10px 0;
        }

        .newsContent p {
            flex: 1;
        }

        .readMore {
            font-weight: 600;
            color: #c0392b;
            text-decoration: none;
            margin-top: 10px;
        }
    </style>
</head>
<body>

@include('frontend.include.topbar')
@include('frontend.include.head')

<div class="main">

<x-inner-banner title="School News" subtitle="Latest Updates & Announcements"/>

<section class="py-5">
    <div class="container">
        <div class="row">
            @foreach($news as $item)
            <div class="col-lg-4 col-md-6">
                <article class="newsCard">
                    <a href="{{ route('news.details',$item['slug']) }}">
                        <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}">
                    </a>
                    <div class="newsContent">
                        <span class="newsMeta">
                            📍 {{ $item['location'] }} <br>
                            📅 {{ $item['date'] }} | ⏰ {{ $item['time'] }}
                        </span>
                        <h3>{{ $item['title'] }}</h3>
                        <p>{{ $item['description'] }}</p>
                        <a class="readMore" href="{{ route('news.details',$item['slug']) }}">Read More →</a>
                    </div>
                </article>
            </div>
            @endforeach
        </div>
    </div>
</section>

</div>

@include('frontend.include.footer')
@include('frontend.include.js')
</body>
</html>
