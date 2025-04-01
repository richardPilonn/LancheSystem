<?php

use App\Livewire\Auth\Login;
use App\Livewire\CadastroCliente;
use App\Models\Cliente;
use Illuminate\Support\Facades\Route;

Route::get('/cliente/cadastrar', CadastroCliente::class)->name('cliente.create'); 

// Route::get('/cliente/cadastrar', function () {
//     return view('client.create'); // A view Blade com o componente Livewire
// });

Route::get('/login',  Login::class)->name('login');
