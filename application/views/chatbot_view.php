<!-- Set base url to javascript variable-->
<script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";
    var new_chat = "<?= $new_chat ?>";
    var current_con_id = <?= $latest_con_id ?>;

</script>

<!-- Styles-->
<style>
    html {
        scroll-behavior: smooth;
    }

    .fixed-bottom-wrapper {
        position: fixed;
        bottom: 0;
    }

    .textarea {
        display: block;
        height: 100%;
        width: 600px;
        overflow: hidden;
        resize: none;
        font-size: 1.1rem;


    }

    .textarea[contenteditable]:empty::before {
        content: "Placeholder still possible";
        color: gray;
    }

    .textarea:focus {
        outline: none;
        box-shadow: none;
    }

    .chatbubble {
        border-radius: 20px;
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
                                <h1 class="h3 mb-0 text-gray-800 pt-4 font-weight-bold">Dementia Chatbot</h1>
                            </div>
                            <div class="py-2 px-4" style="text-align: justify; font-weight:500;">Ask the chatbot about dementia!</div>
                        </div>
                    </div>

                    <div class="px-4 pb-4">
                        <hr style=" width :100%; height:2px; background-color:#EAF4F4">
                    </div>

                    <!-- Content Row (Start here)-->
                    <div class="row mx-5">
                        <div class="col-xl-12">

                            <div class="card shadow ">
                                <div class="card-body" style="min-height: 1000px;">

                                    <div class="row ">
                                        <div class="col-xl-2" style="border-right: black;" id="conversation_list">

                                            <div onclick="open_new_chat()" class="card shadow chatbubble" style=" color: black;">
                                                <div class="card-body">
                                                    + New chat
                                                </div>
                                            </div>

                                            <?php
                                            if (isset($conversation_history_data)) {
                                                foreach ($conversation_history_data as $conversation_history_row) {
                                            ?>
                                                    <div onclick="load_history(<?=$conversation_history_row->con_id?>)" class="card shadow chatbubble mt-2" style=" color: black;">
                                                        <div class="card-body">
                                                            <?=$conversation_history_row->con_name?>
                                                        </div>
                                                    </div>
                                            <?php }
                                            } ?>
                                        </div>

                                        <div class="col-xl-10 px-5" id="conversation_body">
                                            <div class="row justify-content-center py-2" id="new_chat_info">
                                                <div class="col-xl-7 py-2">
                                                    <div class="card shadow chatbubble" style=" color: black;">
                                                        <div class="card-body">
                                                            Ask the chatbot about something
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-7 py-2">
                                                    <div class="card shadow chatbubble" style="color: black;">
                                                        <div class="card-body">
                                                            Do not know where to start? Try asking these question!

                                                            <div class="card my-2" style="color: black; background-color: #F2F0F0; border-radius: 40px; width: 50%; padding-top:0px; padding: bottom 0px;">
                                                                <div class="card-body">
                                                                    List out the top 5 most profitable item sold in the past 12 months
                                                                </div>
                                                            </div>
                                                            <div class="card my-2" style="color: black; background-color: #F2F0F0; border-radius: 40px; width: 50%; padding-top:0px; padding: bottom 0px;">
                                                                <div class="card-body">
                                                                    What are the company’s policies on vacation time and sick leave?
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="row">
                        <div class="col-xl-12 d-flex justify-content-center">
                            <div class="fixed-bottom-wrapper mb-5">

                                <div class="card shadow" style="border-radius: 15px;">
                                    <div class="card-body d-flex align-items-center" style="padding-top:10px; padding-bottom:10px;">
                                        <span id="user_prompt" class="textarea" role="textbox" contenteditable></span>
                                        <a onclick="enter_prompt()" class="btn btn-success ml-4 mt-auto" style="margin-right: -7px;"><i class="fas fa-paper-plane"></i></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->