<div>
    TEST
    <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const jsdata = {{ Js::from($data) }};
    console.log('data', jsdata);
    const labels = [];
    const values = [];

    jsdata.forEach(myFunction);

    function myFunction(item, index, arr) {
        labels[index] = item.created_at;
        values[index] = item.temparature;
    }
    console.log('labels', labels);
    console.log('temparature', values);

    const ctx = document.getElementById('myChart');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'temps',
                data: values,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
