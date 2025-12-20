<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InnerBanner extends Component
{
    public string $title;
    public string $subtitle;

    public function __construct($title = 'Page Title', $subtitle = 'Gurukul Takshshila')
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
    }

    public function render()
    {
        return view('components.inner-banner');
    }
}
