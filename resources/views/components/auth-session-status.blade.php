@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-complementary dark:text-green-400']) }}>
        {{ $status }}
    </div>
@endif
