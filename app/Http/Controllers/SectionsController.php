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
            'name' => 'required', 'string',
            'content' => 'required', 'json'
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
     *        description="Banana object",
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
            return response()->json($e);
        }
        return response()->json($item);
    }
}