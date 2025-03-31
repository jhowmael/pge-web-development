@extends('layouts.app')

@section('content')

    <div class="main-content">
        <div class="row">
            <div class="col-md-3">
                <x-sidebars.administrative-sidebar />
            </div>

            <div class="col-md-9">
                <div class="card mb-12">
                    <div class="card-header text-center">
                        <h4>Dashboard</h4>
                    </div> 
                    <div class="card-body">
                        <p>Nesta seção, você pode acompanhar alguns dados estatísticos e administrativos.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

