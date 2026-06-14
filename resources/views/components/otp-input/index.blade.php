<div x-data="otpInput({ length: {{ $length ?? 4 }} })" class="flex gap-2" {{ $attributes }}>
    <template x-for="(_, i) in Array.from({ length })" :key="i">
        <input type="text" inputmode="numeric" maxlength="1"
               x-ref="input_el"
               :value="values[i] || ''"
               @input="handleInput(i, $event)"
               @keydown.backspace="handleBackspace(i)"
               @keydown.arrow-left="$refs.input_el[i - 1]?.focus()"
               @keydown.arrow-right="$refs.input_el[i + 1]?.focus()"
               @focus="$el.select()"
               @paste.prevent="handlePaste($event, i)"
               class="w-10 h-12 text-center text-lg font-semibold border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-colors bg-white dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-gray-900 dark:text-white" />
    </template>
</div>
