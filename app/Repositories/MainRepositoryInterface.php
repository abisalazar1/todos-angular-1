<?php
/**
 * Created by PhpStorm.
 * User: abisalazar
 * Date: 09/09/2017
 * Time: 11:08
 */

namespace App\Repositories;


interface MainRepositoryInterface {

    public function getRecords ($attributes);

    public function singleRecord ($id);

    public function addRecord ($attributes);

    public function updateRecord ($attributes, $id);

    public function removeRecord ($id);

}