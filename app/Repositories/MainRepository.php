<?php
/**
 * Created by PhpStorm.
 * User: abisalazar
 * Date: 09/09/2017
 * Time: 11:10
 */

namespace App\Repositories;

abstract class MainRepository {




     public function singleRecord ($id)
     {
         return $this->model->where('id', $id)->first();
     }

     public function addRecord ($attributes)
     {
         return $this->model->FirstOrCreate($attributes);
     }

     public function updateRecord ($attributes, $id)
     {
         return tap($this->model->find($id) , function ($model) use ($attributes, $id) {
             $model->update($attributes);
         });
     }

     public function removeRecord ($id)
     {
         return $this->model->where('id','=',$id)->delete();
     }
 }