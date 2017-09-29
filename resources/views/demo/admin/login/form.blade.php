<div class="container">
	<div class="row">
		<div class="col s6 offset-s3">
			@include('demo.register.errors')
			<div class="card-panel black white-text">
				{{Form::open(['url'=>'admin/login','method'=>'post','class'=>'row'])}}
					<div class="input-field col s12">
						<h5>管理员登录</h5>
					</div>
					<div class="input-field col s12">
          				<i class="material-icons prefix">account_circle</i>
          				<input id="username" type="text" name="username">
          				<label for="username">管理员名称</label>
        			</div>
        			
        			
        			<div class="input-field col s12">
          				<i class="material-icons prefix">lock</i>
          				<input id="password" type="password" name="password">
          				<label for="password">账户密码</label>
        			</div>
        			<div class="input-field col s11 offset-s1">
        				<button class="btn-large blue" type="submit">
        					<i class="material-icons left">done</i>
        					确认
        				</button>
        			</div>
				{{Form::close()}}
			</div>
		</div>
	</div>
</div>