<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PlanController extends Controller
{
    //
    public function index() {
        $plans = Plan::get();
        return view('subscriptions.pages.plans', compact("plans"));
    }

    public function show($slug) {
        $intent = auth()->user()->createSetupIntent();
        $plan = Plan::where('slug', $slug)->first();
        return view('subscriptions.pages.subscription', [
            'plan' => $plan,
            'intent' => $intent
        ]);
    }

    public function subscription(Request $request) {
        $plan = Plan::find($request->plan);
        $user = User::find(auth()->id());
        $currentDate = Carbon::now();
        $advancedDate = $currentDate->addMonths($plan->description + 0);
        $user->sub_expire = $advancedDate;
        $user->save();
        $subscription = $request->user()->newSubscription($request->plan, $plan->stripe_plan)->create($request->token);

        return view('subscriptions.pages.subscription_success');
    }
}