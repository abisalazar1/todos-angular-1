<?php
/**
 * Created by PhpStorm.
 * User: abisalazar
 * Date: 09/09/2017
 * Time: 11:27
 */

namespace App\Repositories;


use App\Task;

class TaskRepository extends MainRepository implements MainRepositoryInterface {

    /**
     * @var Task
     */
    protected $model;

    public function __construct (Task $model)
    {
        $this->model = $model;
    }

    public function getRecords ($attributes)
    {
        return $this->model->where('project_id', $attributes)->get();
    }
}