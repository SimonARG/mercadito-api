<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Subscription;
use Carbon\Carbon;

class ResetSubscriptionTokens extends Command
{
    protected $signature = 'subscriptions:reset-tokens';
    protected $description = 'Reset subscription tokens for eligible subscriptions based on their plans';

    public function handle()
    {
        $now = Carbon::now();

        Subscription::query()
            ->where('created_at', '<=', $now->subMonth())
            ->where(function ($query) use ($now) {
                $query->whereNull('deleted_at')
                    ->orWhere('deleted_at', '>', $now);
            })
            ->where('months', '>', 0)
            ->with('plan') // Eager load the associated plan
            ->chunk(100, function ($subscriptions) use ($now) {
                foreach ($subscriptions as $subscription) {
                    $monthsSinceCreation = $subscription->created_at->diffInMonths($now);
                    if ($monthsSinceCreation < $subscription->months && 
                        $subscription->created_at->day == $now->day) {
                        
                        // Get the token amounts from the associated plan
                        $buyTokens = $subscription->plan->monthly_buy_tokens;
                        $sellTokens = $subscription->plan->monthly_sell_tokens;

                        $subscription->update([
                            'buy_tokens_remaining' => $buyTokens,
                            'sell_tokens_remaining' => $sellTokens,
                        ]);
                        $this->info("Reset tokens for subscription ID: {$subscription->id} (Buy: {$buyTokens}, Sell: {$sellTokens})");
                    }
                }
            });

        $this->info('Subscription tokens reset completed.');
    }
}