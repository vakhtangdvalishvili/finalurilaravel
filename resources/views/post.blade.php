<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
	<form action="{{ route('storepost') }}" method="POST" enctype="multipart/form-data">
		@csrf
        <input type="text" name="title" placeholder="enter title" class="form-control @if($errors->has('title')) is-invalid @endif" value="{{old('title')}}">
	    <input type="file" name="image">
	    <input type="date" name="add_date">
        <input type="text" name="price" placeholder="enter price">
	    <select name="category_id">
		@foreach(App\Category::get() as $cat)
			<option value="{{ $cat->id }}"> {{ $cat->title }} </option>
		@endforeach
	</select>
        <select name="category_id">
            @foreach(App\Category::get() as $cat)
                <option value="{{ $cat->id }}"> {{ $cat->title }} </option>
            @endforeach
        </select>
	<button>save</button>
	</form>


</body>
</html>
