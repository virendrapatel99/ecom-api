<?php

require 'vendor/autoload.php';
include 'bootstrap.php';

use Ecommerce\Models\Category;
use Ecommerce\Models\Products;

$app = new \Slim\App();

$app->get('/products/category/{category_id}/{offset:.*}', function ($request, $response, $args) {
    
    $_products = new Products();
    $_category = new Category();

    $products = $_products->where('cat_id','=',$args['category_id'])
                          ->with('category')
                          ->skip($args['offset'])
                          ->take(2)
                          ->get();

    $count = $_products->where('cat_id','=',$args['category_id'])->count();

    $allCategories = $_category->all();

    $payload['allproducts'] = $products;
    $payload['count'] = $count;
    $payload['allCategories'] = $allCategories;

    return $response->withStatus(200) ->withHeader('Access-Control-Allow-Origin', '*')->withJson($payload);
});

$app->get('/all_categories', function ($request, $response, $args) {
    $_category = new Category();
    $allCategories = $_category->all();
    $payload['all_categories'] = $allCategories;
    return $response->withStatus(200) ->withHeader('Access-Control-Allow-Origin', '*')->withJson($payload);
});

// Run app
$app->run();