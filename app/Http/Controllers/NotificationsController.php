<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function index()
    {
        // Simuler une liste de notifications
        $notifications = [
            ['id' => 1, 'message' => 'Alice a un anniversaire demain.'],
            ['id' => 2, 'message' => 'Bob a envoyé un message.'],
            ['id' => 3, 'message' => 'Nouveau message de Charlie.'],
        ];

        // Retourner la vue avec les notifications
        return inertia('Notifications', [
            'notifications' => $notifications,
        ]);
    }
}