<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EstablishmentCard extends Component
{
    public $name;
    public $description;
    public $route;
    public $image;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name = null, $description = null, $image = null, $route = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->image = $image;
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.cards.establishment-card');
    }
}
