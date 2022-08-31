@auth
    <x-panel>
        <form method="POST" action="/posts/{{ $post->slug }}/comments">
            @csrf

            <header class="flex items-center">
                <img src="https://i.pravatar.cc/100?u={{ auth()->id() }}" alt="" class="rounded-full">
                <h2 class="ml-4">want to participate</h2>
            </header>
            <div class="mt-6">
                <textarea name="body" class="w-full text-sm focus:outline-none focus:ring" cols="30" rows="5" placeholder="Comment..." required></textarea>
                @error('body')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
                <x-submit-button>Post</x-submit-button>
            </div>
        </form>
    </x-panel>
@else
    <p class="text-red-500">
        <a href="/register" class="hover:underline ">Register</a> or <a href="/login" class="hover:underline "> Log In</a> to
        leave a comment.
    </p>
@endauth
