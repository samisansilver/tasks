<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kar Betarash Bara Vahed') }}
        </h2>
    </x-slot>
    <div class="py-12" style="direction:rtl">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 style="direction: rtl">
                    <form action="/submitjob" method="post" style="padding:40px;margin:40px">
                        @csrf
                        <label>عنوان</label>
                        <input type="text" name="title" value=""><br>
                        <label>توضیحات</label>
                        <input style="width: 100%; border: 1px solid black; height: 200px;" type="textarea" name="description" value=""><br>
                        @if(\Illuminate\Support\Facades\Auth::user()->user_role == null)
                            <input type="text" name="user" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}" hidden=""><br>
                        @else
                            <label>انتخاب کاربر</label>
                            <select type="text" name="user" id="user">
                                {{ $users = \App\Models\User::all() }}
                                @foreach($users as $user)
                                    <option type="text" name="user" value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        @endif
                        <button>ارسال</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
