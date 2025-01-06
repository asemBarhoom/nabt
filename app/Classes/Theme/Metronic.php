<?php
namespace App\Classes\Theme;

class Metronic
{
    public static $attrs;
    public static $classes;
    public static $direction = 'ltr'; // Default direction

    // Set direction
    public static function setDirection($dir)
    {
        self::$direction = $dir;
    }

    // Get direction
    public static function getDirection()
    {
        return self::$direction;
    }

    // Add attribute
    public static function addAttr($scope, $name, $value)
    {
        self::$attrs[$scope][$name] = $value;
    }

    // Add class
    public static function addClass($scope, $class)
    {
        self::$classes[$scope][] = $class;
    }

    // Print attributes
    public static function printAttrs($scope)
    {
        $attrs = [];

        if ($scope == 'html') {
            $attrs[] = 'dir="' . self::getDirection() . '"';
        }

        if (isset(self::$attrs[$scope]) && !empty(self::$attrs[$scope])) {
            foreach (self::$attrs[$scope] as $name => $value) {
                $attrs[] = $name . '="' . $value . '"';
            }
        }

        echo ' ' . implode(' ', $attrs) . ' ';
    }

    // Print classes
    public static function printClasses($scope, $full = true)
    {
        if ($scope == 'body') {
            self::$classes[$scope][] = 'page-loading';
            self::$classes[$scope][] = self::getDirection(); // Add RTL/LTR class
        }

        if (isset(self::$classes[$scope]) && !empty(self::$classes[$scope])) {
            $classes = implode(' ', self::$classes[$scope]);
            if ($full) {
                echo ' class="' . $classes . '" ';
            } else {
                echo ' ' . $classes . ' ';
            }
        } else {
            echo '';
        }
    }

    // Convert CSS file path to RTL file
    public static function rtlCssPath($css_path)
    {
        if (self::getDirection() === 'rtl') {
            if (substr($css_path, -8) == '.min.css') {
                $css_path = substr_replace($css_path, '.rtl.min.css', -8);
            } else {
                $css_path = substr_replace($css_path, '.rtl.css', -4);
            }
        }

        return $css_path;
    }

    // Initialize theme CSS files
    public static function initThemes()
    {
        $themes = [];

        $themes[] = self::rtlCssPath('css/themes/layout/header/base/' . get_layout_content()['header']['self']['theme'] . '.css');
        $themes[] = self::rtlCssPath('css/themes/layout/header/menu/' . get_layout_content()['header']['menu']['desktop']['submenu']['theme'] . '.css');
        $themes[] = self::rtlCssPath('css/themes/layout/aside/' . get_layout_content()['aside']['self']['theme'] . '.css');

        if (get_layout_content()['aside']['self']['display']) {
            $themes[] = self::rtlCssPath('css/themes/layout/brand/' . get_layout_content()['brand']['self']['theme'] . '.css');
        } else {
            $themes[] = self::rtlCssPath('css/themes/layout/brand/' . get_layout_content()['header']['self']['theme'] . '.css');
        }

        return $themes;
    }

    /**
     * Prints Google Fonts
     */
    public static function getGoogleFontsInclude()
    {
        if (get_layout_content()['resources']['fonts']['google']['families']) {
            $fonts = get_layout_content()['resources']['fonts']['google']['families'];
            echo '<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=' . implode('|', $fonts) . '">';
        }
        echo '';
    }

    /**
     * Get SVG content
     * @param string $filepath
     * @param string $class
     *
     * @return string|string[]|null
     */
    public static function getSVG($filepath, $class = '')
    {
        $path=realpath('public')?realpath('public'):realpath('');

        if (!is_string($filepath) || !file_exists($path.'/'.$filepath)) {
            return '';
        }


        $svg_content = file_get_contents($path.'/'.$filepath);

        $dom = new \DOMDocument();
        $dom->loadXML($svg_content);

        // remove unwanted comments
        $xpath = new \DOMXPath($dom);
        foreach ($xpath->query('//comment()') as $comment) {
            $comment->parentNode->removeChild($comment);
        }

        // remove unwanted tags
        $title = $dom->getElementsByTagName('title');
        if ($title['length']) {
            $dom->documentElement->removeChild($title[0]);
        }
        $desc = $dom->getElementsByTagName('desc');
        if ($desc['length']) {
            $dom->documentElement->removeChild($desc[0]);
        }
        $defs = $dom->getElementsByTagName('defs');
        if ($defs['length']) {
            $dom->documentElement->removeChild($defs[0]);
        }

        // remove unwanted id attribute in g tag
        $g = $dom->getElementsByTagName('g');
        foreach ($g as $el) {
            $el->removeAttribute('id');
        }
        $mask = $dom->getElementsByTagName('mask');
        foreach ($mask as $el) {
            $el->removeAttribute('id');
        }
        $rect = $dom->getElementsByTagName('rect');
        foreach ($rect as $el) {
            $el->removeAttribute('id');
        }
        $path = $dom->getElementsByTagName('path');
        foreach ($path as $el) {
            $el->removeAttribute('id');
        }
        $circle = $dom->getElementsByTagName('circle');
        foreach ($circle as $el) {
            $el->removeAttribute('id');
        }
        $use = $dom->getElementsByTagName('use');
        foreach ($use as $el) {
            $el->removeAttribute('id');
        }
        $polygon = $dom->getElementsByTagName('polygon');
        foreach ($polygon as $el) {
            $el->removeAttribute('id');
        }
        $ellipse = $dom->getElementsByTagName('ellipse');
        foreach ($ellipse as $el) {
            $el->removeAttribute('id');
        }

        $string = $dom->saveXML($dom->documentElement);

        // remove empty lines
        $string = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $string);

        $cls = array('svg-icon');
        if (! empty($class)) {
            $cls = array_merge($cls, explode(' ', $class));
        }

        echo '<span class="'.implode(' ', $cls).'"><!--begin::Svg Icon | path:'.$filepath.'-->'.$string.'<!--end::Svg Icon--></span>';;
    }


    /**
     * Check if $path provided is SVG
     */
    public static function isSVG($path) {

        if (is_string($path)) {
            return substr(strrchr($path, '.'), 1) === 'svg';
        }

        return false;
    }

    // Other methods (SVG handling, etc.) remain unchanged
    // ...
}
