<?php $dash.='-- '; ?>
@foreach($subcategories as $subcategory)
    <option value="{{$subcategory->id}}">{{$dash}}{{$subcategory->name}}</option>
    @if(count($subcategory->subcategory))
        @include('categories.subCategoryList-option',['subcategories' => $subcategory->subcategory])
    @endif
@endforeach