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
                    <div class="box-header with-border">
                        <a class="btn btn-primary navbar-btn" {{ $modelItem->isCreatable() ? '' : 'disabled' }} href="{{{ $newEntryRoute }}}"><i class="fa fa-plus"></i> {{{ Lang::get('admin::lang.table.new-entry') }}}</a>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-condensed table-hover" id="dataTable" {!! $modelItem->renderTableAttributes() !!}>
                            <thead>
                            <tr>
                                @foreach ($columns as $column)
                                    {!! $column->renderHeader() !!}
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($rows as $row)
                                <tr>
                                    @foreach ($columns as $column)
                                        {!! $column->render($row, count($rows)) !!}
                                    @endforeach
                                </tr>
                            @endforeach
                            </tbody>
                            @if ($modelItem->isColumnFilter() && ! $modelItem->isAsync())
                                <tfoot>
                                <tr>
                                    @foreach ($columns as $column)
                                        <td></td>
                                    @endforeach
                                </tr>
                                </tfoot>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
	</section>
@stop