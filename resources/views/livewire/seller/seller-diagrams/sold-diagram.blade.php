<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="chartjs-size-monitor"
                 style="position: absolute; inset: 0; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                <div class="chartjs-size-monitor-expand"
                     style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                    <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                </div>
                <div class="chartjs-size-monitor-shrink"
                     style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                    <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                </div>
            </div>
            <canvas id="chartjs" height="472" style="display: block; width: 709px; height: 472px;" width="709"
                    class="chartjs-render-monitor"></canvas>
        </div>
    </div>
</div>
@section('scripts')
    <script src="{{url('panel/vendors/charts/chartjs/chart.min.js')}}"></script>

    <script>
        Chart.defaults.global.defaultFontFamily = '"primary-font", "segoe ui", "tahoma"';

        let colors = {
            primary: $('.colors .bg-primary').css('background-color'),
            primaryLight: $('.colors .bg-primary-bright').css('background-color'),
            secondary: $('.colors .bg-secondary').css('background-color'),
            secondaryLight: $('.colors .bg-secondary-bright').css('background-color'),
            info: $('.colors .bg-info').css('background-color'),
            infoLight: $('.colors .bg-info-bright').css('background-color'),
            success: $('.colors .bg-success').css('background-color'),
            successLight: $('.colors .bg-success-bright').css('background-color'),
            danger: $('.colors .bg-danger').css('background-color'),
            dangerLight: $('.colors .bg-danger-bright').css('background-color'),
            warning: $('.colors .bg-warning').css('background-color'),
            warningLight: $('.colors .bg-warning-bright').css('background-color'),
        };

        let element = document.getElementById("chartjs");
        element.height = 200;
        new Chart(element, {
            type: 'line',
            data: {
                labels: @json($labels),
                datasets: [{
                    data: @json($data),
                    label: "نمودار فروش هفتگی",
                    borderColor: colors.primary,
                    fill: false
                }]
            },
        });

    </script>
@endsection
