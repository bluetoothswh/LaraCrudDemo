<div class="container">
	<div class="row">
		<div class="col s6 offset-s3">
			@include('demo.register.errors')
			<div class="card-panel">
				{{Form::open(['url'=>'register','method'=>'post','class'=>'row'])}}
					<div class="input-field col s12">
						<h5>注册新用户</h5>
					</div>
					<div class="input-field col s12">
          				<i class="material-icons prefix">account_circle</i>
          				<input id="username" type="text" name="username">
          				<label for="username">会员名称</label>
        			</div>
        			<div class="input-field col s12">
          				<i class="material-icons prefix">email</i>
          				<input id="email" type="text" name="email">
          				<label for="email">电子邮件</label>
        			</div>
        			<div class="input-field col s12">
          				<i class="material-icons prefix">phone</i>
          				<input id="phone" type="text" name="phone">
          				<label for="phone">手机号码</label>
        			</div>
        			<div class="input-field col s12">
          				<i class="material-icons prefix">lock</i>
          				<input id="password" type="password" name="password">
          				<label for="password">账户密码</label>
        			</div>
        			<div class="input-field col s11 offset-s1">
        				<button class="btn-large red" type="submit">
        					<i class="material-icons left">done</i>
        					确认
        				</button>
        				<a href="{{url('login')}}" class="btn-large blue">登录</a>
        			</div>
				{{Form::close()}}
			</div>
		</div>
	</div>
</div>