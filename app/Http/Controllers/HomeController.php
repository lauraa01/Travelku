<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Destination as DestinationModel;
use App\Models\Order as OrderModel;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function route()
    {
        $user_id = Auth::user()->id;

        $overseas = DestinationModel::where('destination_category', 'like', 'Overseas')
                                ->get(['id', 'destination_category', 'destination_origin', 'destination_name', 'destination_price', 'destination_duration', 'image']);

        $domestic = DestinationModel::where('destination_category', 'like', 'Domestic')
                                ->get(['id', 'destination_category', 'destination_origin', 'destination_name', 'destination_price', 'destination_duration', 'image']);

        $orderDatas = OrderModel::join('destination', 'destination.id', 'order.destination_id')
                                ->join('users',  'users.id', 'order.user_id')
                                ->where('users.id', $user_id)
                                ->get(['order.id', 'destination.destination_category', 'destination.destination_name', 'destination.destination_price', 'destination.destination_duration', 'order.quantity']);

        return view('route', ['overseas' => $overseas, 'domestic' => $domestic,'orderData' => $orderDatas]);
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        $this->validate($request, [
			'destination_id' => 'required',
			'quantity' => 'required',
		]);

        DB::table('order')->insert([
            'user_id' => $user_id,
            'destination_id' => $request->destination_id,
            'quantity' => $request->quantity
        ]);

        return redirect('/route');
    }

    public function deleteOrder($id)
    {
        $data = OrderModel::find($id);
        $data->delete();
        return redirect('route');
    }

    public function profile()
    {
        return view('profile');
    }

    public function upload(Request $request)
    {
        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images',$filename,'public');
            Auth()->user()->update(['image'=>$filename]);
        }
        return redirect()->back();
    }

    public function manage() {
        $data = UserModel::get();
        return view('manage', ['data' => $data]);
    }

    public function deleteUser($id)
    {
        $data = UserModel::find($id);
        $data->delete();
        return redirect('manage');
    }
}
