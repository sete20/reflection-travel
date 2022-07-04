<?php

namespace App\Http\Controllers\Dashboard\Core;

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
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Schema;

class SaveController extends Controller
{
    private $data = [];

    public function __invoke()
    {

        $this->saveCities();
        $this->savePlaces();
        $this->saveTransports();
        $this->saveViews();
        $this->saveUsers();
        $this->saveSocialProviders();
        $this->saveAccommodations();
        $this->saveAccommodationPrices();
        $this->saveRoles();
        $this->savePermissions();
        $this->saveModelHasRoles();
        $this->saveModelHasPermissions();
        $this->saveRoleHasPermissions();
        $this->saveBlogSections();
        $this->saveBlogCats();
        $this->saveBlogs();
        //$this->saveLinks();
        $this->saveQuestions();
        $this->saveSteps();
        $this->saveCategories();
        $this->saveTours();
        $this->saveItineraries();
        $this->saveTourCities();

        $this->saveAttendants();
        $this->saveIncludes();
        $this->saveExcludes();
        $this->savePermits();
        $this->saveDays();
        $this->saveStepIncludes();
        $this->saveStepExcludes();
        $this->saveDayIncludes();
        $this->saveDayExcludes();
        $this->saveFaqs();
        $this->saveHighlights();
        $this->saveTips();
        $this->saveFaqlinks();
        $this->saveHighlightlinks();
        $this->saveTiplinks();
        $this->saveGalleries();
        $this->saveMedia();

        return redirect()->route('dashboard.home');
    }

    private function saveCities()
    {
        $columns = Schema::getColumnListing((new City)->getTable());
        $data = City::get()->toJson();
        Storage::disk('local')->put('cities.json', $data);
        toast(__('Cities saved success'), 'success');
    }

    private function savePlaces()
    {
        $columns = Schema::getColumnListing((new Place)->getTable());
        Storage::disk('local')->put('places.json', Place::select($columns)->get()->toJson());
        toast(__('Places saved success.'), 'success');
    }

    private function saveTransports()
    {
        $columns = Schema::getColumnListing((new Transport)->getTable());
        Storage::disk('local')->put('transports.json', Transport::select($columns)->get()->toJson());
        toast(__('Transports saved success.'), 'success');
    }

    private function saveViews()
    {
        $columns = Schema::getColumnListing((new View)->getTable());
        Storage::disk('local')->put('views.json', View::select($columns)->get()->toJson());
        toast(__('Views saved success.'), 'success');
    }

    private function saveUsers()
    {
        $columns = Schema::getColumnListing((new User)->getTable());
        Storage::disk('local')->put('users.json', User::select($columns)->get()->toJson());
        toast(__('Users saved success.'), 'success');
    }

    private function saveSocialProviders()
    {
        $columns = Schema::getColumnListing((new SocialProvider)->getTable());
        Storage::disk('local')->put('social_providers.json', SocialProvider::select($columns)->get()->toJson());
        toast(__('Social Providers saved success.'), 'success');
    }

    private function saveAccommodations()
    {
        $columns = Schema::getColumnListing((new Accommodation)->getTable());
        Storage::disk('local')->put('accommodations.json', Accommodation::select($columns)->get()->makeHidden(['view_ids'])->toJson());
        toast(__('Accommodations saved success.'), 'success');
    }

    private function saveAccommodationPrices()
    {
        $columns = Schema::getColumnListing((new AccommodationPrice)->getTable());
        Storage::disk('local')->put('accommodation_prices.json', AccommodationPrice::select($columns)->get()->toJson());
        toast(__('Accommodation prices saved success.'), 'success');
    }

    private function saveRoles()
    {
        $columns = Schema::getColumnListing((new Role)->getTable());
        Storage::disk('local')->put('roles.json', Role::select($columns)->get()->toJson());
        toast(__('Roles saved success.'), 'success');
    }

    private function savePermissions()
    {
        $columns = Schema::getColumnListing((new Permission)->getTable());
        Storage::disk('local')->put('permissions.json', Permission::select($columns)->get()->toJson());
        toast(__('Permissions saved success.'), 'success');
    }

    private function saveModelHasRoles()
    {
        $columns = Schema::getColumnListing((new ModelHasRoles)->getTable());
        Storage::disk('local')->put('model_has_roles.json', ModelHasRoles::select($columns)->get()->toJson());
        toast(__('Model has roles saved success.'), 'success');
    }

    private function saveModelHasPermissions()
    {
        $columns = Schema::getColumnListing((new ModelHasPermissions)->getTable());
        Storage::disk('local')->put('model_has_permissions.json', ModelHasPermissions::select($columns)->get()->toJson());
        toast(__('Model has permissions saved success.'), 'success');
    }

    private function saveRoleHasPermissions()
    {
        $columns = Schema::getColumnListing((new RoleHasPermissions)->getTable());
        Storage::disk('local')->put('role_has_permissions.json', RoleHasPermissions::select($columns)->get()->toJson());
        toast(__('Role has permissions saved success.'), 'success');
    }

    private function saveBlogSections()
    {
        $columns = Schema::getColumnListing((new BlogSection)->getTable());
        Storage::disk('local')->put('blog_sections.json', BlogSection::select($columns)->get()->toJson());
        toast(__('Blog Sections saved success.'), 'success');
    }

    private function saveBlogCats()
    {
        $columns = Schema::getColumnListing((new BlogCat)->getTable());
        Storage::disk('local')->put('blog_cats.json', BlogCat::select($columns)->get()->toJson());
        toast(__('Blog cats saved success.'), 'success');
    }

    private function saveBlogs()
    {
        $columns = Schema::getColumnListing((new Blog)->getTable());
        Storage::disk('local')->put('blogs.json', Blog::select($columns)->get()->toJson());
        toast(__('Blogs saved success.'), 'success');
    }

    private function saveLinks()
    {
        $columns = Schema::getColumnListing((new Link)->getTable());
        Storage::disk('local')->put('links.json', Link::select($columns)->get()->toJson());
        toast(__('Links saved success.'), 'success');
    }

    private function saveQuestions()
    {
        $columns = Schema::getColumnListing((new Question)->getTable());
        Storage::disk('local')->put('questions.json', Question::select($columns)->get()->toJson());
        toast(__('Questions saved success.'), 'success');
    }

    private function saveSteps()
    {
        $columns = Schema::getColumnListing((new Step)->getTable());
        Storage::disk('local')->put('steps.json', Step::select($columns)->get()->toJson());
        toast(__('Steps saved success.'), 'success');
    }

    private function saveCategories()
    {
        $columns = Schema::getColumnListing((new Category)->getTable());
        Storage::disk('local')->put('categories.json', Category::select($columns)->get()->toJson());
        toast(__('Categories saved success.'), 'success');
    }

    private function saveTours()
    {
        $columns = Schema::getColumnListing((new Tour)->getTable());
        Storage::disk('local')->put('tours.json', Tour::select($columns)->get()->toJson());
        toast(__('Tours saved success.'), 'success');
    }

    private function saveItineraries()
    {
        $columns = Schema::getColumnListing((new Itinerary)->getTable());
        Storage::disk('local')->put('itineraries.json', Itinerary::select($columns)->get()->toJson());
        toast(__('Itineraries saved success.'), 'success');
    }

    private function saveTourCities()
    {
        $columns = Schema::getColumnListing((new TourCity)->getTable());
        Storage::disk('local')->put('tour_cities.json', TourCity::select($columns)->get()->toJson());
        toast(__('Tour cities saved success.'), 'success');
    }

    private function saveAttendants()
    {
        $columns = Schema::getColumnListing((new Attendant)->getTable());
        Storage::disk('local')->put('attendants.json', Attendant::select($columns)->get()->toJson());
        toast(__('Attendants saved success.'), 'success');
    }

    private function saveIncludes()
    {
        $columns = Schema::getColumnListing((new IncludeModel)->getTable());
        Storage::disk('local')->put('includes.json', IncludeModel::select($columns)->get()->toJson());
        toast(__('Includes saved success.'), 'success');
    }

    private function saveExcludes()
    {
        $columns = Schema::getColumnListing((new Exclude)->getTable());
        Storage::disk('local')->put('excludes.json', Exclude::select($columns)->get()->toJson());
        toast(__('Excludes saved success.'), 'success');
    }

    private function savePermits()
    {
        $columns = Schema::getColumnListing((new Permit)->getTable());
        Storage::disk('local')->put('permits.json', Permit::select($columns)->get()->toJson());
        toast(__('Permits saved success.'), 'success');
    }

    private function saveDays()
    {
        $columns = Schema::getColumnListing((new Day)->getTable());
        Storage::disk('local')->put('days.json', Day::select($columns)->get()->toJson());
        toast(__('Days saved success.'), 'success');
    }

    private function saveStepIncludes()
    {
        $columns = Schema::getColumnListing((new StepInclude)->getTable());
        Storage::disk('local')->put('step_includes.json', StepInclude::select($columns)->get()->toJson());
        toast(__('Step includes saved success.'), 'success');
    }

    private function saveStepExcludes()
    {
        $columns = Schema::getColumnListing((new StepExclude)->getTable());
        Storage::disk('local')->put('step_excludes.json', StepExclude::select($columns)->get()->toJson());
        toast(__('Step excludes saved success.'), 'success');
    }

    private function saveDayIncludes()
    {
        $columns = Schema::getColumnListing((new DayInclude)->getTable());
        Storage::disk('local')->put('day_includes.json', DayInclude::select($columns)->get()->toJson());
        toast(__('Day includes saved success.'), 'success');
    }

    private function saveDayExcludes()
    {
        $columns = Schema::getColumnListing((new DayExclude)->getTable());
        Storage::disk('local')->put('day_excludes.json', DayExclude::select($columns)->get()->toJson());
        toast(__('Day excludes saved success.'), 'success');
    }

    private function saveFaqs()
    {
        $columns = Schema::getColumnListing((new Faq)->getTable());
        Storage::disk('local')->put('faqs.json', Faq::select($columns)->get()->toJson());
        toast(__('FAQs saved success.'), 'success');
    }

    private function saveHighlights()
    {
        $columns = Schema::getColumnListing((new Highlight)->getTable());
        Storage::disk('local')->put('highlights.json', Highlight::select($columns)->get()->toJson());
        toast(__('Highlights saved success.'), 'success');
    }

    private function saveTips()
    {
        $columns = Schema::getColumnListing((new Tip)->getTable());
        Storage::disk('local')->put('tips.json', Tip::select($columns)->get()->toJson());
        toast(__('Tips saved success.'), 'success');
    }

    private function saveFaqlinks()
    {
        $columns = Schema::getColumnListing((new Faqlink)->getTable());
        Storage::disk('local')->put('faqlinks.json', Faqlink::select($columns)->get()->toJson());
        toast(__('FAQ links saved success.'), 'success');
    }

    private function saveHighlightlinks()
    {
        $columns = Schema::getColumnListing((new Highlightlink)->getTable());
        Storage::disk('local')->put('highlightlinks.json', Highlightlink::select($columns)->get()->toJson());
        toast(__('Highlight links saved success.'), 'success');
    }

    private function saveTiplinks()
    {
        $columns = Schema::getColumnListing((new Tiplink)->getTable());
        Storage::disk('local')->put('tiplinks.json', Tiplink::select($columns)->get()->toJson());
        toast(__('Tip links saved success.'), 'success');
    }

    private function saveGalleries()
    {
        $columns = Schema::getColumnListing((new Gallery)->getTable());
        Storage::disk('local')->put('galleries.json', Gallery::select($columns)->get()->toJson());
        toast(__('Galleries saved success.'), 'success');
    }

    private function saveMedia()
    {
        $columns = Schema::getColumnListing((new Media)->getTable());
        Storage::disk('local')->put('media.json', Media::select($columns)->get()->toJson());
        toast(__('All Data Saved'), 'success');
    }
}
