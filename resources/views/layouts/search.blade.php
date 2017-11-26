<div class="row section-search-form">
    <div class="col-sm-3">
    </div>
    <div class="col-sm-8">
        <form method="GET" action="{{ route('search') }}">
            {{ csrf_field() }}
            <div class="search-form">
                <div class="col-sm-2">
                </div>
                <div class="col-sm-4">
                    <input class="input" name="key_word" type="text" placeholder=" {{ trans('index.enter_name_book') }} ">
                </div>
                <div class="col-sm-2">
                    <button class="button"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-sm-1">
    </div>
</div>
