<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
/**
 * @SWG\Swagger(
 *     schemes={"http","https"},
 *     host="apiproject.loc",
 *     basePath="/",
 *     @SWG\Info(
 *         version="1.0.0",
 *         title="My API",
 *         description="Api description...",
 *         termsOfService="",
 *         @SWG\Contact(
 *             email="mailpanin@mail.com"
 *         ),
 *         @SWG\License(
 *             name="Private License",
 *             url="127.0.0.1"
 *         )
 *     ),
 *     @SWG\ExternalDocumentation(
 *         description="My back build",
 *         url="http..."
 *     )
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
