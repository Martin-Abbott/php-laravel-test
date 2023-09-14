<?php

require __DIR__ . '/vendor/autoload.php';
use Cocur\Slugify\Slugify;

function greet($userName) {
    echo "Hello $userName! How are you today?";
}

function greetSlug($userName) {
    $slugified = new Slugify();
    echo $slugified->slugify("Hello $userName! How are you today?");
}

greet("Martin");

echo "\n";

greetSlug("Martin");
?>