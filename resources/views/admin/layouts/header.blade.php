<header>
    <div class="header-content">
        <label for="menu-toggle">
            <span class="las la-bars"></span>
        </label>
        
        <div class="header-menu">
            <div class="user">
                <div class="bg-img" style="background-image: url(https://wonderfulengineering.com/wp-content/uploads/2014/10/image-wallpaper-15-1024x768.jpg)"></div>
   <button>
    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" class=" fs-4 text-white navbar-brand"> {{ __('Logout') }}</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
@csrf
</form></button>      

            </div>
        </div>
    </div>
</header>