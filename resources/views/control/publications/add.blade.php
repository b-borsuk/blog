@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ _('New Publication') }}
                    <div class="pull-right"><a href="{{ action('Control\PublicationsController@index') }}" class="btn btn-xs btn-default">{{ _('Cancel') }}</a></div>
                </div>

                <div class="panel-body">
                    {{ Form::open(['class' => 'form-horizontal']) }}

                        @include('control.publications.includes.form')


                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-3">
                                <button type="submit" class="btn btn-success">{{ _('Create') }}</button>
                                <a href="{{ action('Control\PublicationsController@index') }}" class="btn btn-default">{{ _('Cancel') }}</a>
                            </div>
                        </div>

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
