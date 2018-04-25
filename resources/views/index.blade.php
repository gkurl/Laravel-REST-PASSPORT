<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Angular-Laravel Authentication</title>
    <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset('node_modules/bootstrap/dist/css/bootstrap.css')}}">
</head>
<body ng-app="authApp">

<div class="container">
    <div ui-view></div>
</div>

</body>

<!-- Application Dependencies -->
<script src="{{\Illuminate\Support\Facades\URL::asset('node_modules/angular/angular.js')}}"></script>
<script src="{{\Illuminate\Support\Facades\URL::asset('node_modules/angular-ui-router/build/angular-ui-router.js')}}"></script>
<script src="{{\Illuminate\Support\Facades\URL::asset('node_modules/satellizer/satellizer.js')}}"></script>

<!-- Application Scripts -->
<script src="{{\Illuminate\Support\Facades\URL::asset('js/angularmain.js')}}"></script>
<script src="scripts/authController.js"></script>
<script src="scripts/userController.js"></script>
</html>