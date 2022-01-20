<!-- Success Message -->
@if (Session::has('success'))
<div class="alert alert-success alert-dismissible" role="test">
    <button type="button" class="btn-close btn-close-white" data-dismiss="test" aria-label="Close"></button>
    <strong>Success!</strong> {{ Session::get('success') }}
</div>
@endif

<!-- Fail Message -->
@if (Session::has('error'))
<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>Fail!</strong> {{ Session::get('error') }}
</div>
@endif
