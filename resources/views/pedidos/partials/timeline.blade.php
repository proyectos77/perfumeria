@php
    $completedStates = $pedido->estados->keyBy('estado');
@endphp

<div class="order-timeline">
    @foreach(\App\Models\Pedido::estadosFlujo() as $estado => $label)
        @php
            $activity = $completedStates->get($estado);
            $isCurrent = $pedido->estado === $estado;
            $isDone = filled($activity);
        @endphp
        <div class="order-timeline__item {{ $isDone ? 'is-done' : '' }} {{ $isCurrent ? 'is-current' : '' }}">
            <div class="order-timeline__marker">
                <i class="bi {{ $isDone ? 'bi-check-lg' : 'bi-circle' }}"></i>
            </div>
            <div>
                <strong>{{ $label }}</strong>
                @if($activity)
                    <span>{{ $activity->created_at->format('d/m/Y H:i') }}</span>
                    @if($activity->descripcion)
                        <small>{{ $activity->descripcion }}</small>
                    @endif
                @else
                    <span>Pendiente</span>
                @endif
            </div>
        </div>
    @endforeach

    @if($pedido->estado === \App\Models\Pedido::ESTADO_CANCELADO)
        @php $cancelado = $completedStates->get(\App\Models\Pedido::ESTADO_CANCELADO); @endphp
        <div class="order-timeline__item is-cancelled is-done">
            <div class="order-timeline__marker">
                <i class="bi bi-x-lg"></i>
            </div>
            <div>
                <strong>Pedido cancelado</strong>
                <span>{{ optional($cancelado?->created_at)->format('d/m/Y H:i') }}</span>
                <small>{{ $cancelado?->descripcion }}</small>
            </div>
        </div>
    @endif
</div>
