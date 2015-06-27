@extends('app')
@section('title')
    Dashboard | Transport Management Software
@stop

@section('content')
@include('_partials.header')
<div id="page-wrapper">
<div class="row">
    <div class="col-lg-12">&nbsp;</div>
</div>
<div class="row">
@include('_partials.flash')
    <div class="col-lg-12">
        Dashboard
    </div>
    </div>
        <!-- /#page-wrapper -->
@stop