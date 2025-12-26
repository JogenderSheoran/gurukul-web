<!doctype html>
<html lang="en">
<head>
    @include('frontend.include.css')

    <!-- SEO -->
    <x-seo
        :title="$seo['title']"
        :description="$seo['description']"
        :keywords="$seo['keywords']"
        :image="$seo['image']"
    />
</head>

<body>

@include('frontend.include.topbar')
@include('frontend.include.head')

<div class="main">

    <!-- COMMON ORANGE BANNER -->
    <x-inner-banner
        title="Celebrations & Adventure Trips"
        subtitle="Creating unforgettable memories through exciting adventures and celebrations"
        pageKey="celebration-adventure"
    />

    <!-- ADVENTURE TRIPS -->
    <section class="py-5">
        <div class="container text-center">
            <h2>Adventure Trips</h2>
            <p class="mb-5">
                Adventure trips are a chance to explore, learn beyond classrooms and
                develop confidence, teamwork and independence.
            </p>

            <div class="row align-items-stretch">

                @if($adventures && count($adventures) > 0)
                    @foreach($adventures as $adventure)
                    <div class="col-lg-3 col-md-6 amenityCol">
                        <div class="amenityCard">
                            @if($adventure->card_image)
                                <img src="{{ asset('storage/' . $adventure->card_image) }}" class="img-fluid rounded mb-3" alt="{{ $adventure->title }}">
                            @else
                                <img src="{{ asset('img/logo.png') }}" class="img-fluid rounded mb-3" alt="{{ $adventure->title }}">
                            @endif
                            <h6>{{ $adventure->title }}</h6>
                            @if($adventure->gallery_link)
                                <a href="{{ $adventure->gallery_link }}" target="_blank" class="btn btn-orange mt-auto">View Gallery</a>
                            @endif
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="col-12">
                        <p class="text-muted">No adventure trips available at the moment.</p>
                    </div>
                @endif

            </div>
        </div>
    </section>

    <!-- CELEBRATIONS -->
    <section class="py-5 bg-light">
        <div class="container text-center">
            <h2>Celebrations</h2>
            <p class="mb-5">
                Celebrating special moments and achievements that make our
                school community vibrant and memorable.
            </p>

            <div class="row align-items-stretch">

                @if($celebrations && count($celebrations) > 0)
                    @foreach($celebrations as $celebration)
                    <div class="col-lg-3 col-md-6 amenityCol">
                        <div class="amenityCard">
                            @if($celebration->card_image)
                                <img src="{{ asset('storage/' . $celebration->card_image) }}" class="img-fluid rounded mb-3" alt="{{ $celebration->title }}">
                            @else
                                <img src="{{ asset('img/logo.png') }}" class="img-fluid rounded mb-3" alt="{{ $celebration->title }}">
                            @endif
                            <h6>{{ $celebration->title }}</h6>
                            @if($celebration->gallery_link)
                                <a href="{{ $celebration->gallery_link }}" target="_blank" class="btn btn-orange mt-auto">View Gallery</a>
                            @endif
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="col-12">
                        <p class="text-muted">No celebrations available at the moment.</p>
                    </div>
                @endif

            </div>
        </div>
    </section>

    @include('frontend.include.footer')

</div>

@include('frontend.include.js')

</body>
</html>
