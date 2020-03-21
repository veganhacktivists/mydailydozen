<?php

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
