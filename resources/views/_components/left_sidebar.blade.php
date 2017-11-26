<div class="left-sidebar">
    <h2>{{ trans('index.Category') }}</h2>
    <div class="panel-group category-products" id="accordian">
        <!--category-productsr-->
        @foreach($categories as $category)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="#">{{ $category->name }}</a></h4>
                </div>
            </div>
        @endforeach
    </div>
    <!--/publisher-->
    <div class="brands_products">
        <!--publisher-->
        <h2>{{ trans('index.publisher') }}</h2>
        <div class="brands-name">
            <ul class="nav nav-pills nav-stacked">
                @foreach($publishers as $publisher)
                    <li><a href="#">{{ $publisher->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <h2>{{ trans('index.author') }}</h2>
    <div class="panel-group category-products" id="accordian">
        <!--author-->
        @foreach($authors as $author)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="#">{{ $author->name }}</a></h4>
                </div>
            </div>
        @endforeach
    </div>
</div>
