<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($urls as $url)
        <url>
            <loc>{!! $url['loc'] !!}</loc>
            <changefreq>{{ $url['changefreq'] }}</changefreq>
            <priority>{{ $url['priority'] }}</priority>
            @if (isset($url['lastmod']))
                <lastmod>{{ $url['lastmod']->toISOString() }}</lastmod>
            @endif
        </url>
    @endforeach
</urlset>
