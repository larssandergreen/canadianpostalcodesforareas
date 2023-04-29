(function(angular, $, _) {

  angular.module('areas').controller('AreaDefinitionPostalCode5CharsCtl', function ($scope, dialogService) {
    $scope.ts = CRM.ts(null);
    $scope.areaDefinition = angular.copy($scope.model.areaDefinition);

    $scope.save = function() {
    		$scope.areaDefinition.settings_label = $scope.areaDefinition.postal_code_5_chars;
    		$scope.model.areaDefinition = $scope.areaDefinition;
    		dialogService.close('AreaDefinition', $scope.model);
    };

		$scope.cancel = function() {
    	dialogService.cancel('AreaDefinition');
    };

  });

})(angular, CRM.$, CRM._);

