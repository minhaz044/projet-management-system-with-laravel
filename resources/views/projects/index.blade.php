
@extends('layouts.app');



@section('content')


		<div class="col-md-8 col-md-offset-2">

			<ul class="list-group">
				  <li class="list-group-item active">projects List <a  href=" {{ route('projects.create') }}"class="btn btn-primary pull-right" style="margin-top: -8px;">Add Project</a></li>

				@foreach($projects as $project)
				<li class="list-group-item">
				<a href="/projects/{{ $project->id}}">{{ $project->name }}</a>	
				</li>
				@endforeach
			</ul>

		</div>

@endsection
