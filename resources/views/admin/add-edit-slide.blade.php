@extends('layouts.master-admin1')

@section('page-title')
    {{ trans('admin.add_slide') }}
@endsection

@section('css')
    {{ Html::style('assets/iCheck/skins/flat/green.css') }}
@endsection

@section('script_header')
    {{ Html::script('assets/ckeditor/ckeditor.js') }}
@endsection

@section('page-content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{ trans('admin.add_slide') }}</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">{{ trans('admin.setting1') }}</a></li>
                                <li><a href="#">{{ trans('admin.setting1') }}</a></li>        
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    {{ Form::open([
                        'enctype' => 'multipart/form-data',
                        'class' => 'form-horizontal form-label-left',
                        'method' => (isset($slide) ? 'PUT' : 'POST'),
                        'route' => (isset($slide) ? ['admin.slide.update', $slide->id] : 'admin.slide.store')
                        ])
                    }}
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">{{ trans('admin.slide_name') }}</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control" placeholder="{{ trans('admin.slide_name') }}" name="name" value="{{ isset($slide->name) ? $slide->name : '' }}">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('link') ? 'has-error' : '' }}">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">{{ trans('admin.slide_link') }}</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control" placeholder="{{ trans('admin.slide_link') }}" name="link" value="{{ isset($slide->link) ? $slide->link : '' }}">
                                @if ($errors->has('link'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('link') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        @if ($slide->image_path != '')
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12">Old Image</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    @if (file_exists(config('customer.image_path.slides') . $slide->image_path) && $slide->image_path != '')
                                        <img src="{{ asset(config('customer.image_path.slides') . $slide->image_path) }}" class="book-image">
                                    @endif
                                </div>
                            </div>
                        @endif

                        <div class="form-group {{ $errors->has('image_path') ? 'has-error' : '' }}">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">{{ trans('admin.slide_image') }}</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="file" class="form-control" name="image_path" value="{{ isset($slide->image_path) ? $slide->image_path : '' }}">
                                @if ($errors->has('image_path'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image_path') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">{{ trans('admin.slide_status') }}</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <div class="radio">
                                    <label>
                                        <input type="radio" class="flat" name="status" value="1" {{ (isset($slide->status) && $slide->status == 0) ? '' : 'checked' }}> Show
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" class="flat" name="status" value="0" {{ (isset($slide->status) && $slide->status == 0) ? 'checked' : '' }}> Hide
                                    </label>
                                </div>
                            </div>
                        </div>
                    
                        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">{{ trans('admin.slide_description') }}</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <textarea id="slide_description" name="description" class="form-control">{{ isset($slide->description) ? $slide->description : '' }}</textarea>
                                <script>
                                    var options = {
                                        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                                        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                                        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                                        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
                                    };
                                    CKEDITOR.replace('slide_description', options);
                                </script>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-8">
                                <button type="button" class="btn btn-primary">{{ trans('admin.cancel') }}</button>
                                <button type="reset" class="btn btn-primary">{{ trans('admin.reset') }}</button>
                                <button type="submit" class="btn btn-success">{{ trans('admin.submit') }}</button>
                            </div>
                        </div>
                    </form>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {{ Html::script('assets/iCheck/iCheck.min.js') }}
@endsection
