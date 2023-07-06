<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

@foreach($staticsx as $staticsy)
        <url>
            <loc>{{$staticsy['loc']}}</loc>
            <lastmod>{{date('Y-m-d H:i:s')}}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
        </url>
@endforeach

@foreach($products as $product)
        <url>
            <loc>{{url('/')}}/details/{{$product->id}}/{{$product->slug}}</loc>
            <lastmod>{{$product->created_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
        </url>
@endforeach
@foreach($categories as $category)
        <url>
            <loc>{{url('/')}}/products/{{$category->id}}/{{$category->friendly_url}}</loc>
            <lastmod>{{$category->created_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
        </url>
@endforeach
@foreach($brands as $brand)
        <url>
            <loc>{{url('/')}}/brands/{{$brand->slug}}</loc>
            <lastmod>{{$brand->created_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
        </url>
@endforeach
</sitemapindex>