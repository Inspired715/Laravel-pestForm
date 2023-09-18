<div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <x-analytics.total-submission-spam :totalSubmissions="$totalSubmissions" :totalSpamSubmissions="$totalSpamSubmissions" />
    <!-- second block  -->
    
    <x-analytics.bar-chart-submission-spam :barChartlabels="$barChartlabels" :barChartdatasets="$barChartdatasets" />
    
    <!-- three block  -->
    <x-analytics.line-chart-weekly-submission-spam :lineChartlabels="$lineChartlabels" :lineChartdatasets="$lineChartdatasets" />
    
    <!-- 4 - block  -->
    <x-analytics.line-chart-daily-submission-spam :lineChartlabelsDaily="$lineChartlabelsDaily" :lineChartdatasetsDaily="$lineChartdatasetsDaily" />

</div>
