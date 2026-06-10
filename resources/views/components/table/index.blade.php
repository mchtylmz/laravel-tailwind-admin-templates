<div {{ $attributes->merge(['class' => 'overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-800']) }}>
    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-800">
        @isset($header)
            <thead class="bg-gray-50 dark:bg-gray-800/50">
                <tr>
                    @foreach($header as $heading)
                        <th scope="col" class="px-4 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ $heading }}</th>
                    @endforeach
                </tr>
            </thead>
        @endisset
        <tbody class="divide-y divide-gray-200 dark:divide-gray-800 bg-white dark:bg-gray-900">
            {{ $slot }}
        </tbody>
    </table>
</div>
