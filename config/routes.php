<?php
// config/routes.php
// Simple routes map when using ?r=controller/action/params
return [
    '' => 'HomeController@index',
    'home' => 'HomeController@index',
    'music/detail' => 'MusicController@detail',
    'artist/profile' => 'ArtistController@profile',
    'user/login' => 'UserController@login',
    'user/logout' => 'UserController@logout',
    'admin/dashboard' => 'AdminController@dashboard',
];
