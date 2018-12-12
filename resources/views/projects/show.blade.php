@extends('/layouts.app')

@section('content')


      <!--body-->


    
      	 	<div class="col-md-9">
      	 		

			      <div class="jumbotron ">
			        <div class="container">
			          <h2 class="display-6">{{ $project->name}}</h2>
			          <p>
			          	{{ $project->description}}
			          </p>
			          <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p> ---->
			        </div>
			      </div>



			        <!-- Example row of columns -->
			       
			        	@foreach($project->tasks as $task)
			          <div class="col-md-4">
			            <h2>{{ $task->name}}</h2>
			            <p>{{ $task->description }} </p>
			            <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>
			          </div>
			          @endforeach
			        </div>


			        <div class="col-md-3 col-md-offset-.5">

          <div class="sidebar-module sidebar-module-inset">
            <h4>Action</h4>
            <ol class="list-unstyled">
              <li><a href="/projects/{{ $project->id}}/edit">Edit</a></li>
              <li>

              	<a href="#"
              		onclick="
              		var result=confirm('Do You realy Want To Delete this Project');
              		if(result){
              		event.preventDefault();
              		document.getElementById('delete_form').submit();
              		}
              		">Delete</a>
              	<form id="delete_form" action="{{ route('projects.destroy',[$project->id]) }}" method="POST" style="display: none;">
              		<input type="hidden" name="_method" value="delete">
              		{{ csrf_field()}}

              		



              	</form>

              </li>
             
           <br>
            <li><a href="{{ route('projects.index')}}">Project List</a></li>
           <li><a href="{{ route('projects.create')}}"> Add Project</a></li>


            </ol>
          
          </div>
          <div class="sidebar-module">
            <h4>Users</h4>
            <ol class="list-unstyled">
              <li><a href="#">March 2014</a></li>
              <li><a href="#">December 2013</a></li>
           
            </ol>
          </div>
          <div class="sidebar-module">
            <h4>Elsewhere</h4>
            <ol class="list-unstyled">
              <li><a href="#">GitHub</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Facebook</a></li>
            </ol>
          </div>
        
			        	
			        </div>

        <hr>
<!-----------------------------Comment Section ---------------------------->
<div class="col-md-8">
  
<div class="panel panel-default">
  <div class="panel-heading"><strong> Comment section</strong></div>
    <div class="panel-body"> 
              <form method="POST" action="{{ route('comments.store')}}">
                    {{ csrf_field()  }}
                    <input type="hidden" name="_method" value="POST">
                    <input type="hidden" name="commentable_id" value="{{$project->id}}">
                    <input type="hidden" name="comment_type" value="App\Project">
                      <div class="form-group">
                          <label>Your Comments</label>
                        <textarea class="form-control" 
                                id="comment_description"
                                placeholder="Enter Your project Description"
                                name="comment_description" 
                                rows="2">
                        </textarea>
                      </div>
                      <label>Project URL</label>
                      <div class="form-group">
                        <textarea class="form-control" 
                                id="comment_url"
                                placeholder="Enter Your project Url"
                                name="comment_url" 
                                rows="1">
                        </textarea>
                      </div>





                <button type="submit" value="submit" class="btn btn-primary pull-right">Submit</button>
              </form>
    </div>
    @foreach($project->comments as $comment)
  <div class="panel-body"><strong>{{$comment->user->first_name}}&nbsp {{$comment->user->last_name}} :</br></strong>
                          {{$comment->body}}</br>
                       <a href=" {{$comment->url}}">  {{$comment->url}}</a>  
  </div>
  @endforeach
</div>
</div>
<!--------------------------------------------------------------->

@endsection
