<!--Import Google Icon Font-->
<style type="text/css">
        @font-face {
            font-family: 'Material Icons';
            font-style: normal;
            font-weight: 400;
              src: url({{url('/')}}/static/materialize/iconfont/MaterialIcons-Regular.eot); /* For IE6-8 */
              src: local('Material Icons'),
                   local('MaterialIcons-Regular'),
                   url({{url('/')}}/static/materialize/iconfont/MaterialIcons-Regular.woff2) format('woff2'),
                   url({{url('/')}}/static/materialize/iconfont/MaterialIcons-Regular.woff) format('woff'),
                   url({{url('/')}}/static/materialize/iconfont/MaterialIcons-Regular.ttf) format('truetype');
        }
        .material-icons {
            font-family: 'Material Icons';
            font-weight: normal;
            font-style: normal;
            font-size: 24px;  /* Preferred icon size */
            display: inline-block;
            width: 1em;
            height: 1em;
            line-height: 1;
            text-transform: none;
            letter-spacing: normal;
            word-wrap: normal;
            white-space: nowrap;
            direction: ltr;

            /* Support for all WebKit browsers. */
            -webkit-font-smoothing: antialiased;
            /* Support for Safari and Chrome. */
            text-rendering: optimizeLegibility;

            /* Support for Firefox. */
            -moz-osx-font-smoothing: grayscale;

            /* Support for IE. */
            font-feature-settings: 'liga';
        }
</style>
<!--Import materialize.css-->
<link type="text/css" rel="stylesheet" href="{!!url('static/materialize/css/materialize.min.css')!!}"  media="screen,projection"/>
<link type="text/css" rel="stylesheet" href="{!!url('static/font-awesome/css/font-awesome.min.css')!!}"/>
<link type="text/css" rel="stylesheet" href="{!!url('static/sweetalert2/sweetalert2.css')!!}"/>
<link type="text/css" rel="stylesheet" href="{{url('front/demo/style.css')}}" />
<script type="text/javascript" src="{{url('static/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{url('static/js/jquery.json-2.4.js')}}"></script>
<script type="text/javascript" src="{{url('static/materialize/js/materialize.min.js')}}"></script>
<script type="text/javascript" src="{{url('static/sweetalert2/sweetalert2.min.js')}}"></script>
<script type="text/javascript" src="{{url('static/vue/vue.min.js')}}"></script>
<script type="text/javascript" src="{{url('front/demo/demo.js')}}"></script>