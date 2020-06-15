<?php
return [

    'product/([0-9]+)' => 'product/view/$1',
    'catalog' => 'catalog/index',
    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',
    'category/([0-9]+)' => 'catalog/category/$1',

    'news/([0-9]+)' => 'news/view/$1',
    'news' => 'news/index',
    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'cabinet' => 'cabinet/index',

    '' => 'site/index', //actionIndex в SiteController
];