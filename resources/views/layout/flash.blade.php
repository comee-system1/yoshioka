@section('flash')
@if (session('flash_msg'))
<div class="alert alert-success mt-3" role="alert">
    {{ session('flash_msg') }}
</div>
@endif
@if (session('flash_error'))
<div class="alert alert-danger mt-3" role="alert">
    {{ session('flash_error') }}
</div>
@endif

@endsection
