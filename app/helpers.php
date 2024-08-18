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

if (!function_exists('getAvatarUrl')) {
    function getAvatarUrl($avatarPath = null)
    {
        if ($avatarPath && Str::startsWith($avatarPath, 'avatars/')) {
            return Storage::url($avatarPath);
        }

        // Return the default avatar if no custom avatar is set
        return asset('img/default-avatar.png');
    }
}