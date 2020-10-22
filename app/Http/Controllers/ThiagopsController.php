<?php

namespace App\Http\Controllers;

use App\Contatos;
use App\Experiencia;
use App\Habilidades;
use App\Projetos;
use App\Sobre;
use Illuminate\Http\Request;

class ThiagopsController extends Controller
{
    public function buscar()
    {
        $sobres = Sobre::where('status', '=', 'A')->get();
        $projetos = Projetos::where('status', '=', 'A')->get();
        $habilidades = Habilidades::where('status', '=', 'A')->get();
        $experiencias = Experiencia::where('status', '=', 'A')->get();
        $contatos = Contatos::where('status', '=', 'A')->get();

        return view('index.thiago-ps',[
            'sobres' => $sobres,
            'projetos' => $projetos,
            'habilidades' => $habilidades,
            'experiencias' => $experiencias,
            'contatos' => $contatos
        ]);
    }

}
