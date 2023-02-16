<?php

namespace App\View\Components\Partials\Admin;

use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class Breadcrumb extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $title
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $route = Route::current();
        $currentRoute['name'] = explode('.', $route->getName())[1];
        $currentRoute['url'] = $route->action['as'];
        return view('components.partials.admin.breadcrumb', [
            'currentRoute' => $currentRoute
        ]);
    }
}
