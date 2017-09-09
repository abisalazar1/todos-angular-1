function TaskController($scope, $http) {



    //Getting Tasks
    $scope.init = function (id) {
        $http.get('/tasks/' + id)
            .success(function (response) {
                $scope.project_id = id;
                $scope.tasks = response;
            });
    };

    //Add Tasks
    $scope.add = function () {
        $http.post('/tasks', {
            name: $scope.name,
            completed: false,
            project_id: $scope.project_id
        }).success(function (response) {
            $scope.tasks.push(response);
            $scope.name = '';
        });
    };

    // Small transformer to completed or not
    $scope.statusTransformer = function (status) {
        return (status)? 'Completed' : 'In progress';
    };
    //Remove Task
    $scope.remove = function (task) {
        $scope.tasks.splice($scope.tasks.indexOf(task), 1);
        $http.delete('/tasks/'+ task.id)
            .success(function () {
                alert('Task has been deleted');
            });
    }

    $scope.update = function (item,index){
        $http.put('/tasks/'+item.id, {
            name: item.name,
            completed: (! item.completed),
            project_id: item.project_id
        }).success(function (response) {
            $scope.tasks[index].completed=response.completed;
        });
    }



}