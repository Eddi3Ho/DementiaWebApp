<style>

.nav-link {
    color: white;
    font-size:1.1rem;
    font-weight: 600;
}

.dropdown-item{
    color: white;
    font-size: 1.0rem;
    font-weight: 600;
}

.btn:hover{
    opacity:0.90;
}

.navbar-nav > li > a {padding-top:5px !important; padding-bottom:5px !important;}
.navbar {min-height:px !important}

</style>

<!-- Topbar -->
<nav class="navbar sticky-top navbar-expand topbar"  style="background-color: #6B9080;">

    <!-- Logo Image-->
    <nav class="navbar navbar-light bg-light">  
        <a class="navbar-brand py-0" href="#">
            <img src="" width="30" height="20" alt="">
        </a>
    </nav>


    <!-- Float left Group -->
    <ul class="navbar-nav ml-auto">

        <li class="nav-item px-2">
            <a class="nav-link " href="<?php echo base_url('external/universities');?>">Universities</a>
        </li>

        <li class="nav-item px-2">
            <a class="nav-link" href="#">Courses</a>
        </li>

        <li class="nav-item px-2">
            <a class="nav-link" href="<?php echo base_url('external/compare');?>">Comparison</a>
        </li>


        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown px-2" >
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" 
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-white-600">Projects</span>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" style="background-color: #A4C3B2;"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" style = "color: white;" >
                    Employer Projects
                </a>
                <a class="dropdown-item" href="#" style = "color: white;" >
                    Research & Development Projects
                </a>
            </div>
        </li>

        <li class="nav-item px-2">
            <a class="nav-link" href="#">About Us</a>
        </li>

        <li class="nav-item pl-2">
            <a class="nav-link" href="#" >
                <button type="button" class="btn" style="background-color: white; color: #6B9080; font-size: 0.rem; border-radius:15px; font-weight: 800;">Hava a Chat</button>
            </a>
        </li>

        <li class="nav-item pl-1">
            <a class="nav-link" href="#">
                <button type="button" class="btn" style="background-color: white; color: #6B9080; font-size: 0.9em; border-radius:15px; font-weight: 800;">Login / Register</button>
            </a>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->