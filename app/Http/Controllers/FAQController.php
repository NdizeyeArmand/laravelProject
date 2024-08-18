<?php

namespace App\Http\Controllers;

use App\Models\FaqItem;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function showFAQ()
    {
        $categories = FaqCategory::with('items')->orderBy('created_at', 'desc')->get();
        return view('FAQ', compact('categories'));
    }

    public function addCategory(Request $request)
    {
        $this->authorize('manage-faq');

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = FaqCategory::create($validatedData);

        return redirect()->route('FAQ')->with('success', 'Category added successfully');
    }

    public function editCategory(Request $request, FaqCategory $category)
    {
        $this->authorize('manage-faq');

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update($validatedData);

        return redirect()->route('FAQ')->with('success', 'Category updated successfully');
    }

    public function deleteCategory(FaqCategory $category)
    {
        $this->authorize('manage-faq');

        $category->delete();

        return redirect()->route('FAQ')->with('success', 'Category deleted successfully');
    }

    public function addItem(Request $request)
    {
        $this->authorize('manage-faq');

        $validatedData = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'category_id' => 'required|exists:faq_categories,id',
        ]);

        $item = FaqItem::create($validatedData);

        return redirect()->route('FAQ')->with('success', 'Item added successfully');
    }

    public function editItem(Request $request, FaqItem $item)
    {
        $this->authorize('manage-faq');

        $validatedData = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'category_id' => 'required|exists:faq_categories,id',
        ]);

        $item->update($validatedData);

        return redirect()->route('FAQ')->with('success', 'Item updated successfully');
    }

    public function deleteItem(FaqItem $item)
    {
        $this->authorize('manage-faq');

        $item->delete();

        return redirect()->route('FAQ')->with('success', 'Item deleted successfully');
    }
}
