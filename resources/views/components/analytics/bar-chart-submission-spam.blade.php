<div wire:ignore>
    @props(['barChartlabels', 'barChartdatasets'])
    <div class="w-full bg-white p-4 shadow mb-3">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-brand-primary-400">
                Submissions vs. Spam
            </h2>
        </div>
        <div class="flex flex-col items-center w-full max-w-screen-md p-6 pb-6 sm:p-8">

            <canvas id="barChart"></canvas>

        </div>
    </div>


    <script>
        new Chart(
            document.getElementById("barChart"), {
                type: "bar",
                data: {
                    labels: @json($barChartlabels),
                    datasets: @json($barChartdatasets), // Convert PHP array to JavaScript array
                },
                options: {},
            }
        );
    </script>
    
</div>
