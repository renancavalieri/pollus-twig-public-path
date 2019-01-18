<?php
    require_once(__DIR__."/../vendor/autoload.php");

    use Pollus\TwigPublicPath\PublicPathComponent;

    $component = new PublicPathComponent("http://www.mydomain.com");
    echo $component->url("/testing/my-url") . "<br>";
    echo $component->url("/testing/my-url", ["param_a" => "foo", "param_b" => "bar"]) . "<br>";
    echo $component->url("http://another-url.com") . "<br>";
    echo $component->url("http://another-url.com", ["param_a" => "foo", "param_b" => "bar"]) . "<br>";

    
    