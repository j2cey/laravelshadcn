<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * 
 * @property string $code
 * @property string $name
 * @property string $title
 * @property string $description
 * @property integer $category_ref_id
 * @property integer $brand_ref_id
 * @property integer $price
 * @property integer $discount_price
 * @property string $benefits_content
 * @property string $howtouse_content
 * @property string $product_size_id
 * @property integer $is_active
 */
class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        "code",
        "name",
        "title",
        "description",
        "price",
        "brand_ref_id",
        "category_ref_id",
        "discount_price",
        "benefits_content",
        "howtouse_content",
        "product_size_id",
        "product_size_id",
        "is_active",
    ];
}
