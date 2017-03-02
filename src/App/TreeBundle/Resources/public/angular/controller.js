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