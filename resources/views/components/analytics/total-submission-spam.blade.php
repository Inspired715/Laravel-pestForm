<div>
    @props(['totalSubmissions', 'totalSpamSubmissions'])
    <div class="flex items-start gap-2 bg-transparent">
        <div class="w-full md:w-1/2 bg-white p-4 shadow mb-3">
            <!-- head -->
            <div class="flex w-full items-center justify-between">
                <h2 class="font-semibold text-brand-primary-300 ">
                    Submissions
                </h2>
                <select id="submissions_chart_time_submissions"
                    class="!p-2 !bg-brand-primary-300/10 text-brand-primary-400 shadow"
                    wire:model="totalSubmissionsByDays">
                    <option value="30">Last 30 days</option>
                    <option value="60">Last 60 days</option>
                    <option value="365">Last 365 days</option>
                </select>
            </div>
            <!-- main -->
            <h1 class="font-bold text-2xl text-brand-primary-400 my-2">
                {{ $totalSubmissions }}
            </h1>
            <!-- footer -->
            <p class="font-semibold text-brand-primary-400 my-">
                No prior data
            </p>
        </div>
        <div class="w-full md:w-1/2 bg-white p-4 shadow mb-3">
            <!-- head -->
            <div class="flex w-full items-center justify-between">
                <h2 class="font-semibold text-brand-primary-300 ">
                    spam
                </h2>
                <select id="submissions_chart_time_submissions"
                    class="!p-2 !bg-brand-primary-300/10 text-brand-primary-400 shadow"
                    wire:model="totalSpamSubmissionsByDays">
                    <option value="30">Last 30 days</option>
                    <option value="60">Last 60 days</option>
                    <option value="365">Last 365 days</option>
                </select>
            </div>
            <!-- main -->
            <h1 class="font-bold text-2xl text-brand-primary-400 my-2">
                {{ $totalSpamSubmissions }}
            </h1>
            <!-- footer -->
            <p class="font-semibold text-brand-primary-400 my-">
                No data
            </p>
        </div>
    </div>
</div>
