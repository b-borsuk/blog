@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ _('Publication') }}
                    @if (Auth::check())
                        <div class="pull-right"><a href="{{ action('Control\PublicationsController@edit', $publication) }}" class="btn btn-xs btn-default">{{ _('Edit') }}</a></div>
                    @endif
                </div>

                <div class="panel-body">
                    <div class="text-center"><h1>{{ $publication->title }}</h1></div>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            {!! $publication->description !!}
                        </div>
                    </div>
                </div>

                <div class="panel-footer">
                    <a href="{{ action('Blog\PublicationsController@index') }}" class="btn btn-link">{{ _('All Publications') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('latex')
    <script src="//cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-MML-AM_CHTML&locale=ru"></script>

    <script type="text/x-mathjax-config">
        MathJax.Hub.Config(
            {
                tex2jax: {
                    inlineMath: [
                        [
                            '$tex',
                            '$'
                        ]
                    ],
                    displayMath: [
                        [
                            '$$tex',
                            '$$'
                        ]
                    ]
                },
                asciimath2jax: {
                    delimiters: [
                        [
                            '$asc',
                            '$'
                        ]
                    ]
                }
            }
        );
    </script>
@endsection
