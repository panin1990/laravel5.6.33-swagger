<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @SWG\Definition(
 *     definition="section",
 *     required={"name", "content"},
 *     @SWG\Property(
 *          property="name",
 *          type="string",
 *          description="name of section",
 *          example="footer section"
 *    ),
 *     @SWG\Property(
 *          property="content",
 *          type="object",
 *          description="content of section (JSON.stringify fromat!!!)",
 *          example={"test":"test"}
 *    ))
 */

/** @SWG\Definition(
 *     definition="sections",
 *     allOf = {
 *          { "$ref": "#/definitions/section" },
 *     }
 * )
 */

class Section extends Model
{
    protected $table = 'sections';
    protected $fillable = ['name', 'content'];
    protected $hidden = ['created_at', 'updated_at'];
}
