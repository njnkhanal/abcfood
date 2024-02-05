<!DOCTYPE html>
<html lang="en">
<head>
{{-- head --}}
@include('admin.layouts.head')
</head> 
<body>
   <input type="checkbox" id="menu-toggle">
   {{-- sidebar --}}
   @include('admin.layouts.sidebar')
    
    <div class="main-content">
        
       {{-- header --}}
       @include('admin.layouts.header')
        <main>
            {{-- breadcumb --}}
           
            <div class="page-content">
                @include('admin.layouts.message')
                  <!-- Body contents -->
                  @yield('main-content')
            
            </div>
            
        </main>
        
    </div>
    <script>
        // Hide the success message after 5 seconds (adjust the time as needed)
        $(document).ready(function () {
            setTimeout(function () {
                $('#successMessage').fadeOut('slow');
            }, 5000); // 5000 milliseconds = 5 seconds
        });
    </script>

   
</body>
</html>