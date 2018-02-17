<form method="POST" action="/users/testpassword/{{ $userid }}">
	{{ csrf_field() }}
	<input type="text" name="passwordtext" value="{{session('inputvalue')}}">
	<button>Test</button>
</form>
@if(!empty(session("result")))
<h1>{{ session("result") }}</h1>
@endif
