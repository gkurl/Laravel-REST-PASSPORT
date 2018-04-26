(function() {

    'use strict';

    angular
        .module('authApp', ['ui.router', 'satellizer'])
        .config(function($stateProvider, $urlRouterProvider, $authProvider) {

            // Satellizer configuration that specifies which API
            // route the JWT should be retrieved from
            $authProvider.loginUrl = '/api/authenticate';

            // Redirect to the auth state if any other states
            // are requested other than users
            $urlRouterProvider.otherwise('/auth');

            $stateProvider
                .state('auth', {
                    url: '/auth',
                    templateUrl: '../views/authView.html',
                    controller: 'AuthController as auth'
                })
                .state('users', {
                    url: '/users',
                    templateUrl: '../views/userView.html',
                    controller: 'UserController as user'
                });
        });
})();

/* Here I am loading the ui.router and satellizer modules and setting up some configuration for them.
Satellizer gives us an $authProvider which can be used to configure its settings.
In particular, I want to specify that when using Satellizer to login,
the HTTP requests that get made to retrieve the JWT from the API should go to api/authenticate.
Also use $stateProvider to setup configuration for the two states that we'll be using: auth and users.

Now need to create views for the auth and users states and controllers to handle their behavior. */