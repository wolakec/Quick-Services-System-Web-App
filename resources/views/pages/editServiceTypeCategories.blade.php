@extends('layouts.default')

@section('content') 

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h4 style="text-align:center;">Update {{ $type->name }} Categories</h4><br/>
            <form name="updateServiceTypeCategories" class="form-horizontal" method="post" action="{{ url('/services/categories/'.$type->id.'/edit') }}">
                
                <div class="form-group">
                    @forelse($categories as $category)
                    <span class="blockSpan"> <input 
                             @foreach($type->categories as $typeCategory )
                                
                                @if($category->id == $typeCategory->id)
                                @{{ checked }}
                                @endif
                             @endforeach
                            type="checkbox" value="{{ $category->id }}" name="category_id[]"/><label class="checkLable">&nbsp;{{ $category->name }}&nbsp;</label> </span>
                    @empty
                    No categories in database
                    @endforelse
<div class="text-danger">{{ $errors->first('category_id[]') }}</div>
                
                </div>
                <button type="submit" value="submit" name="submit"class="btn btn-success"> Submit</button>
        </div>
        </form>
    </div>
</div>
</div>
@stop
