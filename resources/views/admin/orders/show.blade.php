@extends('adminlte::page')

@section('title', 'Order Detail')

@section('content_header')
    <h1>Order Detail</h1>
@stop
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('layouts/css/style.css') }}" rel="stylesheet">
@stop
@section('content')
    <section class="invoice">
        <div class="row invoice-info">
            <div class="col-sm-6 invoice-col">
                <b>{{ __('order.order_id') }}: </b> {{ $order->id }}<br>
                <b>{{ __('order.order_desc') }}: </b>{{ $order->note }}<br>
                <b>{{ __('order.order_address') }}: </b>{{ $order->address }}<br>
                <b>{{ __('order.order_status') }}: </b>{{ __('order.status.' . $order->status) }}<br>
                <br>
            </div>
            <div class="col-sm-6 invoice-col">
                <b>{{ __('order.customer') }}: </b>{{ $order->name }}<br>
                <b>{{ __('order.phone') }}: </b>{{ $order->phone }}<br>
                <br>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>{{ __('order.order_product_id') }}</th>
                        <th>{{ __('order.order_product_name') }}</th>
                        <th>{{ __('order.order_quantity') }}</th>
                        <th>{{ __('order.order_price') }}</th>
                        <th>{{ __('order.order_subtotal') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($order->products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->pivot->quantity }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->pivot->price }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-6">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th style="width:50%">{{ __('order.order_total') }}:</th>
                            <td>{{ $order->total }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="row no-print">
            <div class="col-xs-12">
                <a href="{{ route('orders.index') }}" class="btn btn-primary pull-right"><i class="fa fa-step-backwardt"></i>{{ __('order.order_back') }} </a>
            </div>
        </div>
    </section>
@stop

@section('js')
    <script src="{{ asset('js/admin_custom.js') }}"></script>
@stop
