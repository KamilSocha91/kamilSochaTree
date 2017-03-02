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