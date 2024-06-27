<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary w-md waves-effect waves-light']) }}>
    {{ $slot }}
</button>
