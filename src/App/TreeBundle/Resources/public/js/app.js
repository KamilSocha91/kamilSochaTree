var module = angular.module("treeApp", ['ui.sortable']);

module.controller('treeCtrl', function($scope, $http) {
    $scope.delete = function(data) {
        data.nodes = [];
    };

    $scope.add = function(data) {
        var number = data.nodes.length + 1,
        name = data.name + '.' + number,
        id = data.id + '' + number,
        id = parseInt(id);

        data.nodes.push({id: id, name: name, content: data.content, nodes: []});
    };

    $scope.change = function(content, id) {
		var node = getNodeById(id, $scope.tree);
		node.content = content;
    };

    $scope.getFile = function($fileContent){
    	var jsonTree = validJSON($fileContent);
    		if (jsonTree !== false) {
				$scope.tree = jsonTree;
    		} 
    };

    $scope.load = function(data) {
		$http({
			method: 'GET',
			url: Routing.generate('tree_get',{treeId: data})
		}).then(function successCallback(response) {
		    $scope.tree = response.data.data;
		}, function errorCallback(response) {

		});
    }

    $scope.save = function(data) {
		$http({
			method: 'POST',
            url: Routing.generate('tree_post'),
            data: $scope.tree,
            dataType    : "json"
		}).then(function successCallback(response) {
			$scope.list = response.data.list;
		    $scope.showList = ! $scope.showList;
		}, function errorCallback(response) {

		});
    }
    $scope.tree = [{id: 1, name: 1, content: "", nodes: []}];
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

	function getNodeById(id, node) {
	    var reduce = [].reduce;
	    function runner(result, node){
	        if(result || !node) return result;
	        return node.id === id && node ||
	            runner(null, node.nodes) ||
	            reduce.call(Object(node), runner, result);
	    }
	    return runner(null, node);
	}

	function validJSON(str) {
	    try {
	        return JSON.parse(str);
	    } catch (e) {
	        alert("Corrupted JSON");  
	        return false;
	    }
	}