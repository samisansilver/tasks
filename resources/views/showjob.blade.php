<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Karato Negah Kon') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table style="width: 100%">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>title</th>
                            <th>description</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($getuserjobs as $getuserjob)
                            <tr>
                                <td>{{ $getuserjob->id }}</td>
                                @if($getuserjob->status == 1)
                                    <td style="color: red">{{ $getuserjob->title }}</td>
                                @else
                                    <td style="color: green">{{ $getuserjob->title }}</td>
                                @endif
                                <td>{{ $getuserjob->description }}</td>
                                <td>
                                    @if(\Illuminate\Support\Facades\Auth::user()->user_role == 1 )
                                    <form action="/delete/{{ $getuserjob->id }}" method="post">
                                        @csrf
                                        <button style="background: red;color: white" type="submit">Delete</button>
                                    </form>
                                </td>
                                   @endif
                                <td>
                                    <form action="/update/{{ $getuserjob->id }}" method="post">
                                        @csrf
                                        <button style="background: yellow;" type="submit">Done</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
