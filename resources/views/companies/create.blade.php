@extends('/layouts.app')

@section('content')


      <!--body-->


      	 	<div class="col-md-9">


              <form method="POST" action="{{ route('companies.store')}}">

                    {{ csrf_field()  }}
                    <input type="hidden" name="_method" value="POST">
                <div class="form-group">
                  <label for="company_name">Company Name<span class="required">*</span></label>
                  <input class="form-control" 
                          id="company_name" 
                          placeholder="Enter the Name of Company"
                          name="company_name"
                          required
                          value="">
                  
                </div>
                <div class="form-group">
                  <label for="company_description">Description</label>
                  <textarea class="form-control" 
                          id="company_description"
                          placeholder="Enter Your company Description"
                          name="company_description" 
                          rows="4">
                  </textarea>
                </div>

                <button type="submit" value="submit" class="btn btn-primary">Submit</button>
              </form>
			   </div>


			   <div class="col-md-3 ">

          <div class="sidebar-module sidebar-module-inset">
            <h4>Action</h4>
            <ol class="list-unstyled">
              <li><a href="/companies/">Back</a></li>
           
              
            </ol>
          </div>

        
			        	
			        </div>
      	 	</div>
        <hr>

      </div> <!-- /container -->


@endsection
