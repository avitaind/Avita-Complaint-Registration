@if (session('success'))
    <div class="alert alert-success d-flex align-items-center">
        <i class="fa fa-check-circle-o fa-2x" aria-hidden="true"></i>  {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i>  {{ session('error') }}
    </div>
@endif

@if (session('warning'))
    <div class="alert alert-warning d-flex align-items-center">
        <i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i>  {{ session('warning') }}
    </div>
@endif

{{-- @if (session('success'))
    <div class="alert alert-primary d-flex align-items-center">
        <i class="fa fa-info-circle fa-2x" aria-hidden="true"></i> {{ session('success') }}
    </div>
@endif --}}

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
