@extends('adminlte::_layout.inner')

@section('innerContent')
    <section class="content-header">
        <h1>
            {{{ $title }}}
            @if(isset($subtitle))
                <small>{{{ $subtitle }}}</small>
            @endif
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">{{{ $title }}}</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        {!! $form->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop