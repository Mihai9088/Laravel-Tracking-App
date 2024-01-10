@if (session('message'))
<div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="alert alert-success bg-green-500 text-white p-4 mb-4 mx-auto max-w-md text-center">
    {{ session('message') }}
</div>
@endif