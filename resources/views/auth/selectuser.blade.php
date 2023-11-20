<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Usero Select Kon') }}
        </h2>
    </x-slot>
    <div class="py-12" style="direction:rtl">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="/getjobs" method="post">
                        @csrf
                        @if(\Illuminate\Support\Facades\Auth::user()->user_role == null)
                            <input type="text" name="users" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}" disabled>
                        @else
                            <select name="users" id="users">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        @endif
                        <button type="submit">انتخاب</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
