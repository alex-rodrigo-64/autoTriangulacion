@extends('layouts.app', ['page' => __('Icons'), 'pageSlug' => 'icons'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Ejemplo de convertir PDF a excel</h5>
                <p class="category">Handcrafted by our friends from
                    <a href="https://nucleoapp.com/?ref=1712">NucleoApp</a>
                </p>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <h3 class="card-title"><i class="tim-icons icon-send text-danger"></i>  Ejemplo ENTEL</h3>
                    <section>
                        <video width="600" height="400" controls preload="auto">
                            <source src="{{ asset('videos/examples/Frontend.mp4') }}" />
                        </video>
                    </section>
                </div>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <h3 class="card-title"><i class="tim-icons icon-send text-info"></i>  Ejemplo TIGO</h3>
                    <section>
                        <video width="600" height="400" controls preload="auto">
                            <source src="{{ asset('videos/examples/Frontend.mp4') }}" />
                        </video>
                    </section>
                </div>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <h3 class="card-title"><i class="tim-icons icon-send text-success"></i>  Ejemplo VIVA</h3>
                    <section>
                        <video width="600" height="400" controls preload="auto">
                            <source src="{{ asset('videos/examples/Frontend.mp4') }}" />
                        </video>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection