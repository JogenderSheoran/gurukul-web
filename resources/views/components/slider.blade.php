@props([
    'title' => '',
    'subtitle' => '',
    'images' => []
])

<section class="commonGallerySection">
    <div class="container text-center">

        <h2>{{ $title }}</h2>
        <p class="gallerySubtitle">{{ $subtitle }}</p>

        <div class="commonGallerySlider">

            @foreach($images as $img)
                <div class="galleryItem">
                    <img src="{{ $img }}" alt="{{ $title }} image">
                </div>
            @endforeach

        </div>

    </div>
</section>


