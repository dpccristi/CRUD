 
	<div class="row">
		<div class="col-2">
			<p>Input Name</p>
			<p>Input Email</p>
			<p>Input Password</p>

		</div>
		<div class="col">
			<form  method="POST"   action="/users/update/{{ $user['id']}}">
				{{ csrf_field() }}
				<input type="text" name='name' placeholder="Input Name" class="space" value="{{ $user['name']}}"><br>
				<input type="email" name='email' placeholder="Input Email" value="{{ $user['email']}}"><br>
				<input type="text" name="password" placeholder="Input password" value="{{ $user['password']}}"><br>
				<button>Submit</button>
			</form>
		</div>

	</div>

 