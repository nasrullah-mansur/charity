<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Services\BlogService;
use App\Models\AboutUs;
use App\Models\Blog;
use App\Models\Campaign;
use App\Models\Category;
use App\Models\Charity;
use App\Models\DonarFeedback;
use App\Models\DonationSlot;
use App\Models\HelpArea;
use App\Models\Journey;
use App\Models\Partner;
use App\Models\Slider;
use App\Models\Tag;
use App\Models\TeamMember;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Services\CampaignService;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
Use App\Models\Currency;
Use App\Models\PaymentPlatform;

class HomeController extends Controller
{
    private $campaignService, $blogService ;

    public function __construct(CampaignService $campaignService, BlogService $blogService  )
    {
        $this->campaignService = $campaignService;
        $this->blogService = $blogService;
    }

    public function index(){

        if (file_exists(storage_path('installed'))) {

        $info['sliders'] = Slider::where('active_status', STATUS_ACTIVE)->get();
        $info['charity'] = Charity::where('active_status', STATUS_ACTIVE)->first();
        $info['team'] = TeamMember::where('active_status', STATUS_ACTIVE)->get();
        $info['feedback'] = DonarFeedback::where('active_status', STATUS_ACTIVE)->get();
        $info['news'] = Blog::where('active_status', STATUS_ACTIVE)->with(['category', 'author'])->orderBy('id', 'desc')->take(3)->get();
        $info['partners'] = Partner::where('active_status', STATUS_ACTIVE)->get();
        $info['help'] = HelpArea::where('active_status', STATUS_ACTIVE)->first();
        $info['campaign'] = Campaign::where(['is_approved' => true, 'status' => CAMPAIGN_RUNNING])->where('end_date', '>=', Carbon::now()->toDateString())->paginate(6);

        return view('front.index',['info' => $info, 'active' => 'Home']);

        } else{

            return redirect()->to('/install');
        }
    }


    public function aboutUs()
    {
        $info['about']= AboutUs::first();
        $info['team'] = TeamMember::where('active_status', STATUS_ACTIVE)->get();
        $info['news'] = Blog::where('active_status', STATUS_ACTIVE)->with(['category', 'author'])->orderBy('id', 'desc')->take(3)->get();
        $info['partners'] = Partner::where('active_status', STATUS_ACTIVE)->get();
        $info['journey'] = Journey::where('active_status', STATUS_ACTIVE)->first();

        return view('front.pages.about',['info' => $info, 'active' => 'About']);

    }


    public function blog()
    {
        $info['category'] = Category::where('post_category', STATUS_ACTIVE)->get();
        $info['tag'] = Tag::all();
        $info['news'] = Blog::where('active_status', STATUS_ACTIVE)->with(['category', 'author'])->orderBy('id', 'desc')->paginate(6);
        $info['popular_news'] = Blog::where(['active_status' => STATUS_ACTIVE, 'popular' => true])->with(['category', 'author'])->orderBy('id', 'desc')->take(3)->get();
        $info['partners'] = Partner::where('active_status', STATUS_ACTIVE)->get();

        return view('front.pages.blog',['info' => $info, 'active' => 'Blog']);
    }


    public function team()
    {
        $info['team'] = TeamMember::where('active_status', STATUS_ACTIVE)->get();
        $info['news'] = Blog::where('active_status', STATUS_ACTIVE)->with(['category', 'author'])->orderBy('id', 'desc')->take(3)->get();
        $info['partners'] = Partner::where('active_status', STATUS_ACTIVE)->get();

        return view('front.pages.team',['info' => $info, 'active' => 'Team']);
    }

    public function campDetails($slug)
    {
        $campaign = Campaign::where('slug', $slug)->with('comment')->first();

        if(!$campaign){
            toast("Campaign doesn't exists");
            return redirect()->back();
        }
        $slot = DonationSlot::first();
        $user = User::where('id', Auth::id())->first();
        return view('front.campaign.details', ['user'=> $user, 'slot' => $slot,'active' => 'Home','campaign' => $campaign]);

    }

    public function campaignComment(Request $request)
    {
        $commetn = $this->campaignService->campaignComment($request);
        return redirect()->back();
    }

    # blog
    public function blogDetails($slug)
    {
        $blog = Blog::where('slug', $slug)->with('comment')->first();
        if(!$blog){
            // toast("Blog doesn't exists");
            return redirect()->back();
        }

        $info['category'] = Category::where('post_category', STATUS_ACTIVE)->get();
        $info['tag'] = Tag::all();
        $info['popular_news'] = Blog::where(['active_status' => STATUS_ACTIVE, 'popular' => true])->with(['category', 'author'])->orderBy('id', 'desc')->take(3)->get();
        $info['partners'] = Partner::where('active_status', STATUS_ACTIVE)->get();

        $info['related_blog'] = Blog::where('category_id', $blog->category_id)->where('id', '!=',  $blog->id)->take(3)->get();
        $user = User::where('id', Auth::id())->first();
        return view('front.pages.blog_details', ['info' => $info,'user'=> $user, 'active' => 'Blog','blog' => $blog]);

    }

    public function tagBlog($slug)
    {
        $tag = Tag::where('slug', $slug)->first();
        if(!$tag)
        {
            return redirect()->back();
        }
        $info['category'] = Category::where('post_category', STATUS_ACTIVE)->get();
        $info['tag'] = Tag::all();

        $info['news'] = Blog::whereHas('blogTags', function ($query) use ($tag) {
            $query = $query->where('tag_id',$tag->id);

        })->where('active_status', STATUS_ACTIVE)->with(['category', 'author'])->orderBy('id', 'desc')->paginate(6);

        $info['popular_news'] = Blog::where(['active_status' => STATUS_ACTIVE, 'popular' => true])->with(['category', 'author'])->orderBy('id', 'desc')->take(3)->get();
        $info['partners'] = Partner::where('active_status', STATUS_ACTIVE)->get();

        if(isset($info['news'][0]) ){
            return view('front.pages.blog',['page_title' => $tag[lang().'_name'] ,'info' => $info, 'active' => 'Blog']);
        }
        return redirect()->back();
     }


    public function categoryBlog($slug)
    {
        $categoy = Category::where('slug', $slug)->first();
        if(!$categoy)
        {
            return redirect()->back();
        }
        $info['category'] = Category::where('post_category', STATUS_ACTIVE)->get();
        $info['tag'] = Tag::all();

        $info['news'] = Blog::where('category_id', $categoy->id)->where('active_status', STATUS_ACTIVE)->with(['category', 'author'])->orderBy('id', 'desc')->paginate(6);

        $info['popular_news'] = Blog::where(['active_status' => STATUS_ACTIVE, 'popular' => true])->with(['category', 'author'])->orderBy('id', 'desc')->take(3)->get();
        $info['partners'] = Partner::where('active_status', STATUS_ACTIVE)->get();

        if(isset($info['news'][0]) ){
            return view('front.pages.blog',['page_title' => $categoy[lang().'_name'] ,'info' => $info, 'active' => 'Blog']);
        }
        return redirect()->back();

    }

    public function searchBlog(Request $request)
    {
        $searchText = $request->text;

        $length = strlen($searchText);
        $keywords = [];

        $keywords[] = $searchText;

        if ($length > 3) {
            for ($i = 0; $i < $length; $i = $i + 3) {
                $keywords[] = substr($searchText, $i, 3);

                $string = $length - ($i + 3);
                if ($string < 3) {
                    break;
                }
            }
        }

        $info['category'] = Category::where('post_category', STATUS_ACTIVE)->get();
        $info['tag'] = Tag::all();

        $info['news'] = Blog::where(function ($query) use ($keywords) {

            foreach ($keywords as $keyword) {
                $query = $query->where('pl_title', 'LIKE', "%$keyword%")->orWhere('sl_title', 'LIKE', "%$keyword%");
            }
            return $query;
        })->where('active_status', STATUS_ACTIVE)->with(['category', 'author'])->orderBy('id', 'desc')->get();

        $info['popular_news'] = Blog::where(['active_status' => STATUS_ACTIVE, 'popular' => true])->with(['category', 'author'])->orderBy('id', 'desc')->take(3)->get();
        $info['partners'] = Partner::where('active_status', STATUS_ACTIVE)->get();

        if(isset($info['news'][0]) ){
            return view('front.pages.blog',['page_title' =>  $searchText ,'info' => $info, 'active' => 'Blog']);
        }
        return redirect()->back();

    }


    public function blogComment(Request $request)
    {
        $comment = $this->blogService->comment($request);

        if($comment['success'] == true){

            toast($comment['message'], 'success');
            return redirect()->back();
        }

        toast($comment['message'], 'warning');
        return redirect()->back();
    }

}

