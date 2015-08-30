<?php

use Herbie\DI;
use Herbie\Hook;

class HighlightJsPlugin
{
    /** @var array */
    protected static $config;

    public static function install()
    {
        // config
        $defaults = DI::get('Config')->get('plugins.config.highlightjs', []);
        $config = array_merge([
            'stylesheets' => '@plugin/highlightjs/assets/styles/',
            'javascript' => '@plugin/highlightjs/assets/highlight.pack.js',
            'javascript_init' => '@plugin/highlightjs/assets/highlightjs.js',
            'html' => '<pre><code class="{class}">{content}</code></pre>',
            'style' => 'default'
        ], $defaults);

        /** @var Herbie\Assets $assets */
        $assets = DI::get('Assets');

        if (false !== $config['stylesheets']) {
            $style = empty($config['style']) ? 'default' : $config['style'];
            $stylesheet = sprintf('%s/%s.css', rtrim($config['stylesheets']) . '/', $style);
            $assets->addCss($stylesheet);
        }

        if (false !== $config['javascript']) {
            $assets->addJs($config['javascript']);
        }

        if (false !== $config['javascript_init']) {
            $assets->addJs($config['javascript_init']);
        }

        Hook::attach('shortcodeInitialized', ['HighlightJsPlugin', 'addShortcode']);

    }

    public static function addShortcode($shortcode)
    {
        $shortcode->add('code', ['HighlightJsPlugin', 'codeShortcode']);
    }

    public static function codeShortcode($options, $content)
    {
        $name = empty($options[0]) ? 'text' : $options[0];
        return strtr(static::$config['html'], ['{class}' => $name, '{content}' => htmlentities(trim($content))]);
    }

}

HighlightJsPlugin::install();
