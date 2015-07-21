@extends('layout/index')

@section('main')
 <h1>Peru BookStore</h1>
 <a href="{{url('/books/create')}}" class="btn btn-success">Create Book</a>
 <hr>
 <h1>{{$var}}</h1>
 <table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="bg-info">
         <th>Id</th>
         <th>ISBN</th>
         <th>Title</th>
         <th>Author</th>
         <th>Publisher</th>
         <th>Categoria</th>
         <th>Thumbs</th>
         <th colspan="3">Actions</th>
     </tr>
     </thead>
     <tbody>
     @foreach ($books2 as $book)
         <tr>
             <td>{{ $book->id }}</td>
             <td>{{ $book->isbn }}</td>
             <td>{{ $book->titulo }}</td>
             <td>{{ $book->autor }}</td>
             <td>{{ $book->publicacion }}</td>
             <td>{{ $book->categoria->nombre }}</td>
             <td><img src="{{asset('Upload/'.$book->imagen)}}" height="35" width="30"></td>
             <td><a href="{{url('books',$book->id)}}" class="btn btn-primary">Read</a></td>
             <td><a href="{{route('books.edit',$book->id)}}" class="btn btn-warning">Update</a></td>
             <td>
             {!! Form::open(['method' => 'DELETE', 'route'=>['books.destroy', $book->id]]) !!}
             {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
             {!! Form::close() !!}
             </td>
         </tr>
     @endforeach

     </tbody>

 </table>
 {!! link_to('auth/logout', trans('front/site.logout')) !!}
@endsection