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
                           <th>Name: </th>
                           <th>Image</th>
                           <th>Email: </th>
                           <th>Country: </th>
                           <th>City: </th>
                           <th>Address: </th>
                           <th>Contact: </th>
                           <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $get_p_cat = "SELECT * FROM customer";
                        $run_p_cat = mysqli_query($conn, $get_p_cat);
                        while($row = mysqli_fetch_array($run_p_cat)){
                            $name = $row["customer_name"];
                            $email = $row["customer_email"];
                            $contact = $row["customer_contact"];
                            $country = $row["customer_country"];
                            $city = $row["customer_city"];
                            $address = $row["customer_address"];
                            $image = $row["customer_image"];
                            $id = $row["customer_id"];
                            echo '
                            <tr>
                            <td>'.$i.'</td>
                            <td>'.$name.'</td>
                            <td><img src="../images/customer-images/'.$image.'" style="width: 60px; height: 60px;" alt=""></td>
                            <td>'.$email.'</td>
                            <td>'.$country.'</td>
                            <td>'.$city.'</td>
                            <td>'.$address.'</td>
                            <td>'.$contact.'</td>
        
                            <td><a href="delete_customer.php?delete_customer='.$id.'" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</a></td>
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