@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ _('Publications') }}
                    <div class="pull-right"><a href="{{ action('Control\PublicationsController@add') }}" class="btn btn-xs btn-success">{{ _('New Publication') }}</a></div>
                </div>

                @if ($publications->count())
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ _('Title') }}</th>
                                    <th>{{ _('Short Description') }}</th>
                                    <th>{{ _('Description') }}</th>
                                    <th>{{ _('Author') }}</th>
                                    <th>{{ _('Created At') }}</th>
                                    <th>{{ _('Updated At') }}</th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($publications as $publication)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration + $publications->perPage() * ( $publications->currentPage() - 1) }}
                                        </td>
                                        <td>
                                            <a href="{{ action('Control\PublicationsController@edit', $publication) }}" class="btn btn-link">{{ $publication->title }}</a>
                                        </td>
                                        <td>{{ Illuminate\Support\Str::limit($publication->short_description, 200) }}</td>
                                        <td>{{ Illuminate\Support\Str::limit($publication->description, 200) }}</td>
                                        <td>
                                            {{ $publication->author->name }}
                                        </td>
                                        <td>{{ $publication->created_at }}</td>
                                        <td>{{ $publication->updated_at }}</td>
                                        <td><a href="{{ action('Control\PublicationsController@edit', $publication) }}" class="btn btn-sm btn-primary">{{ ('Edit') }}</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="panel-body">
                        <p class="text-center">{{ _('No Publications') }}</p>
                    </div>
                @endif
            </div>
        </div>

        {{ $publications->render() }}
    </div>
@endsection
