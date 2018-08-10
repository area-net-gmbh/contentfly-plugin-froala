(function() {
  'use strict';

  angular
    .module('app')
    .directive('pimFroala', pimFroala);


  function pimFroala(localStorageService){
    return {
      restrict: 'E',
      scope: {
        key: '=', config: '=', value: '=', isValid: '=', isSubmit: '=', onChangeCallback: '&'
      },
      templateUrl: function(){
        return '/plugins/Areanet_Froala/types/froala/froala.html?v=400'
      },
      link: function(scope, element, attrs){
        scope.froalaOptions = JSON.parse(scope.config.rteToolbar);
        scope.froalaOptions.key = scope.config.froalaKey;

        scope.disabled = !parseInt(attrs.writable) || scope.config.readonly;
        if(scope.disabled){
          element.find('[contenteditable]').removeAttr('contenteditable');
        }

        if(scope.value === undefined && scope.config.default != null){
          scope.value     = (scope.config.default);
        }

        scope.$watch('value',function(data){

          scope.disabled  = !parseInt(attrs.writable) || scope.config.readonly;
          if(scope.disabled){
            element.find('[contenteditable]').removeAttr('contenteditable');
          }

          if(scope.disabled){
            return;
          }


          scope.onChangeCallback({key: scope.key, value: scope.value});

        },true)
      }
    }
  }

})();
