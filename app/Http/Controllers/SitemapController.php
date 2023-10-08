<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Carbon;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $baseUrl = config('app.url');

        $urls = [
            [
                'loc' => $baseUrl,
                'changefreq' => 'weekly',
                'priority' => 1,
                'lastmod' => Carbon::now(),
            ],
            [
                'loc' => "$baseUrl/json-viewer",
                'changefreq' => 'weekly',
                'priority' => 0.9,
                'lastmod' => Carbon::now(),
            ],
            [
                'loc' => "$baseUrl/encryptor",
                'changefreq' => 'weekly',
                'priority' => 0.9,
                'lastmod' => Carbon::now(),
            ],
            [
                'loc' => "$baseUrl/identifiers",
                'changefreq' => 'weekly',
                'priority' => 0.9,
                'lastmod' => Carbon::now(),
            ],
            [
                'loc' => "$baseUrl/rem-and-px",
                'changefreq' => 'weekly',
                'priority' => 0.9,
                'lastmod' => Carbon::now(),
            ],
            [
                'loc' => "$baseUrl/info-generator",
                'changefreq' => 'weekly',
                'priority' => 0.9,
                'lastmod' => Carbon::now(),
            ],
        ];

        return response()->view('sitemap', [
            'urls' => $urls,
        ])->header('Content-Type', 'application/xml');
    }
}
