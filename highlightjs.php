<?php

use Herbie\DI;
use Herbie\Hook;

class HighlightJsPlugin
{
    /**
     * @return array
     */
    public static function install()
    {
        $config = DI::get('Config');
        $assets = DI::get('Assets');
        if ((bool)$config->get('plugins.config.highlightjs.shortcode', true)) {
            $assets->addJs("@plugin/highlightjs/assets/highlight.pack.js");
            $assets->addJs("@plugin/highlightjs/assets/highlightjs.js");
            $assets->addCss("@plugin/highlightjs/assets/styles/zenburn.css");
            Hook::attach('shortcodeInitialized', ['HighlightJsPlugin', 'addShortcode']);
        }
    }

    public static function addShortcode($shortcode)
    {
        $shortcode->add('code', ['HighlightJsPlugin', 'codeShortcode']);
    }

    public static function codeShortcode($options, $content)
    {
        $name = empty($options[0]) ? 'text' : $options[0];
        return sprintf('<pre><code class="%s">%s</code></pre>', $name, htmlentities(trim($content)));
    }

}

HighlightJsPlugin::install();
