<nav class="bg-blue-700 text-white h-32">
    <div class="w-2/3 m-auto flex flex-row justify-start h-full">
        <div class="flex flex-col justify-center h-full">
            <a class="text-4xl text-white no-underline font-bold" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>
        <div class="pl-16 flex flex-col justify-center h-full">
            <ul class="flex flex-row justify-start unlist">
                <li class="px-4">
                    <a class="text-white font-bold no-underline hover:underline" href="/posts">Posts</a>
                </li>
                <li class="px-4">
                    <a class="text-white font-bold no-underline hover:underline" href="/about">About</a>
                </li>
                <li class="px-4">
                    <a class="text-white font-bold no-underline hover:underline" href="/tech">Tech</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
