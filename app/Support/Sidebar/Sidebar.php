<?php

namespace App\Support\Sidebar;

use App\Domain\Blog\Models\BlogSection;
use App\Support\Sidebar\Components\SidebarGenerator;
use App\Support\Sidebar\Components\SidebarLink;
use App\Support\Sidebar\Components\SidebarMenu;
use function route;

class Sidebar
{
    public function user()
    {
        $users = [
            SidebarLink::to(__('Admins'), route('dashboard.core.administration.admins.index')),
            SidebarLink::to(__('Contact Messages'), route('dashboard.user.contact-messages.index')),
            SidebarLink::to(__('Users'), route('dashboard.user.users.index')),
            SidebarLink::to(__('questions'), route('dashboard.user.questions.index')),
            SidebarLink::to(__('Roles'), route('dashboard.core.administration.roles.index')),
        ];

        return [
            SidebarMenu::create(__('User'), 'icon-lock', '')
                ->push($users),
        ];
    }

    public function core()
    {
        $coreList = [
            SidebarLink::to(
                __('Static Pages'),
                route('dashboard.core.pages.index'),
                'pages',
                'icon-copy'
            ),
            SidebarLink::to(
                __('Cities'),
                route('dashboard.core.cities.index'),
                '',
                'icon-copy'
            ), SidebarLink::to(
                __('Emails'),
                route('dashboard.core.emails.index'),
                '',
                'icon-copy'
            ), SidebarLink::to(
                __('Galleries'),
                route('dashboard.core.galleries.index'),
                '',
                'icon-copy'
            ), SidebarLink::to(
                __('Categories'),
                route('dashboard.core.categories.index'),
                '',
                'icon-copy'
            ),
            SidebarLink::to(
                __('Save All'),
                route('dashboard.core.save-all'),
                '',
                'icon-copy'
            ),
        ];

        return [
            SidebarMenu::create(__('Core'), 'icon-lock', '')
                ->push($coreList),
        ];
    }

    public function accommodation()
    {
        $accommodationList = [
            SidebarLink::to(__('views'), route('dashboard.accommodation.views.index')),
            SidebarLink::to(__('Accommodations'), route('dashboard.accommodation.accommodations.index')),
        ];

        return [
            SidebarMenu::create(__('Accommodations'), 'icon-lock', '')
                ->push($accommodationList),
        ];
    }

    public function blog()
    {
        $blogList = [
            SidebarLink::to(__('Blog Sections'), route('dashboard.blog.blog-sections.index')),
            SidebarLink::to(__('Blog Categories'), route('dashboard.blog.blog-cats.index')),
            SidebarLink::to(__('Blog SubCategories'), route('dashboard.blog.blog-sub-categories.index')),

            //SidebarLink::to(__('Blog'), route('dashboard.blog.blogs.index')),
            //SidebarLink::to(__('Blog Links'), route('dashboard.blog.blog-links.index')),

        ];
        $blogSections = BlogSection::get();
        foreach ($blogSections as $section){
            $blogList[] = SidebarLink::to($section->name, route('dashboard.blog.blogs.index', ['section_id'=>$section->id]));
        }

        return [
            SidebarMenu::create(__('Blogs'), 'icon-lock', '')
                ->push($blogList),
        ];
    }

    public function coreTour()
    {
        $coreTourList = [
            SidebarLink::to(__('Attendants'), route('dashboard.core-tour.attendants.index')),
            SidebarLink::to(__('Meals'), route('dashboard.core-tour.meals.index')),
            SidebarLink::to(__('Includes'), route('dashboard.core-tour.includes-model.index')),
            SidebarLink::to(__('Excludes'), route('dashboard.core-tour.excludes.index')),
            SidebarLink::to(__('Faqs'), route('dashboard.core-tour.faqs.index')),
            // SidebarLink::to(__('Faq links'), route('dashboard.core-tour.faq-links.index')),
            SidebarLink::to(__('Highlights'), route('dashboard.core-tour.highlights.index')),
            //SidebarLink::to(__('Highlight links'), route('dashboard.core-tour.highlight-links.index')),
            SidebarLink::to(__('Permits'), route('dashboard.core-tour.permits.index')),
            SidebarLink::to(__('Admissions Fees'), route('dashboard.core-tour.places.index')),
            SidebarLink::to(__('Tips'), route('dashboard.core-tour.tips.index')),
            //SidebarLink::to(__('Tip links'), route('dashboard.core-tour.tip-links.index')),
            SidebarLink::to(__('Transports'), route('dashboard.core-tour.transports.index')),
            SidebarLink::to(__('testimonials'), route('dashboard.core-tour.testimonials.index')),
            SidebarLink::to(__('Airports'), route('dashboard.core-tour.airports.index')),
        ];

        return [
            SidebarMenu::create(__('Tour Core'), 'icon-lock', '')
                ->push($coreTourList),
        ];
    }

    public function day()
    {
        $daysList = [
            SidebarLink::to(__('days'), route('dashboard.day.days.index')),
        ];

        return [
            SidebarMenu::create(__('days'), 'icon-lock', '')
                ->push($daysList),
        ];
    }

    public function step()
    {
        $stepList = [
            SidebarLink::to(__('steps'), route('dashboard.step.steps.index')),
        ];

        return [
            SidebarMenu::create(__('steps'), 'icon-lock', '')
                ->push($stepList),
        ];
    }

    public function tour()
    {
        $tourList = [
            SidebarLink::to(__('steps'), route('dashboard.step.steps.index')),
            SidebarLink::to(__('days'), route('dashboard.day.days.index')),
            SidebarLink::to(__('itineraries'), route('dashboard.itinerary.itineraries.index')),
            SidebarLink::to(__('tours'), route('dashboard.tour.tours.index')),
            SidebarLink::to(__('benfits'), route('dashboard.tour.benfits.index')),
        ];

        return [
            SidebarMenu::create(__('tours'), 'icon-lock', '')
                ->push($tourList),
        ];
    }

    public function itinerary()
    {
        $itineraryList = [
            SidebarLink::to(__('itineraries'), route('dashboard.itinerary.itineraries.index')),
            SidebarLink::to(__('itinerary weeks'), route('dashboard.itinerary.itinerary-weeks.index')),
        ];

        return [
            SidebarMenu::create(__('itineraries'), 'icon-lock', '')
                ->push($itineraryList),
        ];
    }

    public function __invoke()
    {
        $generator = SidebarGenerator::create();
        $generator->addModule(__('User'), 'icon-home')->push($this->user());
        $generator->addModule(__('Core Tour'), 'icon-home')->push($this->coreTour());
        //$generator->addModule(__('Steps'), 'icon-home')->push($this->step());
        //->addModule(__('Days'), 'icon-home')->push($this->day());
        //$generator->addModule(__('Itinerary'), 'icon-home')->push($this->itinerary());
        $generator->addModule(__('Tour'), 'icon-home')->push($this->tour());
        $generator->addModule(__('Accommodation'), 'icon-home')->push($this->accommodation());
        $generator->addModule(__('Blog'), 'icon-home')->push($this->blog());
        $generator->addModule(__('Core'), 'icon-home')->push($this->core());

        return $generator->toArray();
    }
}
