@extends('layout.main')

@section('content')
    <div class="btn-group btn-group float-right mt-3" role="group">
    @can("create", App\Models\Category::class)
        <a href="{{ route('categories.create') }}" class="btn btn-success" title="Create New">
            <span class="fa fa-plus" aria-hidden="true"></span>
        </a>
    @endcan
    </div>
    <p class="clearfix"></p>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <div class="card-title">
                <h4>Multilevel Category</h4>
            </div>
        </div>
        <div class="card-card-body">           
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>SL.</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Parent Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>  
                <?php $_SESSION['i'] = 0; ?>                                                 
                    @forelse($categories as $index =>$category)  
                    <?php $_SESSION['i']=$_SESSION['i']+1; ?>                      
                        <tr>
                            <?php $dash=''; ?>
                            <td>{{$_SESSION['i']}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->slug}}</td>
                            <td>
                                @if(isset($category->parent_id))
                                    {{$category->subcategory->name}}
                                @else
                                    None
                                @endif
                            </td>
                            <td style="width: 20%;">
                                <div class="btn-group" role="group">                                       
                                    @can("update", $category)
                                        <a href="{{ route('categories.edit', $category->id ) }}" class="btn btn-primary btn-sm"
                                        title="Edit category">
                                            <i class="far fa-edit"></i>
                                        </a>
                                    @endcan
                                    @can("delete", $category)                                    
                                        <button type="button" class="btn btn-danger btn-sm" 
                                                title="Delete category"
                                                data-toggle="modal"
                                                data-target="#delete-{{$_SESSION['i']}}">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    @endcan                                    
                                </div>                        
                            </td>
                        </tr>
                        @if(count($category->subcategory))
                            @include('categories.sub-category-list',['subcategories' => $category->subcategory])
                        @endif

                        @empty
                        <tr>
                            <td colspan="5">No Category Or SubCategory Available.</td>
                        </tr> 
                                                   
                        @endforelse                       
                    
                </tbody>
            </table>            
        </div>     
    
    </div>            

<?php $_SESSION['j'] = 0; ?>
@foreach($categories as $index =>$category)  
    <?php $_SESSION['j']=$_SESSION['j']+1; ?>    
    <form method="POST" action="{!! route('categories.destroy', $category->id) !!}" accept-charset="UTF-8">
        @method("DELETE")
        @csrf
        <div class="modal fade in" id="delete-{{$_SESSION['j']}}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Confirm</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p> Delete {{$category->name}} ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endforeach 
@endsection