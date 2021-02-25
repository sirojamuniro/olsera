<?php

namespace App\Http\Controllers;
use App\Http\Requests\Pajak\CreateRequest;
use App\Http\Requests\Pajak\UpdateRequest;
use App\Models\Pajak;

use Illuminate\Http\Request;

class PajakController extends Controller
{

    public function index()
    {
        $result = Pajak::get();

        return $this->handleResponse(200,'success',$result);

    }
    public function create(CreateRequest $request)
    {
        $createNama = $request->input('nama');

        $createRate = $request->input('rate');

        $result = Pajak::firstOrCreate(['nama'=>$createNama, 'rate'=>$createRate]);

        return $this->handleResponse(200,'success',$result);

    }

    public function update(UpdateRequest $request,$id)
    {
        $find = Pajak::find($id);

        $updateNama = $request->input('nama');
        $updateRate = $request->input('rate');

        $find->update(['nama'=>$updateNama,'rate'=>$updateRate]);

        return $this->handleResponse(200,'success',$find);

    }

    public function delete($id)
    {
        $find = Pajak::findOrFail($id);

        $find->delete();

        return $this->handleResponse(200,'success',$find);

    }
}
