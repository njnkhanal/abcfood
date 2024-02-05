<div class="sidebar">
    {{-- <div class="side-header">
        <h3>L<span>ogo</span></h3>
    </div> --}}
    
    <div class="side-content">

        <div class="side-menu">
            <ul>
                <li>
                    
                    <a style="text-decoration: none;" href="{{ route('admin.dashboard') }}"
                        class="{{ Route::current()->getName() == 'admin.dashboard' ? 'active' : '' }}">
                        <span class="las la-home"></span>
                        <small>  Dashboard</small>
                    </a>
                </li>
                <li>
                    <a style="text-decoration: none;" href="{{ route('user.index') }}"
                        class="{{ Route::current()->getName() == 'user.index' ? 'active' : '' }}">
                        <span class="las la-users"></span>
                        <small>Users</small>
                    </a>
                </li>
                <li>
                   <a style="text-decoration: none;" href="{{route('category')}}">
                        <span class="las la-utensils"></span>
                        <small>Categories</small>
                    </a>
                </li>
                <li>
                   <a style="text-decoration: none;" href="{{ route('food.index') }}">
                        <span class="las la-hamburger"></span>
                        <small>FoodItems</small>
                    </a>
                </li>
                <li>
                    <a style="text-decoration: none;" href="">
                         <span class="las la-shopping-cart"></span>
                         <small>Active Orders</small>
                     </a>
                 </li>
                <li>
                   <a style="text-decoration: none;" href="">
                        <span class="las la-shopping-cart"></span>
                        <small>Orders</small>
                    </a>
                </li>
                     <li>
                        <a style="text-decoration: none;" href="">
                             <span class="las la-comment"></span>
                             <small>Messages</small>
                         </a>
                     </li>
                     
                    <li>
                        <a style="text-decoration: none;" href="">
                             <span class="las la-user-alt"></span>
                             <small>Profile</small>
                         </a>
                     </li>
            </ul>
        </div>
    </div>
</div>
