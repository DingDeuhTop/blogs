<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 ">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Log In</h1>
                <form method="POST" action="/login" class="mt-10">
                    @csrf
                    <x-form.input name="email" type="email" autocomplete="email" />
                    <x-form.input name="password" type="password" autocomplete="new-password" />

                    <div class="mb-6">
                        <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                            Log In
                        </button>
                    </div>
            </x-panel>


            {{-- @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif --}}
            </form>
        </main>
    </section>
</x-layout>
