<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / View Customers
            </li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fa fa-fw fa-money"></i> View Customers</h3>
            </div>
            <div class="card-body">
                <table class="table table-responsive table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                           <th>No: </th>
                           <th>User Name: </th>
                           <th>User Image</th>
                           <th>User Email: </th>
                           <th>User Country: </th>
                           <th>User Job </th>
                           <th>User Contact: </th>
                           <th>Edit</th>
                           <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $get_p_cat = "SELECT * FROM admins";
                        $run_p_cat = mysqli_query($conn, $get_p_cat);
                        while($row = mysqli_fetch_array($run_p_cat)){
                            $name = $row["admin_name"];
                            $email = $row["admin_email"];
                            $contact = $row["admin_contact"];
                            $country = $row["admin_country"];
                            $job = $row["admin_job"];
                            $image = $row["admin_image"];
                            $id = $row["admin_id"];
                            echo '
                            <tr>
                            <td>'.$i.'</td>
                            <td>'.$name.'</td>
                            <td><img src="images/admin/'.$image.'" style="width: 60px; height: 60px;" alt=""></td>
                            <td>'.$email.'</td>
                            <td>'.$country.'</td>
                            <td>'.$job.'</td>
                            <td>'.$contact.'</td>
                            <td><a href="edit_user.php?edit_user='.$id.'" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a></td>
                            <td><a href="delete_user.php?delete_user='.$id.'" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</a></td>
                        </tr>';
                        $i++;
                        }
                      
                        
                       
                        
                        ?>
                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>