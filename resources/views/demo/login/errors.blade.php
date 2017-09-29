@if(session()->get('info'))
<div class="card-panel blue white-text">
	<p>{{session()->get('info')}}</p>
</div>
@endif