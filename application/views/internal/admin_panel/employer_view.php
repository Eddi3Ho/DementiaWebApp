<style>
th{
    color:black;
}
td{
    color: rgba(0,0,0,0.7);
}
</style>

<!-- Content Wrapper -->
<div id="content-wrapper" >

<!-- Main Content -->
<div id="content">    
    
    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Employers</h6>
        </div>
        <div class="card-body">
        <div class="table-responsive">
                <table id="dataTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Full Name</th>
                            <th>Contact Number</th>
                            <th>Business Email</th>
                            <th>Nationality</th>
                            <th>Gender</th>
                            <th>DOB</th>
                            <th>Document</th>
                            <th>Job Title</th>
                            <th>Submitted Date</th>
                        </tr>
                    </thead>
                    
                    <tbody>

                    <?php $count=1;?>
                    <?php foreach($elist->result() as $e):?>

                    <?php
                        echo "<tr>"
                            ."<td>$count</td>"
                            ."<td>$e->user_fname $e->user_lname</td>"
                            ."<td>$e->e_phonenumber</td>"
                            ."<td>$e->e_businessemail</td>"
                            ."<td>$e->e_nationality</td>"
                            ."<td>$e->e_gender</td>"
                            ."<td>$e->e_dob</td>"
                            ."<td style='text-align:center'><a class='btn btn-info ' href='"
                            .base_url()
                            ."assets/uploads/employer/$e->e_document' role='button' target='_blank'><span class='fas fa-eye'></span></a></td>" 
                            ."<td>$e->e_jobtitle</td>" 
                            ."<td>$e->e_submitdate</td>" 
                            ."</tr>" 
                    ?>
                    <?php $count++; ?>
                    <?php endforeach ;?>
                    </tbody>
                </table>
        </div>
    </div>
</div>
</div>

