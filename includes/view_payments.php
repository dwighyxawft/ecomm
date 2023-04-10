<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / View Payments
            </li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fa fa-fw fa-money"></i> View Payments</h3>
            </div>
            <div class="card-body">
                <table class="table table-responsive table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                           <th>No: </th>
                           <th>Invoice No</th>
                           <th>Amount Paid </th>
                           <th>Method </th>
                           <th>Reference No</th>
                           <th>Payment Code</th>
                           <th>Payment Date</th>
                           <th>Delete Payment</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $get_p_cat = "SELECT * FROM payments";
                        $run_p_cat = mysqli_query($conn, $get_p_cat);
                        while($row = mysqli_fetch_array($run_p_cat)){
                            $id = $row["payment_id"];
                            $invoice = $row["invoice_no"];
                            $amount = $row["amount"];
                            $mode = $row["payment_mode"];
                            $ref_no = $row["ref_no"];
                            $code = $row["code"];
                            $date = $row["payment_date"];

                           
                          



                            echo '
                            <tr>
                            <td>'.$i.'</td>
                            <td>'.$invoice.'</td>
                            <td>'.$amount.'</td>
                            <td>'.$mode.'</td>
                            <td>'.$ref_no.'</td>
                            <td>'.$code.'</td>
                            <td>'.$date.'</td>
                         
        
                            <td><a href="delete_payment.php?delete_payment='.$id.'" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</a></td>
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