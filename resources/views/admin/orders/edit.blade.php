@extends('adminlte::page')

@section('title', 'Edit Order')

@section('content_header')
    <!-- <h1>Create new product</h1> -->
@stop

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit order</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('orders.update', $order->id) }}" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        <div class="box-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="alert alert-success" style="display: none"></div>
                            <div class="alert alert-warning" style="display: none;"></div>
                            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }} ">
                                <label for="{{ $errors->has('description') ? 'inputError' : 'description' }}" class="col-sm-3 control-label">
                                    @if ($errors->has('description'))
                                        <i class="fa fa-times-circle-o"></i>
                                    @endif
                                    {{ __('order.order_desc') }}
                                </label>

                                <div class="col-sm-9">
                                    <input id="description" type="text" class="form-control" id="{{ $errors->has('description') ? 'inputError' : '' }}" name="description" value="{{ $order->description }}" autofocus>

                                    @if ($errors->has('description'))
                                        <span class="help-block">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('address_shipping') ? 'has-error' : '' }} ">
                                <label for="{{ $errors->has('address_shipping') ? 'inputError' : 'address_shipping' }}" class="col-sm-3 control-label">
                                    @if ($errors->has('address_shipping'))
                                        <i class="fa fa-times-circle-o"></i>
                                    @endif
                                    {{ __('order.order_address') }}
                                </label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id=" {{ $errors->has('address_shipping') ? 'inputError' : 'address_shipping' }}" name="address_shipping" value="{{ $order->address_shipping }}">

                                    @if ($errors->has('price'))
                                        <span class="help-block">{{ $errors->first('address_shipping') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }} ">
                                <label for="{{ $errors->has('status') ? 'inputError' : 'status' }}" class="col-sm-3 control-label">
                                    @if ($errors->has('status'))
                                        <i class="fa fa-times-circle-o"></i>
                                    @endif
                                    {{ __('order.order_status') }}
                                </label>

                                <div class="col-sm-9">
                                    <select class="form-control select2" data-placeholder="Select a Status"
                                            style="width: 100%;"id="{{ $errors->has('status') ? 'inputError' : 'status' }}" name="status" value="{{ $order->status }}">
                                        <option value="{{ config('order.pending') }}" <?php if (config('order.pending') == $order->status) echo "selected" ?>>{{ __('order.status.1') }}</option>
                                        <option value="{{ config('order.processing') }}" <?php if (config('order.processing') == $order->status) echo "selected" ?>>{{ __('order.status.2') }}</option>
                                        <option value="{{ config('order.delivered') }}" <?php if (config('order.delivered') == $order->status) echo "selected" ?>>{{ __('order.status.3') }}</option>
                                        <option value="{{ config('order.cancelled') }}" <?php if (config('order.cancelled') == $order->status) echo "selected" ?>>{{ __('order.status.4') }}</option>
                                    </select>

                                    @if ($errors->has('status'))
                                        <span class="help-block">{{ $errors->first('status') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary pull-right">{{ __('order.update') }}</button>
                            </div>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('js/admin_custom.js') }}"></script>
@stop

