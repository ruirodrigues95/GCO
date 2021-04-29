<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubSubCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['sub_category_id', 'name'];

    public function subcategory() {
      return $this->belongsTo(SubCategory::class);
    }

    public function courses() {
      return $this->hasMany(Course::class);
    }
}
