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

/*		<script type="text/ng-template"  id="tree_item">
			<div class="btn" >
			    <label ng-bind="data.name"></label>
			    <input ng-value="data.content" ng-model="data.content" ng-change="change(data.content, data.id)"></input>
			    <button class="btn__confirm" ng-click="add(data)">Add node</button>
			    <button class="btn__delete" ng-click="delete(data)" ng-show="data.nodes.length > 0">Delete nodes</button>
		    </div>
		    <ul  ui-sortable="sortableOptions" ng-model="data.nodes">
		        <li ng-repeat="data in data.nodes" ng-include="'tree_item'"></li>
		    </ul>
		</script>
		*/