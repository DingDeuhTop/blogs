<x-layout>
    <x-setting :heading="'Edit Post: ' . $post->title">
        <form action="/admin/posts/{{$post->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <x-form.input name='title' :value="old('title', $post->title)" />
            <x-form.input name='slug' :value="old('slug', $post->slug)" />
                <div>
                    <x-form.input name='thumbnail' type='file' :value="old('title', $post->title)" />
                    <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl mb-5" width="200px">
                </div>
            <x-form.textarea name='excerpt'>{{ old('excerpt', $post->excerpt) }}</x-form.textarea>
            <x-form.textarea name='body'>{{ old('body', $post->body) }}</x-form.textarea>




            <div class="mb-6">
                <x-form.label name="category" />

                <select name="category_id" id="category">

                    @foreach (\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                            {{ ucwords($category->name) }}</option>
                    @endforeach

                </select>

                <x-form.error name="category" />
            </div>

            <x-submit-button>Update</x-submit-button>
        </form>
    </x-setting>

</x-layout>
