

<nav class=" bg-white shadow md:flex md:items-center md:justify-between">
    <div class="flex justify-between items-center">
        <a href="/" class="  mx-2 md:mx-4 my-3 md:my-0 cursor-pointer">
            <img class="w-[130px]" src="{{ asset('images/logo.png') }}" alt="">
        </a>

        <span class="text-xl md:text-3xl cursor-pointer mx-2 md:hidden block">
            <i class="fas fa-bars mx-2 md:mx-4 my-3 md:my-0"" name="menu" onclick="Menu(this)"></i>
        </span>
    </div>

    <ul class="md:flex md:items-center z-[-1] md:z-auto md:static absolute bg-white w-full left-0 md:w-auto md:py-0 py-2 md:pl-0 pl-4 md:opacity-100 opacity-0 top-[-400px] transition-all ease-in duration-500">
       


@auth

<li class="mx-2 md:mx-4 my-3 md:my-0">
    <span class="font-bold uppercase">Welcome {{auth()->user()->name}}</span>
</li>
<li class="mx-2 md:mx-4 my-3 md:my-0">
    <a href="/" class="text-sm md:text-sm hover:text-[#fdba74] duration-500">HOME</a>
</li>

        <li class="mx-2 md:mx-4 my-3 md:my-0">
            <a href="/timesheets" class="hover:text-laravel"
                ><i class="fa-solid fa-gear"></i> <span class="hover:text-[#737373] duration-500">Manage TimeSheets</span></a
            >
        </li>
        


        <li>
            <form action="/logout" method="POST" class="inline mr-4">
                @csrf
                <button type="submit">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i> <span class="hover:text-[#737373] duration-500">Logout</span>
                </button>
        </li>
@else


        <li class="mx-2 md:mx-4 my-3 md:my-0">
            <a href="/register" class="hover:text-laravel"
                ><i class="fa-solid fa-user-plus"></i> <span class="hover:text-[#737373] duration-500">Register</span></a
            >
        </li>
        <li class="mx-2 md:mx-4 my-3 md:my-0">
            <a href="/login" class="hover:text-laravel"
                ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                <span class="hover:text-[#737373] duration-500">Login</span></a
            >
        </li>
    @endauth
    </ul>
</nav>

<script>
    function Menu(e) {
        let list = document.querySelector('ul');
        let icon = document.querySelector('i.fas');

        if (e.name === 'menu') {
            e.name = "close";
            list.classList.add('top-[80px]');
            list.classList.add('opacity-100');
            icon.classList.remove('fa-bars');
            icon.classList.add('fa-times');
        } else {
            e.name = "menu";
            list.classList.remove('top-[80px]');
            list.classList.remove('opacity-100');
            icon.classList.remove('fa-times');
            icon.classList.add('fa-bars');
        }
    }
</script>
