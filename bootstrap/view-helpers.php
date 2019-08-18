<?php

use Illuminate\Support\HtmlString;
use RelativeTime\RelativeTime;

function icon(string $iconType, string $iconName)
{
    $iconHtml = <<<HTML
        <i class="icon fa$iconType fa-$iconName fa-fw"></i>
HTML;

    return new HtmlString($iconHtml);
}

function classForRoute(string $routeName, string $class = 'active')
{
    return request()->routeIs($routeName) ? $class : '';
}

function title(string $pageTitle)
{
    $siteName = config('app.name');

    return $pageTitle ? "$pageTitle - $siteName" : $siteName;
}

function friendlyDateDiff($date, $now = null, RelativeTime $relativeTime = null)
{
    $now = $now ?: time();
    $relativeTime = $relativeTime ?: new RelativeTime([
        'suffix' => false,
        'truncate' => 1,
    ]);

    return $relativeTime->convert($now, $date);
}
