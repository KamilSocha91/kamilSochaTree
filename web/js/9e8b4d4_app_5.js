var module = angular.module("treeApp", ['ui.sortable']);

module.controller('treeCtrl', function($scope, $http, Tree) {
	$scope.new = function() {
		Tree.clearFileInput();
		$scope.tree = [{id: 1, name: 1, content: "", nodes: []}];
    };

    $scope.delete = function(data) {
        data.nodes = [];
    };

    $scope.add = function(data) {
        var number = data.nodes.length + 1,
        name = data.name + '.' + number,
        id = parseInt(data.id + '' + number);

        data.nodes.push({id: id, name: name, content: data.content, nodes: []});
    };

    $scope.load = function(data) {
    	Tree.clearFileInput();
		Tree.load(data).success(function(response) {
			$scope.tree = response.data;
		});
    }

    $scope.save = function() {
		Tree.save(this.tree).success(function(response) {
			$scope.list = response.list;
		    $scope.showList = ! $scope.showList;
		});
    }

    $scope.change = function(content, id) {
		var node = Tree.getNodeById(id, $scope.tree);
		node.content = content;
    };

    $scope.getFile = function($fileContent) {
		$scope.tree = Tree.validJSON($fileContent);
    };
});

module.service( 'Tree', function($http) {
	this.load = function (id) {
		return  $http({ 
	    	method: 'GET', 
	    	url: Routing.generate('tree_get',{treeId: id})
		});
	};
	this.save = function (data) {
		return 	$http({
			method: 'POST',
            url: Routing.generate('tree_post'),
            data: data,
            dataType: "json"
        });
	};
	this.validJSON = function(str) {
	    try {
	        return JSON.parse(str);
	    } catch (e) {
	        return {error: "Not valid JSON"};
	    }
	};
	this.getNodeById = function(id, node) {
	    var reduce = [].reduce;
	    function runner(result, node){
	        if(result || !node) return result;
	        return node.id === id && node ||
	            runner(null, node.nodes) ||
	            reduce.call(Object(node), runner, result); //call prototype
	    }
	    return runner(null, node);
	};
	this.clearFileInput = function() {
		document.getElementsByName('jsonFile')[0].value = '';
	}
});

module.directive('onReadFile', function ($parse) {
	return {
		restrict: 'A',
		scope: false,
		link: function(scope, element, attrs) {
            var fn = $parse(attrs.onReadFile);
            
			element.on('change', function(onChangeEvent) {
				var reader = new FileReader();
				reader.onload = function(onLoadEvent) {
					scope.$apply(function() {
						fn(scope, {$fileContent:onLoadEvent.target.result});
					});
				};

				reader.readAsText((onChangeEvent.srcElement || onChangeEvent.target).files[0]);
			});
		}
	};
});