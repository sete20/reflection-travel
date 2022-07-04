<?php

namespace Database\Seeders;

use App\Domain\Core\Models\Page;
use Illuminate\Database\Seeder;

class StaticPagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->loadStaticPages();
    }

    public function loadStaticPages(): void
    {
        $baseBody = [
            'ar' => 'محتوي الصفحة فارغ حاليا',
            'en' => 'page content is empty',
        ];
        $data = [
            [
                'key'   => Page::TERMS,
                'title' => [
                    'ar' => 'القواعد والشروط',
                    'en' => 'Terms and conditions',
                ],
                'body'  => $baseBody,
            ],
            [
                'key'   => Page::PRIVACY,
                'title' => [
                    'ar' => 'سياسة الخصوصية',
                    'en' => 'Privacy Policy',
                ],
                'body'  => $baseBody,
            ],
            [
                'key'   => Page::ABOUT,
                'title' => [
                    'ar' => 'من نحن',
                    'en' => 'About us',
                ],
                'body'  => $baseBody,
            ],
            [
                'key'   => Page::COMPANY_HISTORY,
                'title' => [
                    'ar' => 'تاريخ الشركة',
                    'en' => 'Company history',
                ],
                'body'  => $baseBody,
            ],
            [
                'key'   => Page::LEGAL,
                'title' => [
                    'ar' => 'قانوني',
                    'en' => 'Legal',
                ],
                'body'  => $baseBody,
            ],
            [
                'key'   => Page::PARTNERS,
                'title' => [
                    'ar' => 'الشركاء',
                    'en' => 'Partners',
                ],
                'body'  => $baseBody,
            ],
            [
                'key'   => Page::PAYMENT,
                'title' => [
                    'ar' => 'وسائل الدفع',
                    'en' => 'Payment',
                ],
                'body'  => $baseBody,
            ],
            [
                'key'   => Page::FEEDBACK,
                'title' => [
                    'ar' => 'آراء العملاء',
                    'en' => 'Feedback',
                ],
                'body'  => $baseBody,
            ],
            [
                'key'   => Page::POLICIES,
                'title' => [
                    'ar' => 'السياسات',
                    'en' => 'Policies',
                ],
                'body'  => $baseBody,
            ],
        ];
        collect($data)->each(fn ($i) => Page::updateOrCreate(['key' => $i['key']], $i));
        echo 'Pages Created Successfully'.PHP_EOL;
    }
}
