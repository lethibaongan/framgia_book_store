@extends('layouts.master-admin1')

@section('page-title')
    {{ trans('admin.list_book_title') }}
@endsection

@section('page-content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{ trans('admin.list_book_title') }}</h2>
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
                    <a class="btn btn-primary">{{ trans('admin.add_book') }}</a>
                    <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                            <thead>
                                <tr class="headings">
                                    <th class="column-title">{{ trans('admin.stt') }}</th>
                                    <th class="column-title">{{ trans('admin.image') }}</th>
                                    <th class="column-title">{{ trans('admin.name') }}</th>
                                    <th class="column-title">{{ trans('admin.author') }}</th>
                                    <th class="column-title">{{ trans('admin.publisher') }}</th>
                                    <th class="column-title">{{ trans('admin.price') }}</th>
                                    <th class="column-title">{{ trans('admin.publish_year') }}</th>
                                    <th class="column-title">{{ trans('admin.quantity') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach($listBook as $book)
                                <tr class="even pointer">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if (file_exists(config('customer.link.book_image').$book->image) && $book->image != '')
                                            <img src="{{ asset(config('customer.link.book_image').$book->image) }}" class="book-image">
                                        @endif
                                    </td>
                                    <td>{{ $book->name }}</td>
                                    <td>{{ $book->author->name }}</td>
                                    <td>{{ $book->publisher->name }}</td>
                                    <td>{{ $book->price }}</td>
                                    <td>{{ $book->publish_year }}</td>
                                    <td>{{ $book->quantity }}</td>
                                    <td>
                                        <a href="#">
                                            <i class="fa fa-info-circle info" aria-hidden="true"></i>&nbsp;
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-pencil-square-o edit" aria-hidden="true"></i>&nbsp;
                                        </a>
                                        <a href="#">
                                        <i class="fa fa-trash delete" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="pag">
                        {{ $listBook->render() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
