<?php

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

if (!function_exists('getCoverImageUrl')) {
    function getCoverImageUrl($coverImagePath)
    {
        // Check if the path is a storage path
        if (Str::startsWith($coverImagePath, 'cover_images/')) {
            return Storage::url($coverImagePath);
        }

        // Otherwise, assume it's a static asset
        return asset($coverImagePath);
    }
}