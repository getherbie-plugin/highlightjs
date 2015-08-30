# Herbie HighlightJS Plugin

`HighlightJS` ist ein [Herbie](http://github.com/getherbie/herbie) Plugin, das den JavaScript basierten Code 
Syntax-Highlighter [Highlight.js](https://highlightjs.org/) in deine Website einbindet.


## Installation

Das Plugin installierst du via Composer.

	$ composer require getherbie/plugin-highlightjs

Danach aktivierst du das Plugin in der Konfigurationsdatei.

    plugins:
        enable:
            - highlightjs


## Konfiguration

Unter `plugins.config.highlightjs` stehen dir die folgenden Optionen zur Verfügung:

    # Folder with highlight.js stylesheets. If false, no styles are added.
    stylesheets: "@plugin/highlightjs/assets/styles/"

    # Highlight.js javascript. If false, no styles are added.
    javascript: "@plugin/highlightjs/assets/highlight.pack.js"
    
    # The initializer javascript with pure vanilla-javascript.
    javascript_init: "@plugin/highlightjs/assets/highlightjs.js"
    
    # The HTML markup
    html: "<pre><code class="{class}">{content}</code></pre>"
    
    # The highlight.js theme.
    style: default


## Anwendung

Das Plugin stellt dir den Shortcode [code] zur Verfügung, den du in deinen Seiteninhalten nutzen kannst. 
Als einzigen Parameter wird die Programmiersprache verlangt:

    [code javascript]
        alert("Hello Herbie!");
    [/code]

    [code php]
        echo "Hello Herbie!";
    [/code]


## Unterstützte Sprachen

Das Highlight.js Package von Herbie unterstützt die folgenden Sprachen:

Apache, Bash, C#, C++, CSS, CoffeeScript, Diff, HTML, XML, HTTP, Ini, JSON, Java, JavaScript, Makefile, 
Markdown, Nginx, Objective C, PHP, Perl, Python, Ruby, SQL, Twig

Du kannst aber viele andere Sprachen einsetzen. Dazu stellst du dir dein eigenes Package unter 
<https://highlightjs.org/download/> zusammen. Anschliessend muss die Plugin-Konfiguration angepasst werden.

Beispiel: Legst du die Dateien im Verzeichnis `site/assets/default` ab, könnte deine Konfiguration wie folgt aussehen:

    stylesheets: "@site/assets/default/highlightjs/styles/"
    javascript: "@site/assets/default/highlightjs/highlight.pack.js"

