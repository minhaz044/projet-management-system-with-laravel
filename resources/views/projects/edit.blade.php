@extends('/layouts.app')

@section('content')



      	 	<div class="col-md-9">


              <form method="POST" action="{{ route('projects.update',[$project->id])}}">

                    {{ csrf_field()  }}
                    <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                  <label for="project_name">Project Name<span class="required">*</span></label>
                  <input class="form-control" 
                          id="project_name" 
                          placeholder="Enter Name of the Project"
                          name="project_name"
                          required
                          value="{{  $project->name}}">
                  
                </div>
                <div class="form-group">
                  <label for="project_description">Description</label>
                  <textarea class="form-control" 
                          id="project_description"
                          placeholder="Enter Your project Description"
                          name="project_description" 
                          rows="4">{{  $project->description}}
                  </textarea>
                </div>

                <button type="submit" value="submit" class="btn btn-primary">Submit</button>
              </form>
			   </div>


			   <div class="col-md-3 ">

          <div class="sidebar-module sidebar-module-inset">
            <h4>Action</h4>
            <ol class="list-unstyled">
              <li><a href="/projects/{{ $project->id}}">Back</a></li>
              <li><a href="#">Delete</a></li>
              
            </ol>
          </div>

        
			        	
			        </div>
        <hr>

  


@endsection
