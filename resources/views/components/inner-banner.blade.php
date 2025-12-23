@props(['title', 'subtitle' => null, 'pageKey' => null])

@php
    use App\Helpers\PageBannerHelper;
    
    // Get page key from passed parameter or current route name
    $currentPageKey = $pageKey ?? request()->route()->getName();
    
    // Try to get dynamic banner
    $pageBanner = PageBannerHelper::getPageBanner($currentPageKey);
    
    // Determine if we should use image or orange background
    $hasImage = $pageBanner && $pageBanner->banner_image;
    $bannerImage = $hasImage ? asset('storage/' . $pageBanner->banner_image) : null;
    $bannerContent = $pageBanner->banner_content ?? null;
@endphp

<section class="commonInnerBanner" @if($hasImage) style="background-image: url('{{ $bannerImage }}'); background-size: cover; background-position: center;" @endif>
    <div class="container text-center">
        <h1>{{ $title }}</h1>
        <p>{{ $subtitle ?? $bannerContent ?? 'Gurukul Takshshila' }}</p>
    </div>
</section>

<style>
    .commonInnerBanner {
        background: #ff8a00;
        padding: 120px 0 100px;
        text-align: center;
        position: relative;
    }
    
    /* Only show overlay when background image exists */
    @if($hasImage)
    .commonInnerBanner::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.4);
        z-index: 1;
    }
    @endif
    
    .commonInnerBanner .container {
        position: relative;
        z-index: 2;
    }
    
    .commonInnerBanner h1 {
        color: #fff;
        font-size: 42px;
        font-weight: 700;
    }
    .commonInnerBanner p {
        color: #fff;
        opacity: 0.9;
    }
</style>
