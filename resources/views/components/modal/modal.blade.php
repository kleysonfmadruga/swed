
<div class="modal-box hidden modal-{{ $classAbrirModal }}" modal-area="modal-{{ $classAbrirModal }}">
    <div class="modal modal-{{$tamanhoModal ?? 'md'}}" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-text-bold-600" id="cal-modal">{{$titleModal ?? ''}}</h4>
                <button type="button" class="close" close-modal="modal-{{ $classAbrirModal }}"  aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ $routeFormAction ?? '' }}" method="post" id="{{$formId ?? 'targetForm'}}">
                @csrf
                <div class="modal-body">
                    {{$slot}}
                </div>
                <div class="modal-footer">
                    <button type="submit" class="botao_acoes d-none btn btn-primary cal-add-event waves-effect waves-light">Salvar</button>
                    <button type="button" class="botao_acoes d-none btn btn-flat-danger cancel-event waves-effect waves-light" close-modal="modal-{{ $classAbrirModal }}">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>