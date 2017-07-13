@extends('layouts.app')

@section('content')
   <div class="container">
   	<div class="row">
   		<div class="col-md-10 col-md-offset-1">
   			<h1 style="color:red;font-weight: bold;">{{ trans('app.about_page_title') }}</h1>
   		</div>
   		<div class="panel panel-default">
   			<div class="panel-body">
   				<p>{{ trans('app.about_page_body') }}</p>
   			</div>
   		</div>
   	</div>
   </div>
@endsection