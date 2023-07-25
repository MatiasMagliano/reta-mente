<div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
    @foreach($available_locales as $locale_name => $available_locale)
        @if($available_locale === $current_locale)
            <x-dropdown-element>
                {{ $locale_name }}
            </x-dropdown-element>
        @else
            <x-dropdown-link href="language/{{ $available_locale }}">
                {{ $locale_name }}
            </x-dropdown-link>
        @endif
    @endforeach
</div>
