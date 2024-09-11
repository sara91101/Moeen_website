<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('homes')->insert([
            //vision
            ['home_ar' => 'تحقيق الاستدامة المالية للقطاع الغير ربحي','home_en' => 'Achieving financial sustainability for the non-profit sector','home_type' => 'Vision',"home_image"=> Null],

            //mission
            ['home_ar' => 'تمكين القطاع الغير ربحي ليكون الذراع التنفيذي للمشاريع الحكومية','home_en' => 'Empowering the non-profit sector to be the executive arm of government projects','home_type' => 'Mission',"home_image"=> Null],

            //about
            ['home_ar' => 'شركة سعودية (غير ربحية ) تعمل في مجال المنافسات الحكومية والشبه حكومية ومشاريع القطاع الخاص، أرباحها تصب في مجالات الجمعيات الخيرية لتحقق لها الريعية والاستدامة المالية وفق ما جاء في عقد التأسيس .','home_en' => 'A Saudi company (non-profit) working in the field of governmental and semi-governmental competitions and private sector projects. Its profits are invested in charitable associations to achieve profitability and financial sustainability according to what is stated in the articles of association.','home_type' => 'Introduction',"home_image"=> Null],
            ['home_ar' => 'الإسناد الحكومي للقطاع الغير ربحي يعتبر رأس الرمح في تمكين القطاع من تحقيق الاستدامة المالية، وتحويله من الريعية إلى الاستثمار جاءت فكرة تأسيس شركة معين التنموية لحلول الأعمال لتكون الذراع الذي يسد هذا الاحتياج من خلال الدخول في المشاريع وتنفيذها بشكل
مباشر أو عن طريق التضامن مع شركاء أكفاء لتحقيق مصلحة القطاع من جهة و مصالح الشركاء من جهة أخرى.','home_en' => 'Government support for the non-profit sector is considered the spearhead in enabling the sector to achieve financial sustainability and transform it from rentierism to investment. The idea of ​​establishing Maeen Development Company for Business Solutions came to be the arm that meets this need by entering into projects and implementing them directly or through solidarity with competent partners to achieve the interests of the sector on the one hand and the interests of the partners on the other hand.','home_type' => 'About',"home_image"=> Null],

            //Goals
            ['home_ar' => 'تمكين المنظمات غير الربحية من تحقيق أثر أعمق.','home_en' => 'Empowering nonprofits to achieve deeper impact.','home_type' => 'Goal',"home_image"=> 'la-hand-holding-heart'],
            ['home_ar' => 'تشجيع العمل التطوعي.','home_en' => 'Encouraging volunteer work.','home_type' => 'Goal',"home_image"=> 'las la-thumbs-up'],
            ['home_ar' => 'دعم نمو القطاع غير الربحي.','home_en' => 'Support the growth of the non-profit sector.','home_type' => 'Goal',"home_image"=> 'bx bx-dollar-circle'],
            ['home_ar' => 'تحسين فاعلية وكفاءة الخدمات الاجتماعية.','home_en' => 'Improving the effectiveness and efficiency of social services.','home_type' => 'Goal',"home_image"=> 'bx bx-alarm'],

            //Motivators
            ['home_ar' => 'الأولوية في المشاريع','home_en' => 'Priority in projects.','home_type' => 'Motivator',"home_image"=> 'las la-list-alt'],
            ['home_ar' => 'الاعفاء من الضمان الابتدائي.','home_en' => 'Exemption from initial guarantee.','home_type' => 'Motivator',"home_image"=> 'la-money-bill-wave'],
            ['home_ar' => 'الاسترداد الضريبي.','home_en' => 'Tax refund.','home_type' => 'Motivator',"home_image"=> 'las la-hand-holding-usd'],
            ['home_ar' => 'الإعتماد من الضمان النهائية.','home_en' => 'Final Warranty Accreditation.','home_type' => 'Motivator',"home_image"=> 'las la-handshake'],

            //results
            ['home_ar' => 'تحقيق الاستدامة المالية.','home_en' => 'Achieving financial sustainability.','home_type' => 'Result',"home_image"=> 'las la-balance-scale'],
            ['home_ar' => 'تكوين وحدات موهلة لادارة المنافسات.','home_en' => 'Formation of qualified units to manage competitions.','home_type' => 'Result',"home_image"=> 'la-layer-group'],
            ['home_ar' => 'اتساع  دور الجمعيات وأثرها في المجتمع.','home_en' => 'The expansion of the role of associations and their impact on society.','home_type' => 'Result',"home_image"=> 'las la-city'],
            ['home_ar' => 'زيادة فعالية الجمعيات من خلال الشراكة مع القطاعات الأخرى.','home_en' => 'Increase the effectiveness of associations through partnership with other sectors.','home_type' => 'Result',"home_image"=> 'las la-handshake'],
            ['home_ar' => 'تحسين ال صوره الذهنية للجمعيات لدي الجهات الاخري','home_en' => "Improving the associations' image with other parties",'home_type' => 'Result',"home_image"=> 'las la-brain'],

        ]);

    }
}
