<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
      protected $table ='sub_categories';

   protected $guarded = [];

   
   public function createdBy()
   {
       return $this->belongsTo(Admin::class, 'created_by');
   }

   public function updatedBy()
   {
       return $this->belongsTo(Admin::class, 'updated_by');
   }

   public function category()
   {
       return $this->belongsTo( Category::class, 'category_id');
   }
}