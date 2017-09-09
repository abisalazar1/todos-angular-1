function ProjectController($scope, $http) {

    //Getting Projects
    $http.get('/projects')
        .success(function (response) {
            $scope.projects = response;
        });

    //Add Projects
    $scope.add = function () {
        $http.post('/projects', {
            title: $scope.title,
            completed: false,
            user_id: $scope.user_id
        }).success(function (response) {
            $scope.projects.push(response);
            $scope.title = '';
        });
    };

    // Small transformer to completed or not
    $scope.statusTransformer = function (status) {
        return (status)? 'Completed' : 'In progress';
    };
    //Remove Project
    $scope.remove = function (project) {
        $scope.projects.splice($scope.projects.indexOf(project), 1);
        $http.delete('/projects/'+ project.id)
            .success(function () {
                alert('Project has been deleted');
            });
    }

    $scope.update = function (id){
        $http.put('/projects/'+id, {
            title: $scope.title,
            completed: $scope.completed,
            user_id: $scope.user_id
        }).success(function (response) {
            alert('Project has been updated');
        });
    }



}