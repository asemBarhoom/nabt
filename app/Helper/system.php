<?php


use Mcamara\LaravelLocalization\LaravelLocalization;

function locales()
{
    $locales = [];
    $obj = new LaravelLocalization ;
    foreach ( $obj->getSupportedLocales() as $key => $value) {
        $locales[$key] = $value['name'];
    }
    return $locales;
}


function settings()
{
    return new \App\Models\Setting();
}


if (! function_exists('t')) {

    /**
     * Get the translated message for the given key.
     *
     * @param string $key The translation key
     * @param array $placeholder The placeholder values to replace in the translated string
     * @param string|null $locale The locale to use for translation, defaults to the app locale
     *
     * @return string The translated string
     */
    function t($key, $placeholder = [], $locale = null)
    {
        return trans($key, $placeholder, $locale);
        $group = 'admin';
        if (is_null($locale))
            $locale = config('app.locale');
        $key = trim($key);
        $word = $group . '.' . $key;
        if (\Illuminate\Support\Facades\Lang::has($word)) {
            return trans($word, $placeholder, $locale);
        } else {
//            return $key;
        }

        $messages = [
            $word => $key,
        ];

        app('translator')->addLines($messages, $locale);
        $langs = ['ar','en'];
        foreach ($langs as $lang) {
            $translation_file = base_path() . '/resources/lang/' . $lang . '/' . $group . '.php';
            $fh = fopen($translation_file, 'r+');
            $key = str_replace("'", "\'", $key);
            $new_key = "\n \t'$key' => '$key',\n];\n";
            fseek($fh, -4, SEEK_END);
            fwrite($fh, $new_key);
            fclose($fh);
        }
        return trans($word, $placeholder, $locale);
    }


    if (!function_exists('getMenuItems')) {
        function getMenuItems() {
            // Include the PHP file and return the array
            return include resource_path('views/layouts/base/menu_aside.php');
        }
    }


    if (!function_exists('getHeaderMenuItems')) {
        function getHeaderMenuItems() {
            // Include the PHP file and return the array
            $menuItems = include resource_path('views/layouts/base/menu_header.php');

            // Return the 'items' array
            return $menuItems;
        }
    }

    if (!function_exists('get_layout_content')) {
        /**
         * Get the content of the layout view file.
         *
         * @return string
         */
        function get_layout_content()
        {
            // Path to the layout view
            $layoutPath = include resource_path('views/layouts/layout.php');
            return  $layoutPath;
        }
    }



}

