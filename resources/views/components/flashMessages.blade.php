@if (session('message'))
<div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="bg-green-500 text-white p-4 text-center rounded fixed top-[60px] left-1/2 transform -translate-x-1/2  z-5">
    {{ session('message') }}
</div>

@endif
