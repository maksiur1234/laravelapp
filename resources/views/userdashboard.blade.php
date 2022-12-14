<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard for user') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Witaj!
                </div>
                <div>
                    Twoje wizyty:
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                <tr>
                    <th>ID</th>
                    <th>Pacjent</th>
                    <th>Data wizyty</th>
                    <th>Akcja</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($visits as $item)
                <tr>
                <td>{{ $item->id }} </td>
                <td>{{ $item->doctor }}</td>
                <td>{{ $item->date }}</td>
                <td>
                    <div class="btn-group">
                    <a href="dashboard/delete{{ $item->id }}" class="btn-btn-danger">Usuń</a>
                    <a href="dashboard/edit/{{ $item->id }}" class="btn-btn-primary btn">Edytuj</a><br>
                    </div>
                </td>
                @endforeach
                </tbody>
            </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
