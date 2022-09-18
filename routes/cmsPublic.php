<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// $router->get('/login', ['as' => 'login', function () {
//     return view('app.authentication.login.index');
// }]);

$router->get('/login', ['as' => 'login', function () {
    return view('app.authentication.login.index');
}, 'middleware' => ['AuthenticatePage']]);

$router->get('/signin', ['as' => 'signin', function () {
      return view('app.authentication.login_frontend.index');
}, 'middleware' => ['AuthenticatePage']]);

$router->get('/', 'CMS\Home\HomeController@Index');

$router->get('/signup', 'CMS\Home\HomeController@Signup');

$router->get('/contact', 'CMS\Home\HomeController@Contact');
$router->get('/about_us', 'CMS\Home\HomeController@AboutUs');


$router->get('/qrpdf/{id}', 'CMS\SuratMasuk\SuratMasukController@DownloadPdfFromQr');
// $router->get('/captchaInfo', 'CMS\SuratMasuk\SuratMasukController@DownloadPdfFromQr');

$router->get('/pdf/{encoded_url}', 'GetPdf\GetPdfController@GetPdf');
$router->get('/disposisi/pdf/{id}', 'CMS\Disposisi\DisposisiController@DownloadPdf');
$router->get('/landing', 'CMS\Landing\LandingController@Home');
