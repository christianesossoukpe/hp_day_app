<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjouterAmisController extends Controller
{
    public function index()
    {
        // Simuler une liste d'amis
        $ajoutdesamis = [
            ['id' => 1, 'name' => 'Alice'],
            ['id' => 2, 'name' => 'Bob'],
            ['id' => 3, 'name' => 'Charlie'],
        ];

        // Retourner la vue avec la liste des amis
        return inertia('AjoutsDesAmis', [
            'ajoutdesamis' => $ajoutdesamis,
        ]);
    }
}