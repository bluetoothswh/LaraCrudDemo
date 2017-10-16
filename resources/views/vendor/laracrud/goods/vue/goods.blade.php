<script type="text/javascript">
	var goodsRoot	= new Vue({
		el:"#goodsRoot",
		data:{

		},
		methods:{

			//删除记录
			delConfirm:function(event){

				var delBtn = event.currentTarget;
				var url    = $(delBtn).data('url');
				swal({
					  title: '确认删除?',
					  text: "您将从数据库中删除该记录",
					  type: 'warning',
					  showCancelButton: true,
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: '确认',
					  cancelButtonText:'取消'

					}).then(function () {
						window.location.href = url;
						swal('成功删除','记录已从数据库中删除','success');
					});
			},

			//ajax删除
			delAjax:function(event){

				var delBtn 		= event.currentTarget;
				var ajax_url	= $(delBtn).data('ajax_url');

				swal({
					  title: '确认删除?',
					  text: "您将从数据库中删除该记录",
					  type: 'warning',
					  showCancelButton: true,
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: '确认',
					  cancelButtonText:'取消'

					}).then(function () {
						 $.ajax({
						 	url:ajax_url,
						 	type:'delete',
						 	data:'_token=' + "{{csrf_token()}}",
						 	dataType:'json',
						 	success:function(data){
						 		window.location.href = "{{url('goods')}}";
						 		swal('成功删除','记录已从数据库中删除','success');
						 	}
						 })
					});
			},


		} 
	});
</script>