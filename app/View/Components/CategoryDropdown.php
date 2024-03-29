<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\category;

class CategoryDropdown extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        return view('components.category-dropdown',[
            'categories'=>category::all(),
            'currentCategory'=>category::firstWhere('slug',request('category'))
        ]);
    }
}
