<x-layout :title="$title">
    <p>Ini adalah halaman home</p>
    <div class="flex">
        @for ($i = 1; $i <= 10; $i++)
            @if ($i % 2 !== 0)
                <div class="p-3 bg-teal-300 me-1 text-slate-800 text-center">{{ $i }}</div>
            @endif
        @endfor
    </div>
</x-layout>
