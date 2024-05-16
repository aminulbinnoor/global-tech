<?php $dash.='-- '; ?>
@foreach($subcategories as $index => $subcategory)
<?php $_SESSION['i']=$_SESSION['i']+1; ?>  
    <tr>
        <td>{{$_SESSION['i']}}</td>
        <td>{{$dash}}{{$subcategory->name}}</td>
        <td>{{$subcategory->slug}}</td>
        <td>{{$subcategory->parent->name}}</td>
        <td style="width: 20%;">
            <div class="btn-group" role="group"> 
                <a href="{{ route('categories.edit', $subcategory->id ) }}" class="btn btn-primary btn-sm"
                    title="Edit subcategory">
                        <i class="far fa-edit"></i>
                </a>
            
                <button type="button" class="btn btn-danger btn-sm" 
                        title="Delete subcategory"
                        data-toggle="modal"
                        data-target="#delete-{{$_SESSION['i']}}">
                    <i class="far fa-trash-alt"></i>
                </button>
                
            </div>                        
        </td>
    </tr>
    @if(count($subcategory->subcategory))
        @include('categories.sub-category-list',['subcategories' => $subcategory->subcategory])
    @endif

    <form method="POST" action="{!! route('categories.destroy', $category->id) !!}" accept-charset="UTF-8">
        @method("DELETE")
        @csrf
        <div class="modal fade in" id="delete-{{$_SESSION['i']}}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Confirm</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p> Delete {{$dash}}{{$subcategory->name}} ?</p>
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