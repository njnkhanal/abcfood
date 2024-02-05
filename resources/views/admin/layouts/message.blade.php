
@if (session('success'))
    <div class="custom-alert alert alert-success "  id="successMessage" role="alert">
        <strong>{{ session('success') }}</strong>
    </div>
    
    
@endif
@if (session('error'))
    <div class="alert alert-danger" id="successMessage" role="alert">
        <strong>{{ session('error') }}</strong>
    </div>
@endif