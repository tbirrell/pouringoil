<?php

use App\MarkdownParser;

return [

    /* -----------------------------------------------------------------
     |  Parsers
     | -----------------------------------------------------------------
     */

    'default' => 'commonmark',

    'parsers' => [
        'commonmark' => [
            'class' => Arcanedev\LaravelMarkdown\Parsers\CommonMarkParser::class,
        ],
        'custom'=> [
            'class' => MarkdownParser::class,
        ]
    ],

];
