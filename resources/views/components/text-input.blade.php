@props(['disabled' => false])

<input 
    @disabled($disabled)
    {{ $attributes->merge([
        'class' => 
            'border-gray-600 bg-white/10 text-white placeholder-gray-400 
             rounded-lg shadow-sm
             focus:border-blue-500 focus:ring-blue-500'
    ]) }}
>
