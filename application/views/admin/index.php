<!-- Begin Page Content -->

<div class="container-fluid mb-4" style="height: 2000px;">
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow">
                <div class="card-body">
                    <div class="h4 text-biru">User Performance</div>
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-3"></div>
        <div class="col-lg-3">
            <div class="h2 text-biru text-center mt-3 mt-lg-0">Notifikasi approved</div>
            <div class="card shadow my-3" style="border-radius: 1em;">
                <div class="card-body">
                    <div class="d-inline-block">
                        <div class="h5 text-biru">Sma N Bantul</div>
                        <div class="text-secondary">350 siswa Tryout</div>
                        <div class="text-secondary">2.900.000</div>
                    </div>
                    <div class="float-right">
                        <svg style="background-color: #0fd2f5; color:white; padding: 10px; border-radius: 50%" width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-arrow-up-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0v-6z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="card shadow my-3" style="border-radius: 1em;">
                <div class="card-body">
                    <div class="d-inline-block">
                        <div class="h5 text-biru">Sma N Bantul</div>
                        <div class="text-secondary">350 siswa Tryout</div>
                        <div class="text-secondary">2.900.000</div>
                    </div>
                    <div class="float-right">
                        <svg style="background-color: #0fd2f5; color:white; padding: 10px; border-radius: 50%" width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-arrow-up-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0v-6z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="card shadow my-3" style="border-radius: 1em;">
                <div class="card-body">
                    <div class="d-inline-block">
                        <div class="h5 text-biru">Sma N Bantul</div>
                        <div class="text-secondary">350 siswa Tryout</div>
                        <div class="text-secondary">2.900.000</div>
                    </div>
                    <div class="float-right">
                        <svg style="background-color: #0fd2f5; color:white; padding: 10px; border-radius: 50%" width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-arrow-up-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0v-6z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /.container-fluid -->

<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Performance',
                data: [5, 2, 7, 3, 9, 8, 5, 3, 4, 5, 6, 9],
                backgroundColor: [
                    'rgba(38, 85, 214,0.1)'
                ],
                borderColor: [
                    'rgba(240, 133, 33,1)',
                    'rgba(240, 133, 33,1)',
                    'rgba(240, 133, 33,1)',
                    'rgba(240, 133, 33,1)',
                    'rgba(240, 133, 33,1)',
                    'rgba(240, 133, 33,1)',
                    'rgba(240, 133, 33,1)',
                    'rgba(240, 133, 33,1)',
                    'rgba(240, 133, 33,1)',
                    'rgba(240, 133, 33,1)',
                    'rgba(240, 133, 33,1)'

                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>