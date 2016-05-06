var module = angular.module("treeApp", []);

module.directive('draggable', function () {
  return {
    restrict: 'A',
    link: function (scope, element, attrs) {
      element[0].addEventListener('dragstart', scope.handleDragStart, false);
      element[0].addEventListener('dragend', scope.handleDragEnd, false);
    }
  }
});

module.directive('droppable', function () {
  return {
    restrict: 'A',
    link: function (scope, element, attrs) {
      element[0].addEventListener('drop', scope.handleDrop, false);
      element[0].addEventListener('dragover', scope.handleDragOver, false);
    }
  }
});



module.controller("treeCtrl", function($scope) {
    $scope.delete = function(data) {
        data.nodes = [];
    };
    $scope.add = function(data) {
        var number = data.nodes.length + 1;
        var name = data.name + '.' + number;
        var id = data.id + '' + number;
        data.nodes.push({id: id, name: name, content: data.content, nodes: []});
    };
     $scope.handleDragStart = function(e){
        this.style.opacity = '0.4';
        e.dataTransfer.setData('text/plain', this.innerHTML);
        /*console.log(e.originalTarget);
        console.log(e.explicitOriginalTarget.nodeValue);*/
        console.log(1);
        
    };
    
    $scope.handleDragEnd = function(e){
        this.style.opacity = '1.0';
        console.log(2);
    };
    
    $scope.handleDrop = function(e){
        e.preventDefault();
        e.stopPropagation();
        var dataText = e.dataTransfer.getData('text/plain');
        $scope.$apply(function() {
            $scope.tree.push(dataText);
        });
        console.log($scope.tree);
        console.log(3);
    };
    
    $scope.handleDragOver = function (e) {
    	console.log(4);
        e.preventDefault(); // Necessary. Allows us to drop.
        e.dataTransfer.dropEffect = 'move';  // See the section on the DataTransfer object.
        return false;
  	};
    $scope.tree = [{id: 1, name: 1, content: "test", nodes: []}];
});














module.controller("MainController", function($scope) {
    $scope.drag_types = [
        {name: "Charan"},
        {name: "Vijay"},
        {name: "Mahesh"},
      {name: "Dhananjay"},
    ];
    $scope.items = [];
    
    $scope.handleDragStart = function(e){
        this.style.opacity = '0.4';
        e.dataTransfer.setData('text/plain', this.innerHTML);
        /*console.log(e.originalTarget);
        console.log(e.explicitOriginalTarget.nodeValue);*/
        console.log(1);
        
    };
    
    $scope.handleDragEnd = function(e){
        this.style.opacity = '1.0';
        console.log(2);
    };
    
    $scope.handleDrop = function(e){
        e.preventDefault();
        e.stopPropagation();
        var dataText = e.dataTransfer.getData('text/plain');
        $scope.$apply(function() {
            $scope.items.push(dataText);
        });
        console.log($scope.items);
        console.log(3);
    };
    
    $scope.handleDragOver = function (e) {
    	console.log(4);
        e.preventDefault(); // Necessary. Allows us to drop.
        e.dataTransfer.dropEffect = 'move';  // See the section on the DataTransfer object.
        return false;
  	};        
});


module.controller("SortableCTRL", function($scope) {
	var sortableEle,
    	toSort = document.getElementById("sortable");

    $scope.sortableArray = [
        'One', 'Two', 'Three'
    ];
    
    $scope.dragStart = function(e, ui) {
        ui.item.data('start', ui.item.index());
    }
    $scope.dragEnd = function(e, ui) {
        var start = ui.item.data('start'),
            end = ui.item.index();
        
        $scope.sortableArray.splice(end, 0, 
            $scope.sortableArray.splice(start, 1)[0]);
        
        $scope.$apply();
    }
        
/*    sortableEle = toSort.sortable({
        start: $scope.dragStart,
        update: $scope.dragEnd
    });*/
});


