<div class="flex flex-col mt-4">
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
    <table class="table-auto w-full">
        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
            <tr>
                <th class="px-4 py-2">{{ __('Name') }}</th>
                <th class="px-4 py-2">{{ __('Game code') }}</th>
                <th class="px-4 py-2">{{ __('Status') }}</th>
                <th class="px-4 py-2">{{ __('Actions') }}</th>
            </tr>
        </thead>
        <tbody class="text-sm divide-y divide-gray-100">
            @forelse ($games as $game)
                <tr>
                    <td class="border px-4 py-2">{{ $game->name }}</td>
                    <td class="border px-4 py-2 text-center">{{ $game->game_code }}</td>
                    <td class="border px-4 py-2 text-center">desactivado</td>
                    <td class="border px-4 py-4" style="width: 260px">
                        <a href="{{ route('games.show', $game) }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ __('See') }}</a>
                        <a href="{{ route('games.edit', $game) }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ __('Edit') }}</a>
                        <a role="button" wire:click.prevent="delete('{{ $game->id }}')"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">{{ __('Delete') }}</a>
                    </td>
                </tr>
            @empty
                <tr class="bg-red-400 text-white text-center">
                    <td colspan="4" class="border px-4 py-2">{{ __('There is no games to show') }}</td>
                </tr>
            @endforelse
        </tbody>
        @if ($games->hasPages())
            <tfoot class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                <tr>
                    <td colspan="4" class="border px-4 py-2">
                        {{ $games->links() }}
                    </td>
                </tr>
            </tfoot>
        @endif
    </table>
</div>
