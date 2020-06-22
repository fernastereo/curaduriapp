@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
        @if ($imagen)
            <img src="{{ Storage::disk('public')->url($imagen) }}" alt="Curaduría Urbana N° {{ $curaduria }}" srcset="">
        @else
            <h1 style="text-align: center;">CuraduriAPP®</h1>
        @endif
        @endcomponent
    @endslot

    {{-- Body --}}
    {{ $slot }}

    {{-- Subcopy --}}
    @isset($subcopy)
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endisset

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} {{ config('app.name') }} - v 1.0.0. @lang('All rights reserved.')
        @endcomponent
    @endslot
@endcomponent
