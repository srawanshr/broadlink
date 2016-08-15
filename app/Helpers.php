<?php
/**
 * Process a url and make it SEO compliant.
 *
 * @param $string
 * @return string
 */
function seoUrl($string)
{
    // Make the string lowercase
    $string = strtolower($string);
    // Make the string alphanumeric (removes all other characters)
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
    // Clean up multiple dashes or whitespaces
    $string = preg_replace("/[\s-]+/", " ", $string);
    // Convert whitespaces and underscores to dashes
    $string = preg_replace("/[\s_]/", "-", $string);

    return $string;
}

/**
 * Return sizes readable by humans.
 *
 * @param $bytes
 * @param int $decimals
 * @return string
 */
function human_filesize($bytes, $decimals = 2)
{
    $size = ['B', 'kB', 'MB', 'GB', 'TB', 'PB'];
    $factor = floor((strlen($bytes) - 1) / 3);

    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
}

/**
 * Check if the mime type is an image.
 *
 * @param $mimeType
 * @return bool
 */
function is_image($mimeType)
{
    return starts_with($mimeType, 'image/');
}

/**
 * Return 'checked' if true.
 *
 * @param $value
 * @return string
 */
function checked($value)
{
    return $value ? 'checked' : '';
}

/**
 * Return the img url for headers.
 *
 * @param null $value
 * @return mixed|null|string
 */
function page_image($value = null)
{
    if (empty($value))
    {
        $value = config('website.page_image');
    }
    if ( ! starts_with($value, 'http') && $value[0] !== '/')
    {
        $value = config('website.uploads.webpath') . '/' . $value;
    }

    return $value;
}

/**
 * Return clean file name
 *
 * @param mixed $file
 * @return string
 */
function cleanFileName($file)
{
    $name = $file->getClientOriginalName();

    return str_slug(pathinfo($name, PATHINFO_FILENAME));
}

/**
 * Return thumbnail
 *
 * @param mixed $path
 * @return string
 */
function thumbnail($path, array $wh = array())
{
    if (empty($wh)) $wh = ['width' => 150, 'height' => 150];

    $thumbnail = \App\Services\ImageManager::getThumbnail($wh['width'], $wh['height'], $path);

    return $thumbnail;
}

/**
 * @param $guard
 * @param $width
 * @return mixed
 */
function user_avatar($guard, $width)
{
    if ($image = auth()->guard($guard)->user()->image)
    {
        return asset($image->thumbnail($width, $width));
    } else
    {
        return asset(config('paths.placeholder.avatar'));
    }
}

/**
 * @param null $service
 * @param int $width
 * @return string
 */
function service_icon($service = null, $width = 78)
{
    if ($service)
    {
        if ($service->icon) return asset($service->icon->thumbnail($width, $width));
    }

    return asset(config('paths.placeholder.service'));
}

/**
 * @return mixed
 */
function services()
{
    return App\Models\Service::active()->get();
}

/**
 * @param $query
 * @return mixed
 */
function setting($query)
{
    $setting = \App\Models\Setting::fetch($query)->first();

    return $setting ? $setting->value : null;
}

/**
 * @param $value
 * @return boolean
 */
function is_even($value)
{
    return $value % 2 == 0;
}

/**
 * @param $query
 * @return mixed
 */
function menus()
{
    return \App\Models\Menu::orderBy('order')->get();
}