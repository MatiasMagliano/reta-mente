<div>
    <div class="flex bg-white px-4 py-3 sm:px-6">
        <input wire:model="search_terms" class="form-input rounded-md shadow-sm mt-1 w-full"
            placeholder="{{ __('Search terms...') }}" type="text">

        <select wire:model="page_length"
            class="form-input rounded-md shadow-sm mt-1 ml-6 outline-none text-gray-500 text-sm">
            <option value="5">5 {{ __('per page') }}</option>
            <option value="25">25 {{ __('per page') }}</option>
            <option value="50">50 {{ __('per page') }}</option>
            <option value="100">100 {{ __('per page') }}</option>
        </select>
        <button wire:click="clear" class="form-input rounded-md shadow-sm mt-1 outline-none text-gray-500">X</button>
    </div>

    <div class="grid sm:flex sm:flex-col">
        @foreach ($games as $game)
            <div class="stats shadow m-3">
                <div class="stat">
                    <div class="stat-title">{{ $game->name }}</div>
                    <div class="stat-value">{{ $game->game_code }}</div>
                    <div class="stat-actions">
                        @if ($game->status)
                            <button class="btn btn-sm btn-error">{{ __('Stop') }}</button>
                        @else
                            <button class="btn btn-sm btn-success">{{ __('Play') }}</button>
                        @endif
                    </div>
                </div>

                <div class="stat">
                    <div class="stat-title">{{ __('Actions') }}</div>
                    <div class="stat-actions">
                        @include('partials.game-actions', ['game' => $game])
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div>
        @if ($games->hasPages())
            <div>
                {{ $games->links() }}
            </div>
        @endif
    </div>
</div>
