<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ModalShow extends Component
{
    public $classAbrirModal;
    public $tamanhoModal;
    public $titleModal;
    public $modalId;
    public function __construct(
        $classAbrirModal = null, $tamanhoModal = null, $titleModal = null, $modalId = null
    )
    {
        $this->classAbrirModal = $classAbrirModal;
        $this->tamanhoModal = $tamanhoModal;
        $this->titleModal = $titleModal;
        $this->modalId = $modalId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.modal_show.modal_show');
    }
}
