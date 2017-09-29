
@if($errors->any())
<div class="row" id="errors-box">
	<div class="col s6">
	<div class="card-panel blue">
		<ul class="errors">
			@foreach($errors->all() as $error)
			<li><i class="fa fa-times"></i>{{$error}}</li>
			@endforeach
		</ul>
	</div>
	</div>
</div>

<script type="text/javascript">
	$(function(){
		$('#errors-box').delay(2000).fadeOut();
	})
</script>
@endif