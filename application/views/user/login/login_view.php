<!-- Set base url to javascript variable-->
<script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";
</script>
<script>
    //Js to remove alert message after university information is edited
    setTimeout(function() {
        $('#alert_message').fadeOut();
    }, 5000); // <-- time in milliseconds
</script>

<style>
    .logo-img {
        width: 100px;
        height: auto;
        position: relative;
        color: #F5F5F5;
    }

    .container-fluid {
        width: 100%;
        height: 100vh;
        background-image: url(<?php echo base_url('assets/img/background.png'); ?>);
        background-position: center;
        position: relative;
        overflow: scroll;

    }

    .transparent {
        position: relative;
        background: transparent;
        border: 4px solid rgba(255, 255, 255, 0.5);
        backdrop-filter: blur (20px);
    }

    .transparent2 {
        position: relative;
        background: transparent;
        border: 4px solid rgba(255, 255, 255, 0.5);
        backdrop-filter: blur (20px);

    }

    /* .card-img-top {} */

    /* .boxlog {
        width: 100%;
        height: 60vh; */
    /* background-image: url(<?php echo base_url('assets/img/old.jpg'); ?>); */
    /* background-position: center;
        object-fit: cover;
        position: relative;
        overflow: hidden;
    } */
</style>

<body id="page-top" style='background-color:#f9f6f1;'>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Cards for registration -->
                    <div class="row justify-content-md-center pt-5 pb-5" style='text-align: center;'>

                        <!-- Steps -->
                        <div class="col-xl-3 ">
                            <div class="card h-100 transparent2" id='card1' style="border-radius: 20px;">
                                <div class="container md-8 text-bold" style=" font-size:19px; background-color: #FFFF; font-weight:500;border-top-left-radius: 20px;border-top-right-radius: 20px;padding:0;">

                                    <img class="card-img-top logo-img " src="<?php echo base_url('assets/img/dementia_new.png') ?>" alt="Card image cap">
                                    <span style="display: inline-block; padding: 10px;">| DEMENTIA APP</span>
                                </div>
                                <div class="card-body ">


                                    <div class="pl-3 pr-3 pt-4 boxlog">
                                        <div class="pl-4" style="font-size:16px; font-weight:700; color:#F5F5F5;"> </div>
                                        <!-- <div class="pt-2 pl-4 pb-3 text-center" style=" font-size:20px; color:#F5F5F5; font-weight:900;">DEMENTIA APP</div> -->

                                        <div class="pl-5">
                                            <div class="number pt-4 pl-5 pb-4" style="font-size:15px; color:#F5F5F5; font-weight:800;">About Us</div>
                                        </div>
                                        <div class="pl-4 pb-3" style="font-size:14px; color:#F5F5F5;">This is a user-friendly platform that provides knowledge about dementia symptoms, quizzes, and more. The app features an interactive quiz to test knowledge. It aims to be a reliable resource for individuals, caregivers, and healthcare professionals, promoting understanding and support for those affected by dementia.</div>

                                        <!-- <div class="pl-4">
                                            <div class="number pt-4 pl-4 pb-1" style="font-size:18px; color:#F5F5F5; font-weight:700;">02</div>
                                        </div>
                                        <div class="pl-4 pb-3" style="font-size:14px; color:#F5F5F5;">If you already have an existing account, login now with your credentials. </div>

                                        <div class="pl-4">
                                            <div class="number pt-4 pl-4 pb-1" style="font-size:18px; color:#F5F5F5; font-weight:700;">03</div>
                                        </div>
                                        <div class="pl-4 pb-5" style="font-size:14px; color:#F5F5F5;">After login, you are on the main page based on your role. </div> -->

                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Form -->
                        <div class="col-xl-6 ">
                            <div class="card h-100 transparent" id='card2'>
                                <div class="card-body">
                                    <center>
                                        <div class="pt-5 px-5" style="font-size:23px; letter-spacing: 8px; color:#F5F5F5; font-weight:700;">LOGIN PAGE</div>
                                    </center>
                                    <?= $this->session->flashdata('message') ?>
                                    <!-- Input fields (Form) -->
                                    <form class="user" method="post" action=" <?= base_url('user/auth/login'); ?>">
                                        <!-- Email-->
                                        <div class="form-row pt-5 px-3">
                                            <div class="form-group col-md-12 px-2">
                                                <input type="email" name="user_email" class="form-control border-bottom" id="email" style="border: 0;" placeholder="Enter your email address" value="<?= set_value('user_email'); ?>" required>
                                                <?= form_error('user_email', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <!-- Password and confirm password -->
                                        <div class="form-row pt-3 pb-3 px-3">
                                            <div class="form-group col-md-12 px-2">
                                                <input type="password" name="user_password" class="form-control border-bottom" id="password" style="border: 0;" placeholder="Enter your password" required>
                                                <?= form_error('user_password', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <!-- Submit button -->
                                        <div class="pt-1 pr-4">
                                            <button type="submit" class="btn btn-success" style="float:right; width:23%;">Login <i class="fas fa-check"></i></button>
                                        </div>
                                        <br>
                                        <br>
                                    </form>
                                    <!-- End of Input fields (Form) -->
                                    <center>
                                        <div class="pt-5 pb-3">
                                            <a class="" style="text-align:center; color: #F5F5F5;" href="<?= base_url('user/auth/registration'); ?>">Register an account</a>
                                        </div>
                                        <a class="mt-5" style="text-align:center; color: #F5F5F5;" href="<?= base_url("user/auth/forgotPassword"); ?>">Forget your password?</a>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <!-- End for registration -->

                    </div>
                    <!-- END OF ROW -->
                    <!-- END OF FORM -->

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <?php
            if ($this->session->flashdata('register_success')) {
            ?>
                <script>
                    Swal.fire({
                        title: 'Your account has been registered.',
                        icon: 'success',
                    })
                </script>
            <?php
            }
            ?>