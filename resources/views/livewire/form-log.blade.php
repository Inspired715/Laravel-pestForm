<div>
    @if ($logs && count($logs) > 0)
        <div class="rounded-b shadow bg-white border-t-2 border-gray-darker mb-10">
            <div class="divide-y divide-gray-dark">
                @foreach ($logs as $log)
                    <div class="flex flex-col md:flex-row md:items-center p-2 md:divide-x divide-gray-dark">
                        <div class="flex-1 p-2 pb-0 md:p-3">
                            <p>Submission was <strong>accepted and processed</strong>.</p>
                        </div>
                        <span class="md:w-2/6 p-2 md:p-3 md:text-center text-sm text-blue-light">
                            <local-time> {{ \Carbon\Carbon::parse($log->last_checkin)->format('d D Y h:i A') }} </local-time>
                        </span>
                    </div>
                @endforeach
            </div>

        </div>
    @else
        <div class="bg-white py-2 px-4 md:px-16 rounded-b border-t-2 border-brand-gray shadow">
            <div class="flex flex-col gap-1 items-center justify-center">
                <p class="text-sm md:text-base text-brand-primary-400 text-center">
                    No entries yet.
                </p
            </div>
        </div>
        <p class="text-center text-brand-primary-400 text-sm my-4">
            We only keep the 100 most recent entries...
        </p>
    @endif
</div>
