@if(session('success') || session('error'))
    <div class="alert alert-{{ session()->has('success')? 'success' : 'danger' }}" role="alert">
        <i class="mdi {{ session('success')? 'mdi mdi-check-all' : 'mdi-block-helper' }} mr-2"></i> {{ session('success') ?? session('error') }}
    </div>
@endif
