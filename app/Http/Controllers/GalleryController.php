<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function gallery()
    {
        $seo = [
            'title' => 'Gallery | Gurukul Takshshila School',
            'description' => 'Explore moments, activities and campus life at Gurukul Takshshila School through our image gallery.',
            'keywords' => 'school gallery, gurukul takshshila gallery, campus images',
            'image' => asset('storage/default-gallery.jpg'),
        ];

        // Fetch active gallery images from database, ordered by order field
        $galleryImages = Gallery::where('status', 'active')
            ->orderBy('order', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();

        // If no images in database, use fallback static images
        if ($galleryImages->isEmpty()) {
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
            shuffle($images);
        } else {
            // Convert gallery model collection to image URLs
            $images = $galleryImages->map(function($gallery) {
                return [
                    'url' => asset('storage/' . $gallery->image),
                    'title' => $gallery->title,
                    'description' => $gallery->description
                ];
            });
        }

        return view('frontend.gallery.index', compact('seo', 'images'));
    }
}
