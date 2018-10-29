<?php
// var_dump($app); die();
$app->get('/', 'App\Controllers\HotelController:index')->setName('home');
//  Login
$app->post('/booking', 'App\Controllers\HotelController:booking')->setName('bookings');


