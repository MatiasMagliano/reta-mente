<div class="join join-vertical lg:join-horizontal" role="group">
    <a role="button" class="btn btn-sm join-item text-xs" href="{{ route('games.show', $game) }}">{{ __('See') }}</a>

    @if (!$game->status)

        {{-- EDIT GAME --}}
        <a role="button" href="{{ route('games.edit', $game) }}" class="btn btn-sm join-item text-xs">{{ __('Edit') }}</a>

        {{-- DELETE GAME --}}
        <button wire:click.prevent="delete('{{ $game->id }}')" class="btn btn-sm join-item text-xs">{{ __('Delete') }}</button>
    @else

        {{-- DISABLED EDIT GAME --}}
        <button class="btn btn-sm join-item text-xs" style="cursor: not-allowed">{{ __('Edit') }}</button>

        {{-- DISABLED DELETE GAME --}}
        <button class="btn btn-sm join-item text-xs" style="cursor: not-allowed">{{ __('Delete') }}</button>
    @endif
</div>
