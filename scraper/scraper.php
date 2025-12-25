<?php

require __DIR__.'/../vendor/autoload.php';

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Support\Facades\DB;

$app = require __DIR__.'/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$client = new Client();

/*
  Manually verify last page:
  https://beyondchats.com/blogs/page/12/
*/
$lastPage = 12;

$html = $client->get("https://beyondchats.com/blogs/page/$lastPage/")
               ->getBody()->getContents();

$crawler = new Crawler($html);

$links = [];
$crawler->filter('article a')->each(function ($node) use (&$links) {
    $href = $node->attr('href');

    // Only keep actual blog posts (not tag/category pages)
    if (
        str_contains($href, '/blogs/') &&
        !str_contains($href, '/tag/') &&
        !str_contains($href, '/category/')
    ) {
        $links[] = $href;
    }
});


$links = array_unique($links);

$savedCount = 0;

foreach ($links as $link) {

    if ($savedCount >= 5) {
        break;
    }

    $page = $client->get($link)->getBody()->getContents();
    $c = new Crawler($page);

    $titleNode = $c->filter('h1');
    $contentNode = $c->filter('article');

    if ($titleNode->count() === 0 || $contentNode->count() === 0) {
        echo "Skipped (structure mismatch): $link\n";
        continue;
    }

    $title = trim($titleNode->text());
    $content = $contentNode->html();

    DB::table('articles')->updateOrInsert(
        ['url' => $link],
        [
            'title' => $title,
            'content' => $content,
            'published_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]
    );

    $savedCount++;
    echo "Saved: $title\n";
}

