<?php

namespace App\Http\Controllers;

use App\DataTables\NotesDataTable;
use App\Http\Requests\NotesRequest;
use App\Models\Notes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(NotesDataTable $dataTable)
    {
        return $dataTable->render('notes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    return view('notes.create', array(
	        'status' => Notes::getStatus()
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NotesRequest $request)
    {
        DB::beginTransaction();
        try {
            if (Notes::saveNote($request)) {
                DB::commit();
                Flash::success('admin.msg.create.success');
                return redirect()->route('notes.index');
            } else {
                throw new \Exception();
            }
        } catch (\Exception $e) {
            DB::rollback();
            Flash::error('admin.msg.create.fail');
            return redirect()->route('notes.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $note = Notes::findOrFail($id);
        return view('notes.edit', array(
            'status' => Notes::getStatus(),
            'note' => $note
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NotesRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            if (Notes::saveNote($request, $id)) {
                DB::commit();
                Flash::success(trans('admin.msg.update.success'));
                return redirect()->route('notes.index');
            } else {
                throw new \Exception();
            }
        } catch (\Exception $e) {
            DB::rollback();
            Flash::error(trans('admin.msg.update.fail'));
            return redirect()->route('notes.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
