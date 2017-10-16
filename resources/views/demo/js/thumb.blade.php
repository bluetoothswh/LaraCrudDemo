<script type="text/javascript">
	$(function(){
		//添加上传商品缩略图的表单
		$(document).on('click','span#add-goods-thumb-btn',function(){
			var form	= '<div class="row">'
					 	+ '<div class="file-field input-field col s6">'
					    + '<div class="btn">'
					    + '    <span>商品缩略图</span> '
					    + '    <input type="file" name="imgs[]"> '
					    + '</div>'
					    + '<div class="file-path-wrapper">'
					    + '     <input class="file-path validate" type="text"> '
					    + '</div>'
    				    + '</div>'
    				    + '<div class="col s4">'
    				    +'<span class="btn grey thumb-del"><i class="material-icons left">clear</i>删除<span>'
    				    +'</div>'
						+ '</div>';
			$('#goods_thumb_content').append(form);
		});

		//删除表单
		$(document).on('click','span.thumb-del',function(){
			$(this).parent('.col').parent('.row').hide();
		});

		//点击验证码图片刷新验证码
		$(document).on('click','img.captcha-img',function(){
			//激活ajax请求 刷新验证码
			$.ajax({
				type:"post",
				url:"{{url('get-captcha')}}",
				data:"_token="+ "{{csrf_token()}}",
				dataType:"json",
				success:function(data){
					if(data.tag == 'success'){
						//刷新验证码
						$('img.captcha-img').attr('src',data.captcha_src);
					}
				}
			})
		})


	});
</script>