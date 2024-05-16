@extends('layout.main')

@section('content')

    <div class="btn-group btn-group float-right mt-3" role="group">
    @can("viewAny", App\Models\Category::class)
        <a href="{{ route('categories.index') }}" class="btn btn-primary" title="Show All List">
            <span class="fa fa-list" aria-hidden="true"></span>
        </a>
    @endcan
    @can("create", App\Models\Category::class)
        <a href="{{ route('categories.create') }}" class="btn btn-success" title="Create New">
            <span class="fa fa-plus" aria-hidden="true"></span>
        </a>
    @endcan
    </div>
    <p class="clearfix"></p>
    <form method="POST" action="{{ route('categories.update', $category->id) }}">
        @csrf
        @method("PUT")
        <div class="box-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Name*</label>
                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{$category->name}}" required />
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Select parent category*</label>
                        <select type="text" name="parent_id" class="form-control">
                            <option value="">None</option>
                            @if($categories)
                                @foreach($categories as $item)
                                    <?php $dash=''; ?>
                                    <option value="{{$item->id}}" @if($category->parent_id == $item->id ) selected @endif>{{$item->name}}</option>
                                    @if(count($item->subcategory))
                                        @include('categories.sub-category-list-option-for-update',['subcategories' => $item->subcategory])
                                    @endif
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>

            </div>

        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Update</button>

        </div>
    </form>

@endsection