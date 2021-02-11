<?php
    if(isset($_GET['id'])){
       $id = $_GET['id'];

       require_once "DataHandler.php";
       $handler = new DataHandler();
       $handler->createDBConnection();

       $query= "SELECT health_records.id AS recordId, users.username, gender, height,
        weight, temp_reading, code, code_desc, health_records.visit_date
        AS record_date FROM health_records INNER JOIN patients, users 
        WHERE health_records.username = users.username 
        AND health_records.patient_id = patients.Id AND health_records.patient_id = $id order by record_date desc";

        $result = $handler->getDataQuery($query);
        
        while($row = mysqli_fetch_assoc($result)){
            $visit_date = $row['record_date'];
            ?>
            <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                        <div class="timeline-arrow"></div>
                        
                        <h2 class="h5 mb-0">
                        <span class="text-gray">
                        <i class="fa fa-clock-o mr-1"></i> 
                        <?php 
                         echo date("D, d M Y H:i A", strtotime($visit_date)) 
                        
                        ?></span>
                        </h2>
                       
                        <div class="card m-2">
                            <div class="card-header">
                                 Vital Signs
                            </div>
                            <div class="card-body">
                                <table class="table table-success table-striped">
                                    <thead>
                                        <tr> 
                                            <th> Weight (Kgs)</th>
                                            <th> Height (Meters)</th>
                                            <th>Temperature <span>&#8451</span> </th>
                                        </tr>
                                    </thead>
                                 <tbody>
                                     <tr>
                                  
                                    <td> <?php echo $row['weight']; ?> </td>
                                    <td> <?php echo $row['height']; ?>  </td>
                                    <td> <?php echo $row['temp_reading'];?></td>
                                  
                                     </tr>
                                 </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card m-2">
                            <div class="card-header">
                                Diagnosis results
                            </div>
                            <div class="card-body">
                                <?php echo $row['code_desc'];?>
                            </div>
                            <a class="btn btn-primary" href="https://www.icd10data.com/ICD10CM/Codes/<?php $row['code']?>" target="blank">More diagnosis details</a>
                        </div>
                  </li>
            <?php
        }
         

        
    }




?>