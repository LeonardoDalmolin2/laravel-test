<?php

use Illuminate\Support\Facades\Route;

//Rota '/'
//Get =  verbo http da rota
//Passa uma função de callback que retorna uma View (resources/views/welcome.blade.php )
Route::get('/', function () {
    return view('welcome');
});

//Any = permite todo o tipo de acesso de verbo HTTP (get, post, put...)
Route::any('/any', function () {
    return 'Any';
});

//Match = permite escolher o tipo de resquisição em que pode ser acessado
Route::match(['get', 'post'], '/match', function () {
    return 'Match';
});

//{flag} = permite passar parâmetros na URL
Route::get('/categorias/{flag}', function ($prm1) {
    return "Produtos da categoria {$prm1}";
});

//Flag seguida de um parâmetro fixo
Route::get('/categoria/{flag}/posts', function ($flag) {
    return "Posts da categoria {$flag}";
});

//{Flag?} torna opcional definir o próximo termo
//{$idProdutos = ''} = diz que o valor default é 'nenhum'
Route::get('/produtos/{idProdutos?}', function ($idProdutos = '') {
    return "Produtos {$idProdutos}";
});

// Route::get('redirect1', function () {
//     return redirect('/redirect2');
// });
//Redirect('/', '/', {[ pode passar parâmetros aqui]}) = redireciona páginas
Route::redirect('/redirect1', '/redirect2');

Route::get('redirect2', function () {
    return 'redirect2';
});


//redirect()->route('url.name') = redireciona para a rota com nome 'url.name'
//'->name('')' = define o nome da rota
Route::get('redirect3', function() {
    return redirect()->route('url.name');
});

Route::get('/name-url', function() {
    return 'Name url';
})->name('url.name');

//View = rota do tipo view, apenas exibe algo
Route::view('/view', 'welcome');
 
Route::get('/contato', function() {
    return 'Contato';
});

Route::get('/empresa', function() {
    return view('site.contact');
});

Route::post('/register', function() {
    return '';
});