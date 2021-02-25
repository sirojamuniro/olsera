<?php

namespace App\Http\Controllers;
use App\Http\Requests\Items\CreateRequest;
use App\Http\Requests\Items\UpdateRequest;
use  App\Models\Item;

use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function index()
    {
        $result = Item::get();

        return $this->handleResponse(200,'success',$result);

    }

    public function create(CreateRequest $request)
    {
        $create = $request->input('nama');

        $result = Item::firstOrCreate(['nama'=>$create]);

        return $this->handleResponse(200,'success',$result);

    }

    public function update(UpdateRequest $request,$id)
    {
        $find = Item::find($id);

        $update = $request->input('nama');

        $find->update(['nama'=>$update]);

        return $this->handleResponse(200,'success',$find);

    }

    public function delete($id)
    {
        $find = Item::findOrFail($id);

        $find->delete();

        return $this->handleResponse(200,'success',$find);

    }
}
