<div x-data="chart({ type: '{{ $type ?? 'line' }}', labels: {{ json_encode($labels ?? []) }}, datasets: {{ json_encode($datasets ?? []) }} })"
     {{ $attributes->except(['labels', 'datasets'])->merge(['class' => 'relative']) }}
     x-bind:style="'height: ' + ({{ $height ?? 300 }}) + 'px'">
    <canvas></canvas>
</div>
