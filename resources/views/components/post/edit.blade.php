<!-- Modal content -->
<div class="w-3xl rounded-md sm:p-5">
    <!-- Modal header -->
    <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Edit Post</h3>
    </div>
    <!-- Modal body -->
    <form action="/dashboard/{{ $post->slug }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mb-4">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
            <input type="text" name="title" id="name" value="{{ old('title') ?? $post->title }}"
                class="@error('title') bg-red-100 border border-red-subtle focus:ring-red-400 focus:border-red-400 placeholder:text-fg-danger-strong text-fg-danger-strong @enderror  border border-gray-300 text-gray-900 text-sm rounded-md  block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 focus:ring-primary-600 focus:border-primary-600"
                placeholder="Type blog title" autocomplete="off" autofocus>
            @error('title')
                <p class="mt-1 text-xs text-fg-danger-strong"><span class="font-xs">{{ $message }}
                </p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
            <select id="category" name="category_id"
                class="@error('title') bg-red-100 border border-red-subtle focus:ring-red-400 focus:border-red-400 placeholder:text-fg-danger-strong text-fg-danger-strong @enderror border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                <option selected="" value="">Select category</option>
                @foreach (App\Models\Category::get() as $category)
                    <option value="{{ $category->id }}" @selected((old('category_id') ?? $post->category->id) == $category->id)>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <p class="mt-1 text-xs text-fg-danger-strong"><span class="font-xs">{{ $message }}
                </p>
            @enderror
        </div>
        <div class="sm:col-span-2 mb-5"><label for="description"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body</label>
            <textarea id="description" rows="4"
                class="@error('title') bg-red-100 border border-red-subtle focus:ring-red-400 focus:border-red-400 placeholder:text-fg-danger-strong text-fg-danger-strong @enderror block p-2.5 w-full text-sm text-gray-900  rounded-md border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Write blog body here..." name="body">{{ old('body') ?? $post->body }}</textarea>
            @error('body')
                <p class="mt-1 text-xs text-fg-danger-strong"><span class="font-xs">{{ $message }}
                </p>
            @enderror
        </div>

        <div class="flex gap-4">
            <button type="submit"
                class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-md text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                Update Blog
            </button>
            <a href="/dashboard"
                class="inline-flex items-center text-white bg-yellow-600 hover:bg-yellow-700 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-md text-sm px-5 py-2.5 text-center dark:bg-yellow-500 dark:hover:bg-yellow-600 dark:focus:ring-yellow-500">
                Cancel
            </a>
        </div>
    </form>
</div>
