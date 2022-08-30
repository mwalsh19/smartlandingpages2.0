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
		'primary_video_link',
		'secondary_description',
		'extra_section_1_title',
		'extra_section_2_title',
		'extra_section_3_title',
		'extra_section_4_title',
		'extra_section_5_title',
		'extra_section_6_title',
		'extra_section_1_video_link',
		'extra_section_2_video_link',
		'extra_section_3_video_link',
		'extra_section_4_video_link',
		'extra_section_5_video_link',
		'extra_section_6_video_link',
		'extra_section_1_image',
		'extra_section_2_image',
		'extra_section_3_image',
		'extra_section_4_image',
		'extra_section_5_image',
		'extra_section_6_image',
		'extra_section_1_caption',
		'extra_section_2_caption',
		'extra_section_3_caption',
		'extra_section_4_caption',
		'extra_section_5_caption',
		'extra_section_6_caption',
	];
}