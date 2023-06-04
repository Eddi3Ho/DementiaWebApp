<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<style>
    .nav-link {
        color: white;
        font-size: 1.1rem;
        font-weight: 600;
    }

    .nav-link:hover {
        color: rgba(255, 237, 109, 1) !important;
    }

    .dropdown-item {
        color: white;
        font-size: 1.0rem;
        font-weight: 600;
    }

    .dropdown-item:hover {
        background: rgba(255, 255, 255, 0.1) !important;
        color: rgba(255, 237, 109, 1) !important;
    }

    #register_btn:hover {
        opacity: 0.90;
    }

    .navbar-nav>li>a {
        padding-top: 5px !important;
        padding-bottom: 5px !important;
    }

    .navbar {
        min-height: px !important
    }

    #nav_line {
        border: none;
        border-left: 1px solid hsla(200, 10%, 50%, 100);
        background-color: white;
        height: 5vh;
        width: 1px;
    }
</style>

<!-- Topbar -->
<nav class="navbar sticky-top navbar-expand topbar" style="background-color: #6B9080;">

    <!-- Logo Image-->
    <!-- <nav class="navbar navbar-light bg-light">   -->
    <a class="navbar-brand py-0 " href="<?php echo base_url('external/homepage'); ?>">
        <img src="<?php echo base_url('assets/img/iJEES_Logo.png'); ?>" height="100" alt="">
    </a>
    <!-- </nav> -->

    <!-- Float left Group -->
    <ul class="navbar-nav mr-auto">

        <li class="nav-item px-2">
            <a class="nav-link font-weight-bold" href="<?= base_url('reading_corner'); ?>">Reading Corner</a>
        </li>

        <li class="nav-item px-2">
            <a class="nav-link font-weight-bold" href="<?= base_url('report'); ?>">Report</a>
        </li>

        <li class="nav-item px-2">
            <a class="nav-link font-weight-bold" href="<?= base_url('quiz'); ?>">Quiz</a>
        </li>



    </ul>

    <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown no-arrow pl-1">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline small pr-2" style="color: white; font-weight:700; font-size:0.9em;"><?php echo $this->session->userdata('user_fname'); ?></span>
                    <img class="img-profile rounded-circle" src="<?= base_url('assets/img/chat_user/profile_pic.png'); ?>">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" style="background-color: #6B9080;" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="<?= base_url('user/profile'); ?>" style="color: white;">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a onclick="logout()" class="dropdown-item" style="color: white; cursor: pointer;">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Log Out
                    </a>
                </div>
            </li>
    </ul>

</nav>
<!-- End of Topbar -->

<script>
    function logout() {

        Swal.fire({
            text: 'Are you sure you want to Log Out?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Log Out'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?php echo base_url('user/Auth/logout'); ?>";
            }
        })
    }
</script>