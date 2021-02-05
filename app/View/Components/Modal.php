<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    public $classAbrirModal;
    public $tamanhoModal;
    public $titleModal;
    public $routeFormAction;
    public $formId;
    public function __construct($classAbrirModal = null,
    $tamanhoModal = null,$titleModal = null, $routeFormAction = null, $formId = null)
    {
        $this->classAbrirModal = $classAbrirModal;
        $this->tamanhoModal = $tamanhoModal;
        $this->titleModal = $titleModal;
        $this->routeFormAction = $routeFormAction;
        $this->formId = $formId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.modal.modal');
    }
}
