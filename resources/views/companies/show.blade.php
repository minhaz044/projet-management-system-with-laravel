@extends('/layouts.app')

@section('content')


      <!--body-->


    
      	 	<div class="col-md-9">
      	 		

			      <div class="jumbotron ">
			        <div class="container">
			          <h2 class="display-6">{{ $company->name}}</h2>
			          <p>
			          	{{ $company->description}}
			          </p>
			          <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p> ---->
			        </div>
			      </div>



			        <!-- Example row of columns -->
			       
			        	@foreach($company->projects as $project)
			          <div class="col-md-4">
			            <h2>{{ $project->name}}</h2>
			            <p>{{ $project->description }} </p>
			            <p><a class="btn btn-secondary" href="/projects/{{ $project->id}}" role="button">View details »</a></p>
			          </div>
			          @endforeach
			        </div>


			        <div class="col-md-3 col-md-offset-.5">

          <div class="sidebar-module sidebar-module-inset">
            <h4>Action</h4>
            <ol class="list-unstyled">
              <li><a href="/companies/{{ $company->id}}/edit">Edit</a></li>
              <li>

              	<a href="#"
              		onclick="
              		var result=confirm('Do You realy Want To Delete this Company');
              		if(result){
              		event.preventDefault();
              		document.getElementById('delete_form').submit();
              		}
              		">Delete</a>
              	<form id="delete_form" action="{{ route('companies.destroy',[$company->id]) }}" method="POST" style="display: none;">
              		<input type="hidden" name="_method" value="delete">
              		{{ csrf_field()}}

              		



              	</form>

              </li>
             
           <br>
            <li><a href="{{ route('companies.index')}}">Company List</a></li>
           <li><a href="/projects/create/{{ $company->id }}"> Add Project</a></li>


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



@endsection
