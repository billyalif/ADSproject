<x-app-layout title="Users">
    <div class="container">
        <x-card title='Users' teks=''>
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>Divisi</th>
                    <th>Kota</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @if (count($users))
                        @foreach ($users as $key=> $user)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $user['name'] }}</td>
                            <td>{{ $user['divisi'] }}</td>
                            <td>{{ $user['kota'] }}</td>
                            <td>
                                <a href="/users/{{ $user['name'] }}">Lihat</a>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4">
                                <div class='text-center'>
                                    Data not found
                                </div>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </x-card>

        <x-card title='Users' teks=''>
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>Divisi</th>
                    <th>Kota</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @if (count($users))
                        @foreach ($users as $key=> $user)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $user['name'] }}</td>
                            <td>{{ $user['divisi'] }}</td>
                            <td>{{ $user['kota'] }}</td>
                            <td>
                                <a href="/users/{{ $user['name'] }}">Lihat</a>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4">
                                <div class='text-center'>
                                    Data not found
                                </div>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </x-card>
    </div>
</x-app-layout>
