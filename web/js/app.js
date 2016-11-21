'use strict';

angular.module('hourlyInvoice', [])
.config(function($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
})
.factory("Invoice", ['$http', function($http) {
       var invoice = {
           createInvoice: function(formData) {
             var method = 'POST';
             var url = 'http://localhost:8000/api/invoice/create';
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
            $scope.invoiceButton = true;
            $scope.processing = false;
            $scope.submitted = true;
            $scope.error = {};
            $scope.invoice = function() {
                Invoice.createInvoice($scope.invoiceData)
                            .success(function (response) {
                                $scope.invoiceButton = false;
                                $scope.processing = true;
                                $window.location = "http://localhost:8000/hourly/pdf"; //response.url;
                            })
                            .error(function (errors) {
                                $scope.processing = false;
                                $scope.invoiceButton = false;
                                var children = errors.errors;
                                angular.forEach(children, function (error) {
                                    $scope.billToError = error.billTo.errors[0];
                                    $scope.descriptionError = error.description.errors[0];
                                    $scope.hourlyPriceError = error.hourlyPrice.errors[0];
                                    $scope.hoursError = error.hours.errors[0];
                                    console.log(error);
                                });
                            });
        };
}]);

