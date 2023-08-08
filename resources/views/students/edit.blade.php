@extends('templates.layout')
@section('content')
    <form action="{{route('edit-student',['id'=>request()->route('id')])}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input type="text" class="form-control" id=""value="{{$student->name}}" name="name">
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" value="1" {{$student->gender == 1 ? 'checked':''}}>
            <label class="form-check-label" for="flexRadioDefault1">
                Name
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" value="0" {{$student->gender == 0 ? 'checked':''}}>
            <label class="form-check-label" for="flexRadioDefault2">
                Nữ
            </label>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Phone</label>
            <input type="text" class="form-control" id="" name="phone" value="{{$student->phone}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Address</label>
            <input type="text" class="form-control" id="" name="address"value="{{$student->address}}">
        </div>
        <div class="form-group">
            <label class="col-md-3 col-sm-4 control-label">Ảnh</label>
            <div class="col-md-9 col-sm-8">
                <div class="row">
                    <div class="col-xs-6">
                        <img id="anh_the_preview" src="{{$student->image? \Illuminate\Support\Facades\Storage::url($student->image): 'https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg'}}" alt="your image"
                             style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid"/>
                        <input type="file" name="image" accept="image/*"
                               class="form-control-file @error('image') is-invalid @enderror" id="cmt_anh">
                        <label for="cmt_truoc">Ảnh thẻ</label><br/>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit">Edit</button>
    </form>
@endsection
