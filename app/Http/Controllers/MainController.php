<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        echo "Estilo Ronaldinho!";
    }

    public function newNote()
    {
        echo 'Criando nota';
    }
}
