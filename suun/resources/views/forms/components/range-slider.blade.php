<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div x-data="{ state: $wire.$entangle('{{ $getStatePath() }}') }">
        <input x-model="content" /><div>
            {{ $getRecord()->name }}
        </div>
    </div>
</x-dynamic-component>
