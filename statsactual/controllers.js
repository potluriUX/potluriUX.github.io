

var StatsControllers = angular.module("StatsControllers", []);


StatsControllers.directive('modalDialog', function() {
  return {
    restrict: 'E',//element
    scope: {
      show: '=',
      info:"="//vvvvv imp @potluri we passed 'info' from controller template(report.php) to the directive template(modal.php)!!
      ,changednameofinfo:"=info"
    },
    replace: true, // Replace with the template below
    transclude: true, // we want to insert custom content inside the directive
    link: function(scope, element, attrs) {
      scope.dialogStyle = {};
      
     
      if (attrs.width)
        scope.dialogStyle.width = attrs.width;
      if (attrs.height)
        scope.dialogStyle.height = attrs.height;
      scope.hideModal = function(param) {
          if(param == true){
              
          }else{
        scope.show = false;
    }
  //  scope.info = 'asdfasdfasdfasdf'; //this changes the loading_image_show variable in controller. two way data binding
  //two way databinding between directive <->controller vv imp.
      };
    
    },
  //   controller: "ReportController",//very nice. we can pass controller variables to the template thru this
    templateUrl: "./partials/includes/modal.php",
  };
});
StatsControllers.directive('modalDialoge', function() {
  return {
    restrict: 'E',
    scope: {
      show: '='},
    ////element
//    scope: {
//      show: '=',
//      info:"="//vvvvv imp @potluri we passed 'info' from controller template(report.php) to the directive template(modal.php)!!
//      ,changednameofinfo:"=info"
//    },
//    replace: true, // Replace with the template below
//    transclude: true, // we want to insert custom content inside the directive
    link: function(scope, element, attrs) {
      scope.dialogStyle = {};
      
     
      if (attrs.width)
        scope.dialogStyle.width = attrs.width;
      if (attrs.height)
        scope.dialogStyle.height = attrs.height;
    scope.hideModal=function(){
        scope.show=true;
    };
},

  templateUrl: "./partials/includes/modal2.php",
  };
});

StatsControllers.directive('header', function () {
    return {
        restrict: 'A', //This menas that it will be used as an attribute and NOT as an element. I don't like creating custom HTML elements
        replace: true,
        templateUrl: "./partials/includes/header.php",
        controller: ['$scope', '$filter', function ($scope, $filter) {
            // Your behaviour goes here :)
        }]
    }
});
StatsControllers.directive('footer', function () {
    return {
        restrict: 'A', //This menas that it will be used as an attribute and NOT as an element. I don't like creating custom HTML elements
        replace: true,
        templateUrl: "./partials/includes/footer.php",
        controller: ['$scope', '$filter', function ($scope, $filter) {
                $scope.date = new Date();
            // Your behaviour goes here :)
        }]
    }
});
StatsControllers.directive('myCustomer', function() {
  return {
    template: 'Name: {{item.name}} Address: {{item.description}}'
  };
});

StatsControllers.directive("myClick", function () {

        return {

           link: function (scope, element, attr) {

               element.bind("click", function () {

                    alert("I was clicked");

               });

           }

       };

   });
   
  StatsControllers.
    directive('myBackgroundImage', function () {
        return function (scope, element, attrs) {
            element.css({
                'background-image': 'url(' + attrs.myBackgroundImage + ')',
                    'background-size': 'cover',
                    'background-repeat': 'no-repeat',
                    'background-position': 'center center'
            });
        };
    });
      StatsControllers.directive('rotateOnClick', function() {
  return {
    restrict: 'A',
    link: function(scope, element, attrs) {
      var deg = 0;
      element.bind('click', function() {
        deg+= parseInt(attrs.rotateOnClick, 10);
        element.css({
          webkitTransform: 'rotate('+deg+'deg)', 
          mozTransform: 'rotate('+deg+'deg)', 
          msTransform: 'rotate('+deg+'deg)', 
          oTransform: 'rotate('+deg+'deg)', 
          transform: 'rotate('+deg+'deg)'    
        });
      });
    }
  };
});

StatsControllers.directive('toolbarTip', function() {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
           // console.log(scope.$eval(attrs.toolbarTip));
            $(element).toolbar(scope.$eval(attrs.toolbarTip));
        }
    };
});