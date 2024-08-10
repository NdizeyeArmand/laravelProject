<?php

namespace App\Http\Controllers;

use App\Models\FaqItem;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function showFAQ()
    {
        $categories = FaqCategory::with('items')->get();
        return view('FAQ', compact('categories'));
    }
}
