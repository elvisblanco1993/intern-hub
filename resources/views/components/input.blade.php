@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-orange-500 focus:ring-orange-100 rounded-md shadow-sm']) !!}>
