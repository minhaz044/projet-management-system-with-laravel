
@extends('layouts.app');



@section('content')


		<div class="col-md-8 col-md-offset-2">

			<ul class="list-group">
				  <li class="list-group-item active">Companies List <a  href=" {{ route('companies.create') }}"class="btn btn-primary pull-right" style="margin-top: -8px;">Add Company</a></li>

				@foreach($companies as $company)
				<li class="list-group-item">
				<a href="/companies/{{ $company->id}}">{{ $company->name }}</a>	
				</li>
				@endforeach
			</ul>

		</div>

@endsection
