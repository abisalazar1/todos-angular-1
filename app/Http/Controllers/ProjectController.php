<?php

namespace App\Http\Controllers;

use App\Repositories\ProjectRepository;
use Illuminate\Http\Request;

class ProjectController extends Controller {

    /**
     * @var ProjectRepository
     */
    private $project;
    /**
     * @var Request
     */
    private $request;

    public function __construct (ProjectRepository $project , Request $request)
    {
        $this->project = $project;
        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        return $this->project->getRecords($this->request->user()->id);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store (Request $request)
    {
        return $this->project->addRecord($request->only('title' , 'completed' , 'user_id'));
    }


    public function show ($id)
    {
        return view('project.show')->with('project' , $this->project->singleRecord($id));
    }



    public function edit ($id)
    {
        return view('project.edit')->with('project' , $this->project->singleRecord($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update (Request $request , $id)
    {
        return $this->project->updateRecord($request->only(['title' , 'user_id' , 'completed']) , $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy ($id)
    {
        return $this->project->removeRecord($id);
    }
}
