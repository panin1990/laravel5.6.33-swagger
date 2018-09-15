<?php

namespace App\Http\Controllers;

class SectionsController extends BaseControllerAbstractClass
{
    protected $modelClass = 'App\Section';
    protected $validateRules = [
        'create' => [
            'name' => 'required|string',
            'content' => 'required|json'
        ],
        'update' => [
            'name' => 'string',
            'content' => 'json'
        ]
    ];

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
}