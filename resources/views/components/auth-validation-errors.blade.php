@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-medium text-danger">
            {{ __('Whoops! Something went wrong.') }}
        </div>

        <ul class="mt-3 text-sm text-danger list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
