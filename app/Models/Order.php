<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
      'posted_by',
      'customer_name',
      'customer_contact',
      'booking_date',
      'delivery_date',
      'invoice_no',
      'neck',
      'shoulder',
      'arms',
      'biceps',
      'chest',
      'back',
      'belly',
      'wc_length',
      'pc_length',
      'sherwani_length',
      'kurta_length',
      'waist',
      'hips',
      'thigh',
      'knee',
      'calf',
      'botton',
      'length',
      'ref_color',
      'ref_design',
      'ref_images',
      'order_price',
      'order_desc',
      'turban',
      'sherwani',
      'inner_suit',
      'shawal',
      'waist_coat',
      'prince_coat',
      'khussa_shoes',
    ];
}
