@extends('/layouts.app')

@section('content')


      <!--body-->


      	 	<div class="col-md-9">


              <form method="POST" action="{{ route('projects.store')}}">

                    {{ csrf_field()  }}
                    <input type="hidden" name="_method" value="POST">


                    @if($company != NULL)

                    <input type="hidden" name="company_id" value="{{ $company }}">

                    @endif

                    @if($companies != NULL)
                     <div class="form-group">
                  <label for="project_name">Company Name<span class="required">*</span></label>
                      <select class="form-control"  name="company_id" id="company_id" required >
                        <option value="">SElect Your Company</option>
                        @foreach($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                      </select>
                    </div> 
                    @endif
                                  
                <div class="form-group">
                  <label for="project_name">Project Name<span class="required">*</span></label>
                  <input class="form-control" 
                          id="project_name" 
                          placeholder="Enter the Name of Project"
                          name="project_name"
                          required
                          value="">
                  
                </div>
                <div class="form-group">
                  <label for="project_description">Description</label>
                  <textarea class="form-control" 
                          id="project_description"
                          placeholder="Enter Your project Description"
                          name="project_description" 
                          rows="4">
                  </textarea>
                </div>

                <div class="form-group">
                  <label for="project_name">Project Duration (Days)<span class="required">*</span></label>
                  <input type="number" class="form-control" 
                          id="project_days" 
                          placeholder="Duration of the Project"
                          name="project_days"
                          required
                          value="">
                  
                </div>





                <button type="submit" value="submit" class="btn btn-primary">Submit</button>
              </form>
			   </div>


			   <div class="col-md-3 ">

          <div class="sidebar-module sidebar-module-inset">
            <h4>Action</h4>
            <ol class="list-unstyled">
              <li><a href="{{ route('companies.show',$company)}}">Back</a></li>
           
              
            </ol>
          </div>

        
			        	
			        </div>
      	 	</div>
        <hr>

      </div> <!-- /container -->


@endsection
