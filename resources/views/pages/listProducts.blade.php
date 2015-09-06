@extends('layouts.default')

@section('content')

<!--{{ $products }}-->
<h3 style="text-align: center;">List of Products</h3><br>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered" id="ProductsTable">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>No</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Specification</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{ $product->category->name}}</td>
                                <td>{{ $product->id }}</td>
                                <td> {{$product->code}}</td>
                                <td ><a href="#" data-toggle="modal" data-target="#{{ $product->id }}" >{{$product->name}}</a></td>
                                <td>{{$product->specification}}</td>
                                <td><a href="{{ url('/product/'.$product->id.'/edit') }}">Edit</a></td>
                            </tr>
                            
                           

                                        <div class="modal fade bs-example-modal-packges" id="{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                          <div class="modal-dialog modal-sm">
                                            <div class="modal-content packageStuff">
                                                
                                                                    @foreach ($product->packages as $package)
                                                                     <ul class="list-group">
                                                                    <li class="list-group-item"><span class="badge">{{$package->unit->name}}</span>Name of the package</li>
                                                                    <li class="list-group-item"><span class="badge">{{$package->cost}}</span>Cost</li>
                                                                    <li class="list-group-item"><span class="badge">{{$package->base_price}}</span>Price</li>
                                                                    </ul>     
                                                                    @endforeach
                                                        
                                            </div>
                                          </div>
                                        </div>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
<script type="text/javascript">
$(document).ready( function () {
    $('#ProductsTable').DataTable();
} );

</script>
@stop
