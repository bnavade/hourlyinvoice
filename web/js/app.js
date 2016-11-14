'use strict';

angular.module('hourlyInvoice', [])
.factory("Invoice", ['$http', function($http) {
       var invoice = {
           createInvoice: function(formData) {
             var method = 'POST';
             var url = 'http://localhost:8080/hourly/create';
        var request = 
                $http({
                    method: method,
                    url:url,
                    data: formData
        });
        return request;
           }
       };
       return invoice;         
}])
.controller("InvoiceController", ['$scope', '$window', 'Invoice', function($scope, $window, Invoice) {
        $scope.invoice = function() {
            $scope.invoiceButton = true;
            $scope.processing = false;
            $scope.submitted = true;
            $scope.error = {};
            Invoice.createInvoice($scope.loginData)
                            .success(function (response) {
                                $scope.invoiceButton = false;
                                $scope.processing = true;
                                $window.location = "http://localhost:8000/hourly/pdf"; //response.url;
                            })
                            .error(function (errors) {
                                $scope.processing = false;
                                $scope.invoiceButton = false;
                                alert(" An error occured while processing form.");
                                //angular.forEach(errors, function (error) {
                                //    $scope.error[error.field] = error.message;
                                //});
                            });
        };
}]);


