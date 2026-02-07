<?php

namespace App\Http\Controllers;

use App\Models\GiftCard;

class GiftCardController extends Controller
{
    public function index()
    {
        $giftcards = GiftCard::where('ativo', true)->get();

        return view('giftcards.index', compact('giftcards'));
    }
}
