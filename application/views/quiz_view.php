<!-- Set base url to javascript variable-->
<script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";
</script>
<script src="<?php echo base_url() ?>/assets/js/additional/quiz_info.js"></script>

<!-- Styles-->
<style>
    html {
        scroll-behavior: smooth;
    }

    .container-fluid {
        width: 100%;
        height: 100vh;
        /* background-image: url(<?php echo base_url('assets/img/background3.jpg'); ?>); */
        background-color: #FFFF;
        background-position: center;
        position: relative;
        overflow: auto;
    }

    .transparent {
        position: relative;
        background: transparent;
        border: 2px solid rgba(255, 255, 255, 0.5);
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
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-8">
                            <!-- Page Heading -->
                            <div class="d-sm-flex align-items-center justify-content-between mb-2 px-4">
                                <h1 class="h3 mb-0 pt-4 font-weight-bold" style="color:#000000">Dementia Quiz</h1>
                            </div>
                            <div class="py-2 px-4" style="text-align: justify; font-weight:500; color:#000000">Finish all the quizzes and grab your well-deserved completion certificate!</div>
                        </div>
                        <div class="col-md-4 pt-5 pr-5">
                            <?php if ($qs_data->status == 3 && $qt_data->status == 3 && $qd_data->status == 3) { ?>
                                <a id="leave_button" class="btn btn-primary" style="float:right; width:auto;"><i class="fas fa-medal pr-2"></i>Claim your certificate!</a>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="px-4 pb-4">
                        <hr style=" width :100%; height:2px; background-color:#000000">
                    </div>

                    <div class="row justify-content-md-center pb-5 px-4">
                        <div class="col-md-4 pb-5">
                            <div class="px-2">
                                <div class="card shadow" style="border-radius: 20px;">
                                    <div class="card-body text-center bg-" style="border-top-left-radius: 20px; border-top-right-radius: 20px;background-color: #098886;">
                                        <h5 class="card-title pt-3" style="font-weight: 700; color:white;">Understanding Dementia Symptoms </h5>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <div class="pb-2"><?= 10 - $qs_data->progress ?> questions left</div>
                                            <div class="progress" style="height: 25px;">
                                                <div class="progress-bar" role="progressbar" style="width: <?php echo ($qs_data->progress / 10) * 100 ?>%; " aria-valuenow="<?= $qs_data->progress ?>" aria-valuemin="0" aria-valuemax="10"><?php echo ($qs_data->progress / 10) * 100 ?>%</div>
                                            </div>
                                        </li>
                                        <li class="list-group-item"><i class="fas fa-fire pr-2" style="color:red;"></i>Highest Streak: <?= $qs_data->max_streak ?></li>
                                        <?php if ($qs_data->status != 1) { ?>
                                            <li class="list-group-item">Last Activity: <?= $qs_data->last_update ?></li>
                                        <?php } ?>
                                        <?php if ($qs_data->status == 3) { ?>
                                            <li class="list-group-item">Score: <?= $qs_data->score ?>/10 (<?php echo ($qs_data->score / 10) * 100 ?>%)</li>
                                        <?php } ?>
                                    </ul>
                                    <div class="card-body">
                                        <?php if ($qs_data->status == 1) { ?>
                                            <a href="<?= base_url('quiz/take_quiz/1'); ?>" class="btn btn-success px-2 py-2" style="width: 100%;"><i class="fas fa-clipboard pr-2"></i>Take Quiz</a>
                                        <?php } elseif ($qs_data->status == 2) { ?>
                                            <a href="<?= base_url('quiz/take_quiz/1'); ?>" class="btn btn-success px-2 py-2" style="width: 100%;"><i class="fas fa-clipboard pr-2"></i>Continue</a>
                                        <?php } else { ?>
                                            <div class="row">
                                                <div class="col-md-12 px-2 pb-2">
                                                    <a onclick="retake_quiz(1)" class="btn btn-danger" style="width: 100%;"><i class="fas fa-clipboard pr-2"></i>Retake Quiz</a>
                                                </div>
                                                <div class="col-md-12 px-2 py-2">
                                                    <button type="button" class="btn btn-success" style="width: 100%;" onclick="generate_result('quiz_symptom')" data-toggle="modal" data-target="#check_result"><i class="fas fa-pen pr-2"></i>View Results</button>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 pb-5">
                            <div class="px-2">
                                <div class="card shadow" style="border-radius: 20px;">
                                    <div class="card-body text-center bg" style="border-top-left-radius: 20px; border-top-right-radius: 20px; background-color: #098886;">
                                        <h5 class=" card-title pt-3" style="font-weight: 700; color:white;">Tips For Communicating With Dementia</h5>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <div class="pb-2"><?= 10 - $qt_data->progress ?> questions left</div>
                                            <div class="progress" style="height: 25px;">
                                                <div class="progress-bar" role="progressbar" style="width: <?php echo ($qt_data->progress / 10) * 100 ?>%; " aria-valuenow="<?= $qt_data->progress ?>" aria-valuemin="0" aria-valuemax="10"><?php echo ($qt_data->progress / 10) * 100 ?>%</div>
                                            </div>
                                        </li>
                                        <li class="list-group-item"><i class="fas fa-fire pr-2" style="color:red;"></i>Highest Streak: <?= $qt_data->max_streak ?></li>
                                        <?php if ($qt_data->status != 1) { ?>
                                            <li class="list-group-item">Last Activity: <?= $qt_data->last_update ?></li>
                                        <?php } ?>
                                        <?php if ($qt_data->status == 3) { ?>
                                            <li class="list-group-item">Score: <?= $qt_data->score ?>/10 (<?php echo ($qt_data->score / 10) * 100 ?>%)</li>
                                        <?php } ?>
                                    </ul>
                                    <div class="card-body">
                                        <?php if ($qt_data->status == 1) { ?>
                                            <a href="<?= base_url('quiz/take_quiz/2'); ?>" class="btn btn-success px-2 py-2" style="width: 100%;"><i class="fas fa-clipboard pr-2"></i>Take Quiz</a>
                                        <?php } elseif ($qt_data->status == 2) { ?>
                                            <a href="<?= base_url('quiz/take_quiz/2'); ?>" class="btn btn-success px-2 py-2" style="width: 100%;"><i class="fas fa-clipboard pr-2"></i>Continue</a>
                                        <?php } else { ?>
                                            <div class="row">
                                                <div class="col-md-12 px-2 pb-2">
                                                    <a onclick="retake_quiz(2)" style="width: 100%;" class="btn btn-danger"><i class="fas fa-clipboard pr-2"></i>Retake Quiz</a>
                                                </div>
                                                <div class="col-md-12 px-2 py-2">
                                                    <button type="button" class="btn btn-success" style="width: 100%;" onclick="generate_result('quiz_tips')" data-toggle="modal" data-target="#check_result"><i class="fas fa-pen pr-2"></i>View Results</button>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4 pb-5">
                            <div class="px-2">

                                <div class="card shadow" style="border-radius: 20px;">
                                    <div class="card-body text-center bg" style="border-top-left-radius: 20px; border-top-right-radius: 20px;background-color: #098886;">
                                        <h5 class=" card-title pt-3" style="font-weight: 700; color:white;">Dealing With People With Dementia</h5>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <div class="pb-2"><?= 10 - $qd_data->progress ?> questions left</div>
                                            <div class="progress" style="height: 25px;">
                                                <div class="progress-bar" role="progressbar" style="width: <?php echo ($qd_data->progress / 10) * 100 ?>%; " aria-valuenow="<?= $qd_data->progress ?>" aria-valuemin="0" aria-valuemax="10"><?php echo ($qd_data->progress / 10) * 100 ?>%</div>
                                            </div>
                                        </li>
                                        <li class="list-group-item"><i class="fas fa-fire pr-2" style="color:red;"></i>Highest Streak: <?= $qd_data->max_streak ?></li>
                                        <?php if ($qd_data->status != 1) { ?>
                                            <li class="list-group-item">Last Activity: <?= $qd_data->last_update ?></li>
                                        <?php } ?>
                                        <?php if ($qd_data->status == 3) { ?>
                                            <li class="list-group-item">Score: <?= $qd_data->score ?>/10 (<?php echo ($qd_data->score / 10) * 100 ?>%)</li>
                                        <?php } ?>
                                    </ul>
                                    <div class="card-body">
                                        <?php if ($qd_data->status == 1) { ?>
                                            <a href="<?= base_url('quiz/take_quiz/3'); ?>" class="btn btn-success px-2 py-2 " style="width: 100%;"><i class=" fas fa-clipboard pr-2"></i>Take Quiz</a>
                                        <?php } elseif ($qd_data->status == 2) { ?>
                                            <a href="<?= base_url('quiz/take_quiz/3'); ?>" class="btn btn-success px-2 py-2" style="width: 100%;"><i class="fas fa-clipboard pr-2"></i>Continue</a>
                                        <?php } else { ?>
                                            <div class="row">
                                                <div class="col-md-12 px-2 pb-2">
                                                    <a onclick="retake_quiz(3)" class="btn btn-danger" style="width: 100%;"><i class="fas fa-clipboard pr-2"></i>Retake Quiz</a>
                                                </div>
                                                <div class="col-md-12 px-2 py-2">
                                                    <button type="button" class="btn btn-success" style="width: 100%;" onclick="generate_result('quiz_dealing')" data-toggle="modal" data-target="#check_result"><i class="fas fa-pen pr-2"></i>View Results</button>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- View Results Modal -->
            <div class="modal fade" id="check_result" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h4 class="modal-title " id="exampleModalLongTitle" style="color: white;"></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php for ($i = 0; $i < 10; $i++) { ?>
                                <div class="card shadow my-3">
                                    <div class="row pt-3 px-4">
                                        <div class="col-md-11">
                                            <h5 id="question<?= $i ?>" style="color: black;">Questions</h5>
                                        </div>
                                        <div class="col-md-1">
                                            <i class="p-1" id="icon<?= $i ?>" style="color: #28a745; width:100%; height:100%;"></i>
                                        </div>
                                    </div>
                                    <div class="row py-2 px-3">
                                        <div class="col-md-6">
                                            <div class="card question-card" id="card_body_1<?= $i ?>">
                                                <div class="card-body question-body">
                                                    <h7 class="card-title" id="answer_a<?= $i ?>">Answer 1</h7>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card question-card" id="card_body_2<?= $i ?>">
                                                <div class="card-body question-body">
                                                    <h7 class="card-title" id="answer_b<?= $i ?>">Answer 2</h7>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row pt-2 pb-4 px-3">
                                        <div class="col-md-6">
                                            <div class="card question-card" id="card_body_3<?= $i ?>">
                                                <div class="card-body question-body">
                                                    <h7 class="card-title" id="answer_c<?= $i ?>">Answer 3</h7>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card question-card" id="card_body_4<?= $i ?>">
                                                <div class="card-body question-body">
                                                    <h7 class="card-title" id="answer_d<?= $i ?>">Answer 4</h7>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>