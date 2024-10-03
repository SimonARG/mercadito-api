<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\StoreSubscriptionRequest;
use App\Models\Plan;

class SubscriptionController extends ApiController
{
    public function store(StoreSubscriptionRequest $request): JsonResponse
    {
        $user = User::find($request->user_id);
        $plan = Plan::find($request->plan_id);

        $subscription = Subscription::create([
            'user_id' => $request->user_id,
            'plan_id' => $request->plan_id,
            'buy_tokens_remaining' => $plan->monthly_buy_tokens,
            'sell_tokens_remaining' => $plan->monthly_sell_tokens,
            'months' => 1,
        ]);

        return $this->createdResponse($subscription, ucfirst($plan->name) . "subscription for $user->name created correctly");
    }
}
