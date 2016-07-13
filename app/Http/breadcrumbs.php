<?php
/**
 * Created by PhpStorm.
 * User: masterrace
 * Date: 13/07/16
 * Time: 02:29
 */

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('home_page'));
});

// Home > profile
Breadcrumbs::register('profile', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Profile', route('profile_show'));
});

// Home > profile > edit
Breadcrumbs::register('profile.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('profile');
    $breadcrumbs->push('edit', route('profile_edit'));
});

//// Home > Blog > [Category]
//Breadcrumbs::register('category', function($breadcrumbs, $category)
//{
//    $breadcrumbs->parent('blog');
//    $breadcrumbs->push($category->title, route('category', $category->id));
//});
//
//// Home > Blog > [Category] > [Page]
//Breadcrumbs::register('page', function($breadcrumbs, $page)
//{
//    $breadcrumbs->parent('category', $page->category);
//    $breadcrumbs->push($page->title, route('page', $page->id));
//});