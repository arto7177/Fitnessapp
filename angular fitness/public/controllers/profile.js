angular.module('app')
    .controller('profile', function($http){
        var self = this;
        $http.get("/profile")
        .success(function(data){
            self.rows = data;
    });
});