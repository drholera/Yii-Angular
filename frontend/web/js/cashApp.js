(function () {
    var cashApp = angular.module('cashApp', ['ui.bootstrap']);

    cashApp.controller('FormController', ['$scope', function($scope) {
        $scope.submit = function() {
            var amount = $scope.amount;
            var selectedDate = $scope.selectedDate;
            var description = $scope.description;

            console.log(amount + ' ' + selectedDate + ' ' + description);
        }
    }]);
})();
