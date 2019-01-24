<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Response;
use Validator;

abstract class BaseControllerAbstractClass extends Controller {

    //todo Exceptions, user auth methods

    function __construct()
    {
        if (!($this->modelClass instanceof Model || is_array($this->validateRules))) {
            echo Response::json('object not found', 404, []);
            die;
        }
    }

    protected $modelClass;
    protected $validateRules;

    protected function validateRequest(Request $request, string $functionName)
    {
        if (isset ($this->validateRules[$functionName])) {
            $this->validate($request, $this->validateRules[$functionName]);
        }
    }

    public function create(Request $request)
    {
        $this->validateRequest($request, __FUNCTION__);
        $newItem = $this->modelClass::create($request->all());
        return response()->json($newItem);
    }

    public function update(Request $request, int $id)
    {
        $this->validateRequest($request, __FUNCTION__);
        $item = $this->modelClass::findOrFail($id);
        $item->update( $request->all() );
        return response()->json($item);
    }

    public function delete(int $id)
    {
        $item = $this->modelClass::findOrFail($id);
        $item->delete();
        return response()->json('Removed successfully.');
    }

    public function get()
    {
        $items = $this->modelClass::get();
        return response()->json($items);
    }

    public function getById(int $id)
    {
        $item = $this->modelClass::findOrFail($id);
        return response()->json($item);
    }
}