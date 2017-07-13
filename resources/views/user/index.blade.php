@extends('layouts.app')

@section('content')
    <div class="container">
     @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
     @endif
    	<div class="row">
            <a href="{{route('user.create')}}" class="btn btn-success pull-right" style="margin-bottom: 3px;"><span class="glyphicon glyphicon-plus"></span> Add User</a>
    		<table class="table table-hover table-bordered" id="users-table">
    			<thead>
    				<th>id</th>
    				<th>Name</th>
    				<th>Email</th>
            <th>Gender</th>
            <th>Action</th>
    			</thead>
    			<tbody>
    			 @forelse($users as $user)
    				<tr>
    					<td>{{$user->id}}</td>
    					<td>{{$user->name}}</td>
    					<td>{{$user->email}}</td>
              <td>
                @if($user->gender == 1)
                  Man
                @else
                  Women
                @endif  
              </td>
              <td>
              <div class="col-md-2">
                 <form method="POST" class="delete_form" action="{{route('user.destroy', $user->id)}}">
                   {{ csrf_field() }}
                   {{ method_field('DELETE') }}
                   <button id="delete-btn" class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-remove"></span></button>
                 </form>
               </div>
               <div class="col-md-2">   
                 <a href="{{route('user.show', $user->slug)}}" class="btn btn-info"><span class="glyphicon glyphicon-picture"></span></a>
               </div>
               <div class="col-md-2">  
                 <a href="{{route('user.edit', $user->id)}}" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>  
               </div>  
             </td>
           </tr>
            @empty
               <h1>No Post</h1>
    				@endforelse
    			</tbody>
    		</table>
    	</div>
    </div>
@endsection()

@section('script')
   <script type="text/javascript">
       $(document).on('click', '#delete-btn', function(e) {
        e.preventDefault();
        var self = $(this);
        swal({
                    title: "Are you sure?",
                    text: "You want to delete this user?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: true
                },
                function(isConfirm){
                    if(isConfirm){
                        self.parent(".delete_form").submit();
                        swal("Deleted!","Post deleted", "success");
                    }
                    else{
                        swal("cancelled","Your user are safe", "error");
                    }
                });
      });

   </script>
@endsection()