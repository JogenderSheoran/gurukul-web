<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function gallery()
{
    $seo = [
        'title' => 'Gallery | Gurukul Takshshila School',
        'description' => 'Explore moments, activities and campus life at Gurukul Takshshila School through our image gallery.',
        'keywords' => 'school gallery, gurukul takshshila gallery, campus images',
        'image' => 'https://picsum.photos/1200/630?random=999',
    ];

    // 20 static images
    $images = [
        'https://picsum.photos/600/600?random=1',
        'https://picsum.photos/600/600?random=2',
        'https://picsum.photos/600/600?random=3',
        'https://picsum.photos/600/600?random=4',
        'https://picsum.photos/600/600?random=5',
        'https://picsum.photos/600/600?random=6',
        'https://picsum.photos/600/600?random=7',
        'https://picsum.photos/600/600?random=8',
        'https://picsum.photos/600/600?random=9',
        'https://picsum.photos/600/600?random=10',
        'https://picsum.photos/600/600?random=11',
        'https://picsum.photos/600/600?random=12',
        'https://picsum.photos/600/600?random=13',
        'https://picsum.photos/600/600?random=14',
        'https://picsum.photos/600/600?random=15',
        'https://picsum.photos/600/600?random=16',
        'https://picsum.photos/600/600?random=17',
        'https://picsum.photos/600/600?random=18',
        'https://picsum.photos/600/600?random=19',
        'https://picsum.photos/600/600?random=20',
    ];

    shuffle($images); // 🔥 Auto shuffle on every refresh

    return view('frontend.gallery.index', compact('seo', 'images'));
}

}
