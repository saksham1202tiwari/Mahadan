@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="container">
        <div class="row">
            <div class="col-md-12 py-2 d-flex align-items-center justify-content-between">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fa fa-calendar"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Events</span>
                        <span class="info-box-number">{{ $total_events }}</span>
                    </div>
                </div>
                &nbsp;
                &nbsp;
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fa fa-info"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Donations</span>
                        <span class="info-box-number">{{ $total_donations }}</span>
                    </div>

                </div>
                &nbsp;
                &nbsp;
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fa fa-money-bill"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Money Raised</span>
                        <span class="info-box-number">{{ $total_money_raised }}</span>
                    </div>
                </div>
                &nbsp;
                &nbsp;
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fa fa-blog"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Blogs</span>
                        <span class="info-box-number">{{ $total_blogs }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row py-2">
            <div class="col-md-6">
                {!! $chart1->renderHtml() !!}
            </div>
            <div class="col-md-6">
                {!! $chart2->renderHtml() !!}
            </div>
        </div>
    </div>
@stop

@section('content')

@stop


@section('js')
    {!! $chart1->renderChartJsLibrary() !!}
    {!! $chart1->renderJs() !!}
    {!! $chart2->renderJs() !!}

@stop
