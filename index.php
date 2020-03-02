<?php

require_once __DIR__ . '/vendor/autoload.php';

use BackendApp\Repository\Repository;
use BackendApp\Repository\AdRepository;
use BackendApp\Ads\AdsInjector;

$repo = new Repository();
$adCollection = new AdRepository();

$ads = new AdsInjector($adCollection);

$app = new BackendApp\BackendApp($repo, $ads);
$app->start();
