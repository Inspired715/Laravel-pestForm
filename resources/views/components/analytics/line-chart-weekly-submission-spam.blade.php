<div wire:ignore>
    @props(['lineChartlabels', 'lineChartdatasets'])
    <div class="w-full bg-white p-4 shadow mb-3">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-brand-primary-400">
                Submissions by day of the week
            </h2>
            <select
                id="submissions_chart_time_submissions"
                class="!p-2 !bg-brand-primary-300/10 text-brand-primary-400 shadow"
                wire:model="getLineChartWeeklyByDays"
            >
                <option value="60">Last 60 days</option>
                <option value="90">Last 90 days</option>
                <option value="365">Last 365 days</option>
            </select>
        </div>
        <div class="flex flex-col items-center w-full max-w-screen-md p-6 pb-6 sm:p-8">
            <canvas id="lineChart"></canvas>

        </div>
    </div>


    <script>
        var weeklyChart =new Chart(
            document.getElementById("lineChart"), {
                type: "line",
                data: {
                    labels: @json($lineChartlabels),
                    datasets: @json($lineChartdatasets), // Convert PHP array to JavaScript array
                },
                options: {},
            }
        );

        window.addEventListener('updateLineWeeklyChart', event => {
            weeklyChart.data.datasets = event.detail.lineChartdatasets
            weeklyChart.update();
        })
    </script>

</div>
