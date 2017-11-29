@extends('layouts.master-admin1')

@section('page-title')
    {{ trans('admin.list_book_title') }}
@endsection

@section('page-content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{ trans('admin.list_slide_title') }}</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">{{ trans('admin.setting1') }}</a></li>
                                <li><a href="#">{{ trans('admin.setting2') }}</a></li>        
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <a class="btn btn-primary" href="{{ route('admin.slide.create') }}">{{ trans('admin.add_slide') }}</a>
                    <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                            <thead>
                                <tr class="headings">
                                    <th class="column-title">{{ trans('admin.stt') }}</th>
                                    <th class="column-title">{{ trans('admin.image') }}</th>
                                    <th class="column-title">{{ trans('admin.name') }}</th>
                                    <th class="column-title">{{ trans('admin.description') }}</th>
                                    <th class="column-title">{{ trans('admin.link') }}</th>
                                    <th class="column-title">{{ trans('admin.status') }}</th>
                                    <th class="col-md-1"></th>
                                    <th class="col-md-1"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($listSlide->total())
                            	    @foreach($listSlide as $slide)
                                        <tr class="even pointer">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @if ($slide->image_path != '')
                                                    <img src="{{ asset(config('customer.image_path.slides').$slide->image_path) }}" class="book-image">
                                                @endif
                                            </td>
                                            <td>{{ $slide->name }}</td>
                                            <td>{{ $slide->description }}</td>
                                            <td>{{ $slide->link }}</td>
                                            <td>{{ ($slide->status == config('customer.show')) ? trans('admin.show') : trans('admin.hide') }}</td>
                                            <td>
                                                {{ Form::open([
                                                    'method' => 'GET',
                                                    'route' => ['admin.slide.edit', $slide->id]
                                                    ])
                                                }}
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fa fa-btn fa-pencil-square-o"></i> &nbsp; {{ trans('admin.edit') }}
                                                    </button>
                                                    </a>
                                                {{ Form::close() }}
                                            </td>
                                            <td>
                                                {{ Form::open([
                                                    'method' => 'DELETE',
                                                    'route' => ['admin.slide.destroy', $slide->id]
                                                    ])
                                                }}
                                                    <button onclick="window.confirm('{{ trans('admin.confirm_delete_slide') }}')" type="submit" class="btn btn-danger">
                                                        <i class="fa fa-btn fa-trash"></i>&nbsp; {{ trans('admin.delete') }}
                                                   </button>
                                                {{ Form::close() }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="pag">
                        @if ($listSlide->total())
                            {{ $listSlide->render() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
