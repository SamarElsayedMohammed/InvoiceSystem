<x-dashBoard.dash-board-home>
    <x-slot:breadcrumbs>
        <x-dash-board.includes.breadcrumbs pageTilte="Home Page">

        </x-dash-board.includes.breadcrumbs>
    </x-slot:breadcrumbs>
    <canvas id="myChart" height="100px"></canvas>

    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script type="text/javascript">
            var labels = {{ Js::from($labels) }};
            var invoices = {{ Js::from($data) }};

            const data = {
                labels: labels,
                datasets: [{
                    label: 'My First dataset',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: invoices,
                }]
            };

            const config = {
                type: 'bar',
                data: data,
                options: {}
            };

            const myChart = new Chart(
                document.getElementById('myChart'),
                config
            );
        console.log(myChart);
        </script>
    @endpush
</x-dashBoard.dash-board-home>
