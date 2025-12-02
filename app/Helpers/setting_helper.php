<?php

use App\Models\Setting;

if (!function_exists('setting')) {
    function setting($key, $default = null, $asUrl = false)
    {
        $value = cache()->remember("setting_{$key}", 60, function () use ($key, $default) {
            $setting = Setting::where('key', $key)->first();
            return $setting ? $setting->value : $default;
        });

        if ($asUrl && $value) {
            if (preg_match('#^https?://#i', $value)) {
                return $value;
            }

            return asset('storage/' . ltrim($value, '/'));
        }

        return $value;
    }
}
