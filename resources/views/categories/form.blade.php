
<div class="form-group">
    <label>Name*</label>
    <input type="text" name="name" class="form-control" placeholder="Name" value="{{old('name')}}" required />
</div>

<div class="form-group">
    <label>Select parent category</label>
    <select type="text" name="parent_id" class="form-control">
        <option value="">None</option>
        @if($categories)
            @foreach($categories as $category)
                <?php $dash=''; ?>
                <option value="{{$category->id}}">{{$category->name}}</option>
                @if(count($category->subcategory))
                    @include('categories.subCategoryList-option',['subcategories' => $category->subcategory])
                @endif
            @endforeach
        @endif
    </select>
</div>

