<!-- Set base url to javascript variable-->
<script>
    var base_url = "<?php echo base_url(); ?>";
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="script.js"></script>


<!-- Styles-->
<style>
    html {
        scroll-behavior: smooth;
    }

    #report_button {
        background-color: #1cc88a;
    }

    /* Chart */
    .graphbox {
        position: relative;
        width: 100%;
        padding: 20px;
        display: grid;
        grid-template-columns: 12fr 3.5fr 3.5fr;
        grid-gap: 30px;
        min-height: 200px;
        /* box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08); */
        border-radius: 20px;
    }

    .row .box {
        position: relative;
        background: #fff;
        padding: 20px;
        height: 10rm;
        width: 100%;
        box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
        border-radius: 20px;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        display: grid;
        grid-gap: 20px;
    }

    /* .graphbox .box {
        position: relative;
        background: #fff;
        padding: 20px;
        width: 100%;
        box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
        border-radius: 20px;
    } */



    @media (max-width: 991px) {
        .graphbox {
            grid-template-columns: 1fr;
            height: auto;
        }
    }
</style>

<!-- Top Navigation -->
<?php $this->load->view('templates/topnav'); ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div style='background-color:white;' class="container-fluid">

                    <div class="row">
                        <div class="col-md-8">
                            <!-- Page Heading -->
                            <div class="d-sm-flex align-items-center justify-content-between mb-2 px-4">
                                <h1 class="h3 mb-0 text-gray-800 pt-4 font-weight-bold">Report</h1>
                            </div>
                            <div class="py-2 px-4" style="text-align: justify; font-weight:500;">This report is generated based on the Reading Progress & Quiz's result.</div>
                        </div>
                        <div class="col-md-4 pt-5 pr-5">
                            <a id="report_button" class="btn btn-primary" style="float:right; width:auto;">Print Report</a>
                        </div>
                    </div>

                    <div class="px-4 pb-4">
                        <hr style=" width :100%; height:2px; background-color:#EAF4F4">
                    </div>
                </div>
                <!-- /.container-fluid -->

                <main>


                    <div class=" row justify-content-md-center pb-5 px-4">
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <div class="box">
                                <div class="card-body">
                                    <h5 class="card-title">First attempt score</h5>
                                    <p class="card-text">Your First attempt score : </p>
                                    <a href="#" class="btn btn-primary h-10">Show</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <div class="box">
                                <div class="card-body">
                                    <h5 class="card-title">Overall First Attempt Percentage</h5>
                                    <p class="card-text">Your overall First Attempt Score % is :</p>
                                    <a href="#" class="btn btn-primary">Show</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <div class="box">
                                <div class="card-body">
                                    <h5 class="card-title">Highest Streak</h5>
                                    <p class="card-text">Your Highest Streak is :</p>
                                    <a href="#" class="btn btn-primary">Show</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Graph -->
                    <div class="graphbox">
                        <div class="box">
                            <div class="col-xl-12 col-lg-12">
                                <div class="card h-100 shadow mb-4">
                                    <div class="card-header py-3" style="background-color: #9FE2BF">
                                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">QUIZ Score</div>
                                    </div>

                                    <div class="card-body">
                                        <div class="box">
                                            <canvas id="myChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="box">
                            <div class="col-xl-12 col-lg-12">
                                <div class="card h-100 shadow mb-4">
                                    <div class="card-header py-3" style="background-color: #9FE2BF">
                                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Score</div>
                                    </div>

                                    <div class="card-body">
                                        <div class="box">
                                            <canvas id="pieChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box">
                            <div class="col-xl-12 col-lg-12">
                                <div class="card h-100 shadow mb-4">
                                    <div class="card-header py-3" style="background-color: #9FE2BF">
                                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Reading Progress</div>
                                    </div>

                                    <div class="card-body">
                                        <div class="box">
                                            <canvas id="doughnutChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>





                </main>

                <script>
                    var ctx = document.getElementById('myChart').getContext('2d');
                    // const ctx = document.getElementById('myChart');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['First Attempt', 'Understanding Dementia Symptoms', 'Tips For Communicating With Dementia', 'Dealing With People With Dementia'],
                            datasets: [{
                                label: 'Quiz Scores',
                                data: [3, 1, 10, 6],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(255, 159, 64, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',

                                    'rgba(201, 203, 207, 0.2)'
                                ],
                                borderColor: [
                                    'rgb(255, 99, 132)',
                                    'rgb(240, 159, 0)',
                                    'rgb(153, 102, 255)',
                                    'rgb(75, 192, 192)',
                                    'rgb(54, 162, 235)',

                                    'rgb(201, 203, 207)'
                                ],
                                borderWidth: 2
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


                <script>
                    var pieChart = document.getElementById('pieChart').getContext('2d');
                    var myChart = new Chart(pieChart, {
                        type: 'pie',
                        data: {
                            labels: ['Understanding Dementia Symptoms', 'Tips For Communicating With Dementia', 'Dealing With People With Dementia'],
                            datasets: [{
                                label: 'Quiz Score',
                                data: [5, 10, 2],
                                backgroundColor: [
                                    'rgb(240, 159, 0)',
                                    'rgb(153, 102, 255)',
                                    'rgb(75, 192, 192)'
                                ],
                                hoverOffset: 4
                            }]
                        },
                        options: {
                            responsive: true,
                        }
                    });
                </script>


                <script>
                    var pieChart = document.getElementById('doughnutChart').getContext('2d');
                    var myChart = new Chart(doughnutChart, {
                        type: 'doughnut',
                        data: {
                            labels: ['Reading 1', 'Reading 2', 'Reading 3'],
                            datasets: [{
                                label: 'Reading Progress',
                                data: [300, 50, 100],
                                backgroundColor: [
                                    'rgb(255, 99, 180)',
                                    'rgb(54, 162, 235)',
                                    'rgb(255, 205, 86)'
                                ],
                                hoverOffset: 4
                            }]
                        },
                        options: {
                            responsive: true,
                        }
                    });
                </script>