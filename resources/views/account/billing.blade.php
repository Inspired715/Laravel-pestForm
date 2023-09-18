@extends('account._layout', ['title' => 'Billing'])

@section('body')
    <div class="w-full flex-1 space-y-5">
        <!-- Plan block -->
        @if (session()->has('error') || $errors->any())
        <div class="bg-white py-8 px-8 rounded-b border-t-2 border-brand-gray shadow">
            @if (session()->has('error'))
                <div class="text-red-500 text-center text-sm">
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <h4 class="text-red-500 text-center text-sm">
                        {{ $error }}
                    </h4>
                @endforeach
            @enderror
        </div>
        @endif


        @if (!empty($subscription))
        <div class="bg-white py-8 px-8 rounded-b border-t-2 border-brand-gray shadow">

            {{-- <div class="mb-4">
      <span class="block w-full p-4 bg-brand-primary-300/10 rounded">
        Your free trial ends 4 days from now. Sign up for a plan now to avoid any down time.
      </span>
    </div>
    <a href="{{ route('account.choose-plan') }}"
      class="block bg-brand-primary-500 hover:bg-brand-primary-400 text-white text-center font-bold p-4 uppercase w-52 ml-auto rounded-md">
      Choose a plan
    </a> --}}

                <h3 class="font-bold text-brand-primary-400 text-xl pb-2 mb-4 border-b border-brand-gray">
                    Current plan
                </h3>
                <div class="relative overflow-x-auto mb-8">
                    <table class="w-full text-sm text-left text-gray-500 ">

                        {{-- Subscription --}}
                        <tbody>
                            <tr class="bg-white border-b ">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    Subscription Plan
                                </th>
                                <td class="px-6 py-4">
                                    {{ $plan->price['product_title'] }}
                                </td>
                            </tr>

                            {{-- Price --}}
                            <tr class="bg-white border-b ">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    Price
                                </th>
                                <td class="px-6 py-4">
                                    ${{ $plan->price['subscription']['price']['net'] * $subscription->quantity }}/mo
                                </td>
                            </tr>

                            {{-- Status --}}
                            <tr class="bg-white border-b ">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    Status
                                </th>
                                <td class="px-6 py-4">
                                    @if ($subscription->cancelled())
                                        Cancelled
                                        @if ($subscription->onGracePeriod())
                                            , ends {{ $subscription->ends_at->format('F jS, Y') }}
                                        @endif
                                    @elseif ($subscription->onPausedGracePeriod())
                                        Paused from {{ $subscription->paused_from->format('F jS, Y') }}
                                    @else
                                        Active
                                    @endif
                                </td>
                            </tr>

                            {{-- Next Payment --}}

                            <tr class="bg-white border-b">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    Next Payment
                                </th>
                                <td class="px-6 py-4">
                                    @if ($subscription->nextPayment())
                                        {{ $subscription->nextPayment()->date()->format('F jS, Y') }}
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>

                            {{-- Cancel --}}

                            {{-- Max Forms --}}
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    Max Forms
                                </th>
                                <td class="px-6 py-4">
                                    {{ $plan->max_forms * $subscription->quantity }}
                                </td>
                            </tr>

                            {{-- Cancel --}}

                            {{-- Trial? --}}
                            {{-- <tr class="bg-white">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
              Is it Trial period?
            </th>
            <td class="px-6 py-4">
              {{ $subscription->onTrial() ? 'Yes' : 'No' }}
            </td>
          </tr> --}}
                        </tbody>
                    </table>

                    @if (!$subscription->cancelled())
                        <div x-data="{ openSubscriptionCancelModal: false, openSubscriptionPauseModal: false, openSubscriptionUnpauseModal: false }">
                            <div x-bind:class="openSubscriptionCancelModal ? '!flex' : 'hidden'"
                                 class="hidden fixed items-center justify-center left-0 top-0 w-full h-full z-50 bg-black/50">
                                <div class="bg-white max-w-md mx-auto relative rounded-lg shadow-lg w-full">
                                    <!-- head -->
                                    <div class="py-8 px-6 text-left">
                                        <h3 class="text-brand-primary-400 text-xl mb-4">
                                            Cancel Subscription
                                        </h3>
                                        <p class="text-brand-primary-300">
                                            This will cancel current active subscription. <span class="font-bold">Are you sure?</span>
                                        </p>
                                    </div>
                                    <!-- bottom -->
                                    <div
                                        class="flex flex-col sm:flex-row items-center justify-center bg-brand-primary-300/20 py-4 px-6 gap-2">
                                        <button x-on:click="openSubscriptionCancelModal = !openSubscriptionCancelModal"
                                                class="block bg-white hover:bg-white/80 text-black text-center font-bold p-4 uppercase w-52 ml-auto rounded-md shadow">
                                            Nevermind
                                        </button>
                                        <form action="{{ route('account.subscription.cancel') }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                    class="block bg-red-500 hover:bg-red-400 text-white text-center font-bold p-4 uppercase w-52 ml-auto rounded-md">
                                                Cancel
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <button x-on:click="openSubscriptionCancelModal = !openSubscriptionCancelModal"
                                    class="mt-8 mr-4 bg-brand-primary-500 text-white text-center font-bold p-4 uppercase max-w-xs disabled:grayscale disabled:cursor-not-allowed"
                                    type="submit">
                                Cancel Subscription
                            </button>

                            @if ($subscription->onPausedGracePeriod())
                                <div x-bind:class="openSubscriptionUnpauseModal ? '!flex' : 'hidden'"
                                     class="hidden fixed items-center justify-center left-0 top-0 w-full h-full z-50 bg-black/50">
                                    <div class="bg-white max-w-md mx-auto relative rounded-lg shadow-lg w-full">
                                        <!-- head -->
                                        <div class="py-8 px-6 text-left">
                                            <h3 class="text-brand-primary-400 text-xl mb-4">
                                                Unpause Subscription
                                            </h3>
                                            <p class="text-brand-primary-300">
                                                This will unpause current subscription. <span class="font-bold">Are you sure?</span>
                                            </p>
                                        </div>
                                        <!-- bottom -->
                                        <div
                                            class="flex flex-col sm:flex-row items-center justify-center bg-brand-primary-300/20 py-4 px-6 gap-2">
                                            <button x-on:click="openSubscriptionUnpauseModal = !openSubscriptionUnpauseModal"
                                                    class="block bg-white hover:bg-white/80 text-black text-center font-bold p-4 uppercase w-52 ml-auto rounded-md shadow">
                                                Nevermind
                                            </button>
                                            <form action="{{ route('account.subscription.unpause') }}" method="POST">
                                                @csrf
                                                <button type="submit"
                                                        class="block bg-red-500 hover:bg-red-400 text-white text-center font-bold p-4 uppercase w-52 ml-auto rounded-md">
                                                    Unpause
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <button x-on:click="openSubscriptionUnpauseModal = !openSubscriptionUnpauseModal"
                                        class="mt-8 bg-brand-primary-500 text-white text-center font-bold p-4 uppercase max-w-xs disabled:grayscale disabled:cursor-not-allowed"
                                        type="submit">
                                    Unpause Subscription
                                </button>
                            @else
                                <div x-bind:class="openSubscriptionPauseModal ? '!flex' : 'hidden'"
                                     class="hidden fixed items-center justify-center left-0 top-0 w-full h-full z-50 bg-black/50">
                                    <div class="bg-white max-w-md mx-auto relative rounded-lg shadow-lg w-full">
                                        <!-- head -->
                                        <div class="py-8 px-6 text-left">
                                            <h3 class="text-brand-primary-400 text-xl mb-4">
                                                Pause Subscription
                                            </h3>
                                            <p class="text-brand-primary-300">
                                                This will pause current subscription. <span class="font-bold">Are you sure?</span>
                                            </p>
                                        </div>
                                        <!-- bottom -->
                                        <div
                                            class="flex flex-col sm:flex-row items-center justify-center bg-brand-primary-300/20 py-4 px-6 gap-2">
                                            <button x-on:click="openSubscriptionPauseModal = !openSubscriptionPauseModal"
                                                    class="block bg-white hover:bg-white/80 text-black text-center font-bold p-4 uppercase w-52 ml-auto rounded-md shadow">
                                                Nevermind
                                            </button>
                                            <form action="{{ route('account.subscription.pause') }}" method="POST">
                                                @csrf
                                                <button type="submit"
                                                        class="block bg-red-500 hover:bg-red-400 text-white text-center font-bold p-4 uppercase w-52 ml-auto rounded-md">
                                                    Pause
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <button x-on:click="openSubscriptionPauseModal = !openSubscriptionPauseModal"
                                        class="mt-8 bg-brand-primary-500 text-white text-center font-bold p-4 uppercase max-w-xs disabled:grayscale disabled:cursor-not-allowed"
                                        type="submit">
                                    Pause Subscription
                                </button>
                            @endif
                        </div>
                    @endif
                </div>
    </div>
    @endif

    <div class="bg-white py-8 px-8 rounded-b border-t-2 border-brand-gray shadow">
        <h3 class="font-bold text-brand-primary-400 text-xl pb-2 mb-4 border-b border-brand-gray">
            @if (!empty($subscription))
                Change your plan
            @else
                Choose a plan
            @endif
        </h3>
        <div>
            @error('paddle_id')
                <div class="text-red-500 text-xs italic">{{ $message }}</div>
            @enderror
            <form action="{{ !empty($subscription) ? route('account.swap') : route('account.checkout') }}" method="POST">
                @csrf
                <div class="grid grid-cols-2 gap-4 my-4">
                    @foreach ($plans as $index => $p)
                        <div class="relative">
                            <input
                                @if (!empty($subscription) && $subscription?->paddle_plan == $p->paddle_id && !$subscription?->cancelled()) checked disabled
                                @else
                                @if ($index == 0) checked @endif
                                @endif
                            class="hidden peer" id="radio_{{ $p->paddle_id }}" type="radio"
                            value="{{ $p->paddle_id }}" name="paddle_id"
                            />

                            <label for="radio_{{ $p->paddle_id }}"
                                class="block p-4 w-full border-2 border-gray-300 bg-transparent cursor-pointer rounded-2xl
          hover:bg-brand-primary-400/10 hover:text-brand-primary-400
          peer-checked:border-brand-primary-400
          peer-checked:bg-brand-primary-300/10 peer-checked:text-brand-primary-400
          peer-disabled:grayscale peer-disabled:cursor-not-allowed peer-disabled:[&>*]:cursor-not-allowed peer-disabled:bg-brand-primary-400/10
          ">
                                <div class="text-brand-primary-400 cursor-pointer">
                                    <h2 class="mb-2 text-left font-bold plan-light-text text-xs uppercase">
                                        {{ $p->price['product_title'] }}
                                    </h2>
                                    <div class="flex items-center justify-between leading-none">
                                        <h3 class="block font-bold text-2xl">
                                            {{ $p->max_forms }}
                                            <span class="text-sm">form(s)</span>
                                        </h3>
                                        <h4 class="block">
                                            <span class="font-bold">
                                                ${{ $p->price['subscription']['list_price']['net'] }}
                                            </span>
                                            <span class="text-xs">
                                                /mo + Tax
                                            </span>
                                        </h4>
                                    </div>
                                </div>
                            </label>

                            <svg class="hidden peer-checked:block absolute top-5 right-5  fill-current bg-brand-primary-300/20 p-1 h-5  rounded-full w-5"
                                width="12px" height="9px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 9">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <g transform="translate(-881.000000, -419.000000)" stroke="#388473"
                                        stroke-width="2">
                                        <g transform="translate(877.000000, 413.000000)">
                                            <polyline points="5.5 10.5 8.5 13.5 14.5 7.5"></polyline>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    @endforeach
                </div>
                <button
                    class="mt-8 block bg-brand-primary-500 text-white text-center font-bold p-4 uppercase w-full max-w-xs mx-auto disabled:grayscale disabled:cursor-not-allowed"
                    type="submit">
                    @if (!empty($subscription))
                        Change Subscription
                    @else
                        Go to checkout
                    @endif
                </button>
            </form>
        </div>
    </div>

    <div class="bg-white py-8 px-8 rounded-b border-t-2 border-brand-gray shadow">
        <h3 class="font-bold text-brand-primary-400 text-xl pb-2 mb-4 border-b border-brand-gray">
            Subscription History
        </h3>
        <div class="relative overflow-x-auto mb-8">
            <table class="w-full text-sm text-left text-gray-500 ">
                <tbody>
                    <tr class="bg-white border-b ">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                            Plan Name
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                            Price
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                            Status
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                            End Date
                        </th>
                    </tr>
                    @foreach($user->subscriptions as $sub)
                        @php
                            $subPlan = $plans->firstWhere('paddle_id', $sub->paddle_plan);
                        @endphp
                        <tr class="bg-white border-b ">
                            <td class="px-6 py-4">
                                {{ $subPlan->price['product_title'] }}
                            </td>
                            <td class="px-6 py-4">
                                ${{ $subPlan->price['subscription']['price']['net'] }}/mo
                            </td>
                            <td class="px-6 py-4">
                                {{ Str::ucfirst($sub->paddle_status) }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $subscription->ends_at?->format('F jS, Y') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
