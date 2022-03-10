<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LandingPages extends Model
{
    protected $fillable = [
    	'template_id',
        'client_id',
    	'path',
    	'publisher',
    	'title',
    	'referral_code',
        'referral_code_intelliapp',
    	'main_title',
    	'main_description',
    	'benef1_caption',
    	'benef2_caption',
    	'benef3_caption',
    	'benef4_caption',
    	'benef5_caption',
    	'benef6_caption',
    	'benef1_figure',
    	'benef2_figure',
    	'benef3_figure',
    	'benef4_figure',
    	'benef5_figure',
    	'benef6_figure',
    	'benef1_caption_title',
    	'benef2_caption_title',
    	'benef3_caption_title',
    	'benef4_caption_title',
    	'benef5_caption_title',
    	'benef6_caption_title',
    	'body_copy',
    	'phone',
    	'background',
    	'background_mobile',
        'body_image_2',
    	'sub_title',
    	'region_graphic',
    	'region_graphic_mobile',
        'body_image_4',
        'body_image_4_title',
    	'ga_lp',
    	'ga_tp',
    ];
}
