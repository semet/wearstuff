<?php

namespace App\View\Components\Shared;

use App\Models\Province;
use Illuminate\View\Component;

class CreateAddress extends Component
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
        $provinces = Province::orderBy('province')->get();
        return view('components.shared.create-address', [
            'provinces' => $provinces
        ]);
    }
}
