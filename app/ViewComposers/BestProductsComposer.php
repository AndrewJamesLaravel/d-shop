<?php

namespace App\ViewComposers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\View\View;

class BestProductsComposer
{
    public function compose(View $view)
    {
        $bestProductIds = Order::get()->map->skus->flatten()->map->pivot->mapToGroups(function ($pivot) {
            return [$pivot->skus_id => $pivot->count];
        })->map->sum()->sortByDesc(null)->take(3)->keys()->toArray();

        $bestProducts = Product::whereIn('id', $bestProductIds)->get();
        $view->with('bestProducts', $bestProducts);
    }
}