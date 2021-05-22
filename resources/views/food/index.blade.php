@extends('layouts.app')

@section('content')
<style>

    svg{
        width: 20px;
    }

</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                    @if(Session::has('message'))

                    <div class="alert alert-success">

                        {{Session::get('message')}}

                    </div>

                    @endif
                <div class="card-header">All Food</div>

                <div class="card-body">

                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Category</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($foods)>0)
                        @foreach($foods as $key=>$food)
                        <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td><img src="{{asset('images')}}/{{$food->image}}" width="70"></td>
                        <td>{{$food->name}}</td>
                        <td>{{$food->description}}</td>
                        <td>${{$food->price}}</td>
                        <td>{{$food->category->name}}</td>
                        <td>
                            <a href="{{route('food.edit',[$food->id])}}"><button class="btn btn-outline-success">Edit</button></a>
                        </td>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <form action="{{route('food.destroy',[$food->id])}}" method="post">@csrf
                            {{method_field('DELETE')}}
                               
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you sure??
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                            </div>
                            </div>
                            </form>
                        </div>
                        </div>
                        <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal">
                        Delete
                        </button>
                        </td>

                        </tr>
                        @endforeach
                        @else
                        <td>No Food to display</td>
                        @endif
                    </tbody>
                    </table>
                    {{$foods->links()}}
            </div>

        </div>
    </div>
</div>
@endsection


