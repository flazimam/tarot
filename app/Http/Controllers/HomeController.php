<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\TarotCard;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::where('is_active', true)->orderBy('sort_order')->get();
        $cards = TarotCard::orderBy('sort_order')
            ->get(['name', 'number', 'arcana', 'keywords', 'upright', 'reversed']);
        $telegram = 'https://t.me/' . config('tarot.telegram_username');

        return view('home', compact('services', 'cards', 'telegram'));
    }
}
