<?php

namespace App\Models\PagesCategories;

use Illuminate\Database\Eloquent\Model;
use App\Models\PagesCategories\Traits\Relationship\PagesCategoriesRelationship;
use App\Models\PagesCategories\Traits\Attribute\PagesCategoriesAttribute;

class PagesCategories extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pages_categories';
    
    use PagesCategoriesRelationship,
        PagesCategoriesAttribute;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id' , 'title'];
}
