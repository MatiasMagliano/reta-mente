<div>
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
</div>
