<script src="<?php echo base_url()?>/assets/vendor/jquery/jquery.min.js"></script>

<style>
label{
    color:black;
}
</style>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Edit R&D Project</h1>
                </div>

                <!-- Breadcrumn -->
                <div class="row" >
                    <div class="breadcrumb-wrapper col-xl-9">
                        <ol class="breadcrumb" style = "background-color:rgba(0, 0, 0, 0);">
                            <li class="breadcrumb-item">
                                <a href="<?php echo base_url('internal/level_2/educational_partner/ep_dashboard');?>"><i class="fas fa-tachometer-alt"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="<?= base_url('internal/level_2/educational_partner/ep_my_rd_project'); ?>"></i>R&D Projects</a>
                            </li>
                            <li class="breadcrumb-item active">Edit R&D Project</li>
                        </ol>
                    </div>
                    <div class = "col-xl-3">
                        <div class = "d-flex justify-content-end">
                            <a type="button" href = "<?= base_url('internal/level_2/educational_partner/ep_my_rd_project'); ?>" class="btn btn-primary">Back<i class="fas fa-undo pl-1"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Content Row -->
                <div class="row">
                    <div class="col-xl-12">
                        <!-- Card-->
                        <div class="card ">
                            <div class="card-body">
                                <form method="post" action=" <?=base_url('internal/level_2/educational_partner/ep_my_rd_project/submit_edit_my_rd_project/'.$rd_detail->rd_id); ?>" enctype="multipart/form-data">
                                <?= form_open_multipart('') ?>

                                <div class="form-row pt-4">
                                    <div class="form-group col-md-6 px-4 pr-5">
                                        <label for="course_name">R&D Project Title</label>
                                        <textarea type="text" rows = "2" class="form-control" id="rd_title" name = "rd_title" placeholder="Enter title" required><?=$rd_detail->rd_title?></textarea>
                                    </div>
                                    <div class="form-group col-md-6 px-4 pl-5">
                                        <label for="rd_organisation">R&D Project Organisation</label>
                                        <textarea type="text" rows = "2" class="form-control" id="rd_organisation" name = "rd_organisation" placeholder="Enter organisation" required><?=$rd_detail->rd_organisation?></textarea>
                                    </div>
                                </div>

                                <div class="form-row pt-4">
                                    <div class="form-group col-md-6 px-4 pr-5">
                                        <label for="rd_pic">Person in Charge</label>
                                        <input type="text" class="form-control" id="rd_pic" name = "rd_pic" placeholder="Enter person in charge" value = "<?=$rd_detail->rd_pic?>" required>	
                                    </div>
                                    <div class="form-group col-md-6 px-4 pl-5">
                                        <label for="rd_pic_post">Person in Charge Position</label>
                                        <input type="text" class="form-control" id="rd_pic_post" name = "rd_pic_post" placeholder="Enter person in charge position" value = "<?=$rd_detail->rd_pic_post?>" required>	
                                    </div>
                                </div>

                                <div class="form-row pt-4">
                                    <div class="form-group col-md-6 px-4 pr-5">
                                        <label for="rd_pic_dept">Person in Charge Department</label>
                                        <input type="text" class="form-control" id="rd_pic_dept" name = "rd_pic_dept" placeholder="Enter person in charge department" value = "<?=$rd_detail->rd_pic_dept?>" required>	
                                    </div>
                                    <div class="form-group col-md-6 px-4 pl-5">
                                        <label for="rd_pic_email">Person in charge Email</label>
                                        <input type="text" class="form-control" id="rd_pic_email" name = "rd_pic_email" placeholder="Enter person in charge email" value = "<?=$rd_detail->rd_pic_email?>" required>	
                                    </div>
                                </div>

                                <div class="form-row pt-4">
                                    <div class="form-group col-md-12 px-4 ">
                                        <label for="rd_scope">R&D Project Scope</label>
                                        <textarea type="text" class="form-control" rows = "6" id="rd_scope" name = "rd_scope" placeholder="Enter R&D project scope"required><?=$rd_detail->rd_scope?></textarea>
                                    </div>
                                </div>

                                <div class="form-row pt-4">
                                    <div class="form-group col-md-12 px-4 ">
                                        <label for="rd_objective">R&D Project Objective</label>
                                        <textarea type="text" class="form-control" rows = "6" id="rd_objective" name = "rd_objective" placeholder="Enter R&D project objective"required><?=$rd_detail->rd_objective?></textarea>
                                    </div>
                                </div>

                                <div class="py-4">
                                    <hr style=" width :100%; height:1px; background-color: rgba(0, 0, 0, 0.3); ;">
                                </div>

                                <div class="form-row pt-4">
                                    <div class="form-group col-md-5 pl-5">
                                        <div style = "color:black;" >Current Document</div>
                                    </div>

                                    <div class="form-group col-md-6 ">
                                        <div style = "color:black;">New Document</div>
                                        <div>(<a href="<?= base_url('/assets/uploads/rd_projects/template-research.pdf')?>" download>R&D Project Document Template 2021</a>)</div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-5 pl-5">
                                        <a href="<?=base_url("assets/uploads/rd_projects/").$rd_detail->rd_document?>" target="_blank"><?=$rd_detail->rd_document?></a>
                                    </div>

                                    <div class="form-group col-md-6 ">
                                        <input type="file"  accept=".pdf" class="custom-file-input px-4" id="rd_document" name="rd_document" >
                                        <label class="custom-file-label" for="customFile">Select a document</label>
                                        <div style = "color:red; font-size:0.9em;">*Required document: COMPLETED R&D project document in .PDF file format</div>
                                    </div>
                                </div>

                                <!-- Edit button -->
                                <div class ="pr-4 pt-4">
                                    <button  type="submit" class="btn btn-primary " style = "float:right;" >Submit<i class="fas fa-check pl-2"></i></button>
                                </div>

                                </form>

                            </div>
                        </div>
                        <!-- /. Card -->

                    </div>                   
                </div>
                <!-- /. Content Row -->
                <script>
                // File appear on select
                $(".custom-file-input").on("change", function() {
                    var fileName = $(this).val().split("\\").pop();
                    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                });
                </script>
                
                
                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->
