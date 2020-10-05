<nav class="bg-blue-700 text-white h-16 flex flex-row justify-start">
    <div class="pl-2 flex flex-col justify-center h-full">
        <a class="text-4xl text-white no-underline font-bold" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
    </div>
    <div class="pl-8 flex flex-col justify-center h-full">
        <ul class="flex flex-row justify-start">
            <li class="px-4">
                <a class="text-white font-bold no-underline hover:underline" href="/posts">Posts</a>
            </li>
        </ul>
    </div>
</nav>
