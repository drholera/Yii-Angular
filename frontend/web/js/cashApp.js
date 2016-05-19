(function () {
    var cashApp = angular.module('cashApp', []);

    cashApp.controller('FormController', function ($scope, $http) {
        $scope.getTransactions = function() {
            $http.get('/backend/web/api/get-transactions').success(function(data, status, headers, config) {
                $scope.transactions = data;
            });
        };
        $scope.getTransactions();

        $scope.submit = function () {
            var amount = $scope.amount;
            var selectedDate = $scope.selectedDate;
            var description = $scope.description;

            $http.get('/backend/web/api/add-record', {
                params: {
                    data: {
                        amount: amount,
                        selectedDate: selectedDate,
                        description: description
                    }
                }
            })
                .then(function successCallback(response) {
                    if(response.data.status === 200) {
                        element = {
                            id: response.data.transaction.id,
                            amount: response.data.transaction.amount,
                            date: new Date(response.data.transaction.date),
                            description: response.data.transaction.description
                        };
                        $scope.getTransactions();
                    }
                });
        };
    });

    cashApp.directive('jqdatepicker', function () {
        return {
            restrict: 'A',
            require: 'ngModel',
            link: function (scope, element, attrs, ctrl) {
                $(element).datepicker({
                    dateFormat: 'dd/mm/yy',
                    onSelect: function (date) {
                        ctrl.$setViewValue(date);
                        ctrl.$render();
                        scope.$apply();
                    }
                });
            }
        };
    });
})();
