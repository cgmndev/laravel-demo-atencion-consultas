<div class="flex flex-row">
    <button
        onclick="Livewire.dispatch('openModal', { component: 'modal-asignar-operador', arguments: { consulta: {{ $value->id }} }})"
        class="ml-3 px-2 py-1 bg-slate-200 bg-opacity-75 hover:bg-opacity-70 hover:bg-slate-300 text-xs text-slate-600 rounded ">Asignar
        Operador</button>
</div>
