<div>
    @if(!auth()->user()->hasVerifiedEmail())
    <!-- Please verify the email associated with your account. -->
    @if(session('verificationMailResent'))
    <!-- Your verification email has been resent. -->
    <div class="w-full bg-brand-primary-300/10 p-4 border border-brand-primary-300/90 mb-8">
        <p class="text-brand-primary-300">
            Your verification email has been resent.
        </p>
    </div>
    @else
    <div
        class="w-full flex flex-col md:flex-row items-center justify-center md:justify-between bg-yellow-100 p-4 border border-yellow-500 mb-8">
        <p>
            Please verify the email associated with your account.
        </p>
        <form action="{{ route('verification.send') }}" method="POST">
            @csrf
            <button type="submit"
                class="font-bold text-white bg-brand-primary-500 text-sm hover:bg-brand-primary-400 py-2 px-4 rounded-lg transition-colors ease-in-out">
                Resend Verification Email
            </button>
        </form>
    </div>
    @endif
    @endif
</div>