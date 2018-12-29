@extends('layouts.atelier.header')

@section('title')
  后台管理系统
@endsection

@section('link')

@endsection

@section('after_link')

@endsection

@section('content')
<div class="inside index">
	<h1 class="mb-20">工作室</h1>
		<hr class="border1-333-solid">
	<div>
		<dl class="px-15">
			<dd><h4>{{ $home->name }}</h4></dd>
			<dd><p>{{ $home->title }}</p></dd>
		</dl>
	</div>
  <div class="row text-center mb-20">
  	<div class="col-md-4">
      <div class="card card-white">
      	<div class="card-block">
      		<span class="font-size-72">{{ $home->reading_quantity }}</span>
					<p class="h2 mt-0">点击量</p>
      	</div>
		  </div>
	  </div>
  	<div class="col-md-4">
      <div class="card card-white">
      	<div class="card-block">
			  	<span class="font-size-72 bg-color-white">{{ $home->projectCount }}</span>
			  	<p class="h2 mt-0">项目数量</p>
			  </div>
		  </div>
	  </div>
  	<div class="col-md-4">
      <div class="card card-white">
      	<div class="card-block">
			  	<span class="font-size-72">{{ $home->userCount }}</span>
			  	<p class="h2 mt-0">成员数量</p>
			  </div>
		  </div>
	  </div>
  </div>

  <div class="row">
  	<div class="col-md-6">
      <div class="card card-white">
        <div class="card-header">
          <h4 class="">介绍</h4>
        </div>
      	<div class="card-block">
			  	<p class="mt-0">{{ $home->introduce }}</p>
			  </div>
		  </div>
	  </div>
  	<div class="col-md-6">
      <div class="card card-white">
        <div class="card-header">
          <h4 class="">关于我们</h4>
        </div>
      	<div class="card-block">
			  	<p class="mt-0">{{ $home->about }}</p>
			  </div>
		  </div>
	  </div>
  </div>
  <div class="row">
  	<div class="col-md-12">
  		<div class="card">
  			<div class="card-block">
  				<div class="work-time-div">
						<table>
							<thead>
								<tr>
									<th>#</th>
									<th>成员</th>
									<th>加入日期</th>
									<th>最近上班时间</th>
									<th>需工作总时长 (h) 4h/day</th>
									<th>实际工作时长 (h)</th>
									<th>工作量 (h)</th>
								</tr>
							</thead>
							<tbody>
								
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
							</tbody>
						</table>
					</div>
  			</div>
  		</div>
  	</div>
  </div>
</div>
@endsection