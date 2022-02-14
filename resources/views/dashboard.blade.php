@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
<style>
.padre {
    display: flex;
    align-items: center;
}

.hijo {
    line-height: 200px; //Damos 200px de alto para notar el efecto
}
</style>
<div class="form-row text-center">
    <div class="col-12">
    <div class="row">
    <div class="col-lg-4">
        <button type="button" class="btn btn-default">
            <a href="{{url('/viva/register')}}">
                <h3 class="card-title"><i class="tim-icons icon-send text-success"></i>VIVA</h3>
            <img src="{{ asset('images/carrierLogo/viva.png') }}" width="300" height="250"
                class="rounded mx-auto d-block" alt="Responsive image">
            </a>
        </button>
    </div>
    <div class="col-lg-4">
        <button type="button" class="btn btn-default">
            <a href="{{url('/tigo/register')}}">
            <h3 class="card-title"><i class="tim-icons icon-send text-info"></i>TIGO</h3>
            <img src="{{ asset('images/carrierLogo/tigo.jpg') }}" width="300" height="250"
                class="rounded mx-auto d-block" alt="Responsive image">
        </button>
    </div>
    <div class="col-lg-4">
        <button type="button" class="btn btn-default">
            <a href="{{url('/entel/register')}}">
            <h3 class="card-title"><i class="tim-icons icon-send text-danger"></i>ENTEL</h3>
            <img src="{{ asset('images/carrierLogo/entel.jpg') }}" width="300" height="250"
                class="rounded mx-auto d-block" alt="Responsive image">
        </button>
    </div>

</div>
    </div>
 </div>


@endsection

@push('js')
<script src="{{ asset('black') }}/js/plugins/chartjs.min.js"></script>
<script>
$(document).ready(function() {
    demo.initDashboardPageCharts();
});
</script>
@endpush