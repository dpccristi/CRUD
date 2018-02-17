 
	<div class="row">
		<div class="col">
			<table class="tab">
				<tr>
					<td>ID</td>
					<td>NAME</td>
					<td>EMAIL</td>
					<td>ACTION</td>
				</tr>
				@foreach($allusers as $user)
					<tr>
						<td>{{ $user["id"]}} </td>
						<td>{{ $user["name"]}} </td>
						<td>{{ $user["email"]}} </td>
						<td>
							<a href="users/update/{{ $user['id']}}">Edit</a>
							<a href="users/remove/{{ $user['id']}}">Remove</a>
							<a href="users/testpassword/{{ $user['id']}}">TestPassword</a>
						</td>
					</tr>
				@endforeach

			</table>

		</div>
		<div class="col">
			<form method="POST"  class="createform" action="users/create">
				{{ csrf_field() }}
				<input type="text" name='name' placeholder="Input Name"><br>
				<input type="email" name='email' placeholder="Input Email"><br>
				<input type="password" name="password" placeholder="Input password"><br>
				<button>Submit</button>
			</form>
		</div>

	</div>

 