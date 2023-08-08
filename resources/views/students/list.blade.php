@extends('templates.layout')
@section('content')
    <div class=""><a href="{{route('add-student')}}" class="btn btn-primary">Add</a></div>
    <table class="table table-dark table-hover">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">gender</th>
            <th scope="col">phone</th>
            <th scope="col">address</th>
            <th scope="col">image</th>
            <th scope="col">thao tác</th>
        </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
            <tr>
                <th>{{$student->id}}</th>
                <td>{{$student->name}}</td>
                <td>{{$student->gender==1?'nam':'nữ'}}</td>
                <td>{{$student->phone}}</td>
                <td>{{$student->address}}</td>
                <td><img src="{{$student->image ? \Illuminate\Support\Facades\Storage::url($student->image):''  }}" style="width: 100px"
                                    height="100px"></td>
                <td>
                    <a href="{{route('edit-student',['id'=>$student->id])}}" class="btn btn-warning">Sửa</a>
                    <a href="{{route('delete-student',['id'=>$student->id])}}" class="btn btn-warning">Xóa</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
