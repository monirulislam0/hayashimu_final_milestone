<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    protected $settings = [
        [
            'key'                       =>  'site_name',
            'value'                     =>  'Nutrimart',
        ],
        [
            'key'                       =>  'site_title',
            'value'                     =>  'Nutrimart',
        ],
        [
            'key'                       =>  'default_email_address',
            'value'                     =>  'info@nutrimart.com',
        ],
        [
            'key'                       =>  'site_logo',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'site_favicon',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'footer_copyright_text',
            'value'                     =>  " Nutrimart., All Rights Reserved"
        ],
        [
            'key'                       =>  'seo_meta_title',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'seo_meta_description',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'social_facebook',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'social_instagram',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'social_youtube',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'social_twitter',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'social_linkedin',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'google_analytics',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'google_tag_manager',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'facebook_pixels',
            'value'                     =>  '',
        ],

        [
            'key'                       =>  'mobile',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'phone',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'address_1',
            'value'                     =>  'Dhaka,',
        ],
        [
            'key'                       =>  'address_2',
            'value'                     =>  'Dhaka 1204, Bangladesh.',
        ],
        [
            'key'                       =>  'footer_logo',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'popup',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'is_popup_active',
            'value'                     =>  '',
        ],
    ];

    public function run(): void
    {
        foreach ($this->settings as $index=>$setting){
            $result = Setting::create($setting);
        }
    }
}
