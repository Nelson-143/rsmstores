<x-filament::widget>
    <x-filament::card>
        <h2 class="text-lg font-bold">User Statistics</h2>
        <ul>
            <li>Total Users: {{ $total }}</li>
            <li>Active Users: {{ $active }}</li>
            <li>Inactive Users: {{ $inactive }}</li>
        </ul>
    </x-filament::card>
</x-filament::widget>
