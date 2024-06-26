<?php

namespace App\Http\Controllers;

use App\Http\Requests\{CreateFutsalRequest,UpdateFutsalRequest};
use App\Jobs\ProsesUploadFile;
use App\Models\Futsal;
use App\Repositories\CrudRepositories;
use App\Repositories\QueryRepositories;
use Illuminate\Http\Request;

class FutsalController extends Controller
{

    protected $crud,$query;

    public function __construct()
    {
        $this->crud = new CrudRepositories(Futsal::class,4);
        $this->query = new QueryRepositories(Futsal::class,4);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('content.auth.futsal.index',[
            'data' => (auth()->user()->level == 'users') ? $this->crud->all()
             : $this->query->where(['user_id' => auth()->user()->id],['user'],['='])
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view()
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateFutsalRequest $createFutsalRequest)
    {
        $data = $createFutsalRequest->only(['name','description']);

        $data['image'] = ProsesUploadFile::dispatch('assets/img/futsal',$createFutsalRequest->file('image'),'image');
        $data['user_id'] = auth()->user()->id;
        $this->crud->create($data);
        return redirect()->route('futsal.index')->with('success', 'Akun anda berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Futsal $futsal)
    {
        return view('content.auth.futsal.show',[
            'data' => $this->crud->find($futsal->id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Futsal $futsal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFutsalRequest $updateFutsalRequest, Futsal $futsal)
    {
        // if($updateFutsalRequest->file('image'))
        // {
        //     $image = Proses
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Futsal $futsal)
    {
        //
    }
}
