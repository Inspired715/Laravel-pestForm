<div wire:ignore>
    @props(['lineChartlabelsDaily', 'lineChartdatasetsDaily'])
    <div class="w-full bg-white p-4 shadow mb-3">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-brand-primary-400">
                Submissions by time of the day
            </h2>
            <select
                id="submissions_chart_time_submissions"
                class="!p-2 !bg-brand-primary-300/10 text-brand-primary-400 shadow"
                wire:model="getLineChartDailyByDays"
            >
                <option value="60">Last 60 days</option>
                <option value="90">Last 90 days</option>
                <option value="365">Last 365 days</option>
            </select>
        </div>

        <div class="flex flex-col items-center w-full max-w-screen-md p-6 pb-6 sm:p-8">
            <canvas id="lineChartDaily"></canvas>

        </div>
    </div>


    <script>
        var chart = new Chart(
            document.getElementById("lineChartDaily"), {
                type: "line",
                data: {
                    labels: @json($lineChartlabelsDaily),
                    datasets: @json($lineChartdatasetsDaily), // Convert PHP array to JavaScript array
                },
                options: {},
            }
        );
        window.addEventListener('updateLineDailyChart', event => {
            chart.data.datasets = event.detail.lineChartdatasetsDaily
            chart.update();
        })
    </script>

</div>
