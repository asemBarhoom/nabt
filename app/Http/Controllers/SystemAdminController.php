<?php

namespace App\Http\Controllers;

use App\Models\AdminRule;
use App\Models\Beneficiary;
use App\Models\Branch;
use App\Models\Category;
use App\Models\Color;
use App\Models\Competition;
use App\Models\Container;
use App\Models\Coupon;
use App\Models\DeviceKey;
use App\Models\Good;
use App\Models\Member;
use App\Models\Order;
use App\Models\Package;
use App\Models\Partner;
use App\Models\Post;
use App\Models\Product;
use App\Models\Product2;
use App\Models\Refund;
use App\Models\Section;
use App\Models\Shipment;
use App\Models\Shop;
use App\Models\Size;
use App\Models\SizeOrder;
use App\Models\SystemAdmin;
use App\Models\Testimonial;
use App\Models\TextileType;
use App\Models\Trademark;
use App\Models\Service;
use App\Models\Contact;
use App\Models\About;
use App\Models\Slider;
use App\Operate;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SystemAdminController extends Controller
{
    //
    private $isApiRequest;

    public function __construct(Request $request)
    {
        parent::__construct();
        $this->middleware('auth:system_admin');
        $this->isApiRequest = ControllersService::isApiRoute($request);
    }

    public function home()
    {

        if (! Auth::guard('system_admin')->user()->hasRole('view','dashboard')) {
            $rm=AdminRule::where('admin_id', Auth::guard('system_admin')->user()->id)->where('rule_id',1)->orderBy('module_id','Asc')->first();

            if($rm){
                if(route('system.'.$rm->Module->name.'.index')){
                    return redirect()->route('system.'.$rm->Module->name.'.index');
                }
            }
            return view('system_admin.blank');

        }



        $counts = [
            [
                'url' => route('system.admin.index'),
                'text' => t('shipments'), // Localized "Shipments"
                'icon' => 'fas fa-box',
                'count' => SystemAdmin::count(),
                'count_text' => '',
            ],
        ];











        return view('system_admin.dashboard',compact('counts'));

    }
    public function generalProperties(Request $request){

        return view('system_admin.general_properties');
    }

}
