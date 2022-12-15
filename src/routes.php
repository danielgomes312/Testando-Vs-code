<?php
#essa é a função proporcionada pela biblioteca, ela transforma rotas em nomes mais curtos e funcionais.

use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');

$router->get('/login', 'LoginController@signin');
$router->post('/login', 'LoginController@signinAction');

$router->get('/cadastro', 'LoginController@signup');
$router->post('/cadastro', 'LoginController@signupAction');

//router->get('/pesquisa');
//router->get('/sair');
//router->get('/perfil');
//router->get('/amigos');
//router->get('/fotos');
//router->get('/config');