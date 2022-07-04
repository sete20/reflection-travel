<?php

namespace Database\Seeders;

use App\Domain\Accommodation\Models\Accommodation;
use App\Domain\Accommodation\Models\AccommodationPrice;
use App\Domain\Accommodation\Models\View;
use App\Domain\Blog\Models\Blog;
use App\Domain\Blog\Models\BlogCat;
use App\Domain\Blog\Models\BlogSection;
use App\Domain\Core\Models\Category;
use App\Domain\Core\Models\City;
use App\Domain\Core\Models\Gallery;
use App\Domain\Core\Models\Media;
use App\Domain\Core\Models\Permissions\ModelHasPermissions;
use App\Domain\Core\Models\Permissions\ModelHasRoles;
use App\Domain\Core\Models\Permissions\Permission;
use App\Domain\Core\Models\Permissions\Role;
use App\Domain\Core\Models\Permissions\RoleHasPermissions;
use App\Domain\CoreTour\Models\Attendant;
use App\Domain\CoreTour\Models\Exclude;
use App\Domain\Coretour\Models\Faq;
use App\Domain\Coretour\Models\Faqlink;
use App\Domain\CoreTour\Models\Highlight;
use App\Domain\CoreTour\Models\Highlightlink;
use App\Domain\CoreTour\Models\IncludeModel;
use App\Domain\Coretour\Models\Permit;
use App\Domain\Coretour\Models\Place;
use App\Domain\Coretour\Models\Tip;
use App\Domain\Coretour\Models\TipLink;
use App\Domain\Coretour\Models\Transport;
use App\Domain\Day\Models\Day;
use App\Domain\Day\Models\DayExclude;
use App\Domain\Day\Models\DayInclude;
use App\Domain\Itinerary\Models\Itinerary;
use App\Domain\Step\Models\Step;
use App\Domain\Step\Models\StepExclude;
use App\Domain\Step\Models\StepInclude;
use App\Domain\Tour\Models\Tour;
use App\Domain\Tour\Models\TourCity;
use App\Domain\User\Models\Question;
use App\Domain\User\Models\SocialProvider;
use App\Domain\User\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class FullSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->fSeed();
    }

    private function fSeed()
    {
        //BlogSection::insert(['name' => 'Egypt Wiki']);
        $arr = [
            (object) ['class_name' => City::class, 'file_name' => 'cities'],
            (object) ['class_name' => BlogSection::class, 'file_name' => 'blog_sections'],
            (object) ['class_name' => Place::class, 'file_name' => 'places'],
            (object) ['class_name' => Transport::class, 'file_name' => 'transports'],
            (object) ['class_name' => View::class, 'file_name' => 'views'],
            (object) ['class_name' => User::class, 'file_name' => 'users'],
            (object) ['class_name' => SocialProvider::class, 'file_name' => 'social_providers'],
            (object) ['class_name' => Accommodation::class, 'file_name' => 'accommodations'],
            (object) ['class_name' => AccommodationPrice::class, 'file_name' => 'accommodation_prices'],
            (object) ['class_name' =>  Role::class, 'file_name' => 'roles'],
            (object) ['class_name' => Permission::class, 'file_name' => 'permissions'],
            (object) ['class_name' => ModelHasRoles::class,
                'file_name' => 'model_has_roles', ],
            (object) ['class_name' => ModelHasPermissions::class,
                'file_name' => 'model_has_permissions', ],
            (object) ['class_name' => RoleHasPermissions::class,
                'file_name' => 'role_has_permissions', ],
            (object) ['class_name' => BlogCat::class, 'file_name' => 'blog_cats'],
            (object) ['class_name' => Blog::class, 'file_name' => 'blogs'],
            //(object)['class_name' => Link::class, 'file_name' => 'links'],
            (object) ['class_name' => Question::class, 'file_name' => 'questions'],
            (object) ['class_name' => Attendant::class, 'file_name' => 'attendants'],
            (object) ['class_name' => IncludeModel::class, 'file_name' => 'includes'],
            (object) ['class_name' => Exclude::class, 'file_name' => 'excludes'],
            (object) ['class_name' => Permit::class, 'file_name' => 'permits'],
            (object) ['class_name' => Step::class, 'file_name' => 'steps'],
            (object) ['class_name' => Category::class, 'file_name' => 'categories'],
            (object) ['class_name' => Day::class, 'file_name' => 'days'],
            //(object)['class_name' => Tour::class, 'file_name' => 'tours'],
            (object) ['class_name' => Itinerary::class, 'file_name' => 'itineraries'],
            (object) ['class_name' => TourCity::class, 'file_name' => 'tour_cities'],
            (object) ['class_name' => StepInclude::class, 'file_name' => 'step_includes'],
            (object) ['class_name' => StepExclude::class, 'file_name' => 'step_excludes'],
            (object) ['class_name' => DayInclude::class, 'file_name' => 'day_includes'],
            (object) ['class_name' => DayExclude::class, 'file_name' => 'day_excludes'],
            (object) ['class_name' => Faq::class, 'file_name' => 'faqs'],
            (object) ['class_name' => Highlight::class, 'file_name' => 'highlights'],
            (object) ['class_name' => Tip::class, 'file_name' => 'tips'],
            (object) ['class_name' => Faqlink::class, 'file_name' => 'faqlinks'],
            (object) ['class_name' => Highlightlink::class, 'file_name' => 'highlightlinks'],
            (object) ['class_name' => Tiplink::class, 'file_name' => 'tiplinks'],
            (object) ['class_name' => Gallery::class, 'file_name' => 'galleries'],
            //(object)['class_name' => Media::class, 'file_name' => 'media'],

        ];
        foreach ($arr as $value) {

            $class = $value->class_name;

            $columns = Schema::getColumnListing((new $class)->getTable());

            $records = json_decode(Storage::disk('local')->get("{$value->file_name}.json"), true);

            if($records){
                foreach ($records as $record) {
                    $filtered = Arr::only($record, $columns);
                    $class::insert($filtered);
                }
            }

        }
    }
}
