<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EstablishmentCard extends Component
{
    public $name;
    public $description;
    //public $stars;
    public $image;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name = null, $description = null, $image = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->image = $image;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.establishment-card');
    }
}
