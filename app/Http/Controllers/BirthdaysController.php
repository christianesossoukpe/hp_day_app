<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BirthdaysController extends Controller
{
    public function index()
    {
        // Simuler une liste d'anniversaires à venir
        $upcomingBirthdays = [
            ['id' => 1, 'name' => 'David', 'birthday' => '2024-11-25'],
            ['id' => 2, 'name' => 'Eve', 'birthday' => '2024-12-01'],
        ];

        // Retourner la vue avec les anniversaires à venir
        return inertia('UpcomingBirthdays', [
            'upcomingBirthdays' => $upcomingBirthdays,
        ]);
    }
}