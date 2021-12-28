<?php

namespace App\View\Components;

use Illuminate\View\Component;

class show extends Component
{
    private $socials;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($socials)
    {
        $this->socials=$socials;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.show');
    }
}
