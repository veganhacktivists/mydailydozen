<?php

use Illuminate\Support\HtmlString;
use RelativeTime\RelativeTime;

/*
 * This outputs an icon to the page. For a list of
 * available icons, please go to https://fontawesome.com/icons.
 *
 * We only have the free icons.
 *
 * $iconType can be either 's' (solid), 'r' (regular),
 * or 'b' (brand). The others are for paid icons.
 */
function icon(string $iconType, string $iconName)
{
    $iconHtml = <<<HTML
        <i class="icon fa$iconType fa-$iconName fa-fw"></i>
HTML;

    return new HtmlString($iconHtml);
}

/*
 * This is used for when you want to highlight a link to the page
 * that you're currently on (i.e. the "active" link).
 *
 * Example:
 *
 * {{ link_to_route('posts.index', 'Posts', [], ['class' => classForRoute('posts.index')]) }}
 *
 * If you're on /posts, this would output:
 *
 * <a href="/posts" class="active">Posts</a>
 */
function classForRoute(string $routeName, string $class = 'active')
{
    return request()->routeIs($routeName) ? $class : '';
}

/*
 * Use this in top-level views to set the title of the page. It
 * automatically appends the site name at the end of the title.
 */
function title(string $pageTitle)
{
    $siteName = config('app.name');

    return $pageTitle ? "$pageTitle - $siteName" : $siteName;
}

/*
 * This is for calculating a date difference in a human-readable
 * format (e.g. "3 days").
 */
function friendlyDateDiff($date, $now = null, RelativeTime $relativeTime = null)
{
    $now = $now ?: time();
    $relativeTime = $relativeTime ?: new RelativeTime([
        'suffix' => false,
        'truncate' => 1,
    ]);

    return $relativeTime->convert($now, $date);
}
