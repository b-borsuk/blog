@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ _('Publications') }}
                </div>

                @if ($publications->count())
                    <ul class="list-group">
                        @foreach ($publications as $publication)
                            <li class="list-group-item">
                                <h3>
                                    <a href="{{ action('Blog\PublicationsController@view', $publication) }}">
                                        {{ $publication->title }}
                                    </a>
                                    <small>{{ $publication->updated_at }}</small>
                                </h3>
                                {!! $publication->short_description !!} <a href="{{ action('Blog\PublicationsController@view', $publication) }}" class="btn btn-link">{{ _('More...') }}</a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div class="panel-body">
                        <p class="text-center">{{ _('No Publications') }}</p>
                    </div>
                @endif

                <div class="panel-footer">
                    <a href="{{ action('Blog\PublicationsController@index') }}" class="btn btn-link">{{ _('All Publications') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
