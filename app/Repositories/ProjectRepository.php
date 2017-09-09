<?php
/**
 * Created by PhpStorm.
 * User: abisalazar
 * Date: 09/09/2017
 * Time: 11:26
 */

namespace App\Repositories;




use App\Project;

class ProjectRepository extends MainRepository implements MainRepositoryInterface {

    /**
     * @var Project
     */
    protected $model;

    public function __construct (Project $model)
    {
        $this->model = $model;
    }

    public function getRecords ($id)
    {
        return $this->model->where('user_id', $id)->get();
    }
}