@php $subscription=false;
if(auth()->user()->subscriptions()->exists()){
    $subscription = auth()->user()->subscriptions()->first();
}
@endphp

@if(auth()->user()->onGenericTrial() || !$subscription)
<div
    class="w-full flex flex-col md:flex-row items-center justify-center md:justify-between bg-yellow-100 p-4 border border-yellow-500 mb-8">
    <p>
        Your free trial ends {{ auth()->user()->trialEndsAt()->diffForHumans() }}.
        Sign up for a plan now to avoid any down time.
    </p>
    <a href="{{ route('account.billing') }}"
        class="block font-bold text-white bg-brand-primary-500 text-sm hover:bg-brand-primary-400 py-2 px-4 rounded-lg transition-colors ease-in-out">
        Choose a plan
    </a>
</div>
@endif
