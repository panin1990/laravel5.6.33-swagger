<?php

namespace App\Http\Controllers;

use App\Section;
use Illuminate\Http\Request;

class SectionsController extends Controller
{
    /**
     * @SWG\Post(path="/sections",
     *   tags={"sections"},
     *   summary="Create sections",
     *   description="",
     *   operationId="createSections",
     *   produces={"application/json"},
     *   @SWG\Parameter(
     *        name="section",
     *        in="body",
     *        required=true,
     *        description="sections object",
     *        @SWG\Property(ref="#/definitions/section")
     *   ),
     *   @SWG\Response(response=200, description="successful operation", @SWG\Schema(ref="#/definitions/section"))
     * )
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'content' => 'required|json'
        ]);
        $newItem = Section::create($request->all());
        return response()->json($newItem);
    }

    /**
     * @SWG\Put(path="/sections/{id}",
     *   tags={"sections"},
     *   summary="Update section by id",
     *   description="",
     *   operationId="update",
     *   produces={"application/json"},
     *   @SWG\Parameter(
     *        name="id",
     *        in="path",
     *        required=true,
     *        type="integer",
     *        description="section id",
     * 	 ),
     *   @SWG\Parameter(
     *        name="section",
     *        in="body",
     *        required=true,
     *        description="section object",
     *        @SWG\Property(ref="#/definitions/section")
     *   ),
     *   @SWG\Response(response=200, description="successful operation", @SWG\Schema(ref="#/definitions/section"))
     * )
     */
    public function update(Request $request, $id){
        try {
            $item = Section::find($id);
            $this->validate($request, [
                'name' => 'string',
                'content' => 'json'
            ]);
            $item->update( $request->all() );

        } catch ( \Exception $e) {
            return response('', 500)->json($e);
        }
        return response()->json($item);
    }


    /**
     * @SWG\Delete(path="/sections/{id}",
     *   tags={"sections"},
     *   summary="Delete section by id",
     *   description="",
     *   operationId="delete",
     *   produces={"application/json"},
     *   @SWG\Parameter(
     *        name="id",
     *        in="path",
     *        required=true,
     *        type="integer",
     *        description="section id",
     * 	 ),
     *   @SWG\Response(response=200, description="successful operation", @SWG\Schema(ref="#/definitions/section"))
     * )
     */
    public function delete($id){
        $item = Section::find($id);
        if ($item){
            $item->delete();
        } else {
            return response('', 500)->json('no object');
        }
        return response()->json('Removed successfully.');
    }


    /**
     * @SWG\Get(path="/sections/{id}",
     *   tags={"sections"},
     *   summary="Get section by id",
     *   description="",
     *   operationId="getById",
     *   produces={"application/json"},
     *   @SWG\Parameter(
     *        name="id",
     *        in="path",
     *        required=true,
     *        type="integer",
     *        description="sections id",
     * 	 ),
     *   @SWG\Response(response=200, description="successful operation", @SWG\Schema(ref="#/definitions/section"))
     * )
     */
    public function getById($id){
        $item = Section::find($id);
        if (!$item){
            return response('', 500)->json('no object');
        }
        return response()->json($item);
    }

    /**
     * @SWG\Get(path="/sections",
     *   tags={"sections"},
     *   summary="Get sections",
     *   description="",
     *   operationId="get",
     *   produces={"application/json"},
     *   @SWG\Response(response=200, description="successful operation", @SWG\Schema(ref="#/definitions/section"))
     * )
     */
    public function get(){
        $items = Section::get();
        return response()->json($items);
    }
}