<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterProvidersRequest;
use App\Models\Provider;
use App\Models\Category;
use Inertia\Inertia;

class ProviderController extends Controller
{
    public function index(FilterProvidersRequest $request)
    {
        $categoryId = $request->query('category');


        $query = Provider::with('category');

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        $providers = $query->paginate(10)->withQueryString();
        $categories = Category::orderBy('name')->limit(10)->get();

        return Inertia::render('Providers/Index', [
            'providers' => $providers,
            'categories' => $categories,
            'filters' => ['category' => $categoryId ?: ''],
        ]);
    }



    public function show($id)
    {
        $provider = Provider::with('category')->findOrFail($id);
        return Inertia::render('Providers/Show', [
            'provider' => $provider,
        ]);
    }
}
