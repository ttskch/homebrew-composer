<?php

declare(strict_types=1);

use Symfony\Component\DomCrawler\Crawler;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require_once __DIR__.'/vendor/autoload.php';

$loader = new FilesystemLoader(__DIR__);
$twig = new Environment($loader);

$html = file_get_contents('https://getcomposer.org/download/');
$crawler = new Crawler($html);

$crawler->filter('table[aria-label="Composer versions history"] tr')->each(function (Crawler $tr) use ($twig) {
    $version = $tr->filter('td:nth-child(1)')->text();
    $classNameVersion = implode(array_map(fn (string $unit) => ucfirst(strtolower($unit)), preg_split('/[\.-]/', $version)));
    $sha256 = $tr->filter('td:nth-child(3) code')->text();

    $content = $twig->render('template.rb.twig', [
        'classNameVersion' => $classNameVersion,
        'version' => $version,
        'sha256' => $sha256,
    ]);

    file_put_contents(__DIR__."/../Formula/composer@{$version}.rb", $content);
});
