<?php

namespace App\Helpers;

use App\Models\PageBanner;

class PageBannerHelper
{
    /**
     * Get page banner by page key
     * 
     * @param string $pageKey
     * @return PageBanner|null
     */
    public static function getPageBanner($pageKey)
    {
        return PageBanner::where('page_key', $pageKey)->first();
    }

    /**
     * Check if page banner exists
     * 
     * @param string $pageKey
     * @return bool
     */
    public static function hasPageBanner($pageKey)
    {
        return PageBanner::where('page_key', $pageKey)->exists();
    }
}
