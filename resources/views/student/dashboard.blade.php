@extends('layouts.backend.master')
@section('title',' Student Dashboard')

@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h2>DASHBOARD</h2>
        </div>
        <!-- Widgets -->
        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-pink hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">playlist_add_check</i>
                    </div>
                    <div class="content">
                        <div class="text">TOTAL POSTS</div>
                        <div class="number count-to" data-from="0" data-to="" data-speed="15" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
     <!-- Jquery CountTo Plugin Js -->
    <script src="{{asset('admin/plugins/jquery-countto/jquery.countTo.js')}}"></script>
    <script src="{{asset('admin/js/pages/index.js')}}"></script>
@endpush

