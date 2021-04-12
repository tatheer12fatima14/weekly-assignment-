<!DOCTYPE HTML>
<head></head>
<body>
<?php 
      $conn= mysqli_connect('localhost' , 'root' , '' , 'tatheer_employee');
    if(isset($_POST['submit'])){
        $sql_query = "INSERT INTO table_employee( employee_number, employee_name , salary) VALUES('$_POST[num]' , '$_POST[names]' , '$_POST[salary]')";
        $query = mysqli_query($conn , $sql_query);                                                                                                 
    }
?>




                  <form method="POST">

                    <label>employee no</label>
                    <input type="number" name="num" style="margin-bottom:7px;">
                    
                    </br>

                    <label>employee name</label>
                    <input type="text" name="names" style="margin-bottom:7px;">
                    
                    </br>
                    
                    <label>salary</label>
                    <input type="number" name="salary" style="margin-bottom:7px;">
                    
                      </br>
                    
                    <input type="submit" value="Add" name="submit">

                  </form>

                          <?php 
                          
                          if(isset($_POST['submit'])){?> 

                                <form method="POST" style="margin-left:300px;">

                                    <input type="text" name="field" style="width:85px; margin-top:13px; margin-bottom:6px; padding:2px; margin-right:6px; ">

                                    <input type="submit" value="search" name="search" style="width:50px; padding:0px; height:25px; margin-top:11px;">
                                </form>


                                <table style="background-color:yellow; border:2px solid black; width:500px;">
                                    <tr>
                                        <td style="border:2px solid black;">
                                              employee number
                                        </td>
                                        <td style="border:2px solid black;">
                                              employee name
                                        </td>
                                        <td style="border:2px solid black;">
                                              salary
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                              <?php 

                                                  $sql_query1 = "SELECT employee_number FROM table_employee";       
                                                  $query1 = mysqli_query($conn , $sql_query1);
                                                  while($fetch_array = mysqli_fetch_array($query1)){
                                                      echo $fetch_array['employee_number'] . "</br>";
                                                  }
 
                          }
                                              ?>
                                        </td>
                                        
                                        <td>
                                              <?php  
                                                  if(isset($_POST['submit'])){
                                                      $sql_query2 = "SELECT employee_name FROM table_employee";                                                                                                                                                  
                                                      $query2 = mysqli_query($conn , $sql_query2);
                                                      while($fetch_array = mysqli_fetch_array($query2)){
                                                            echo $fetch_array['employee_name'] . "</br>";
                                                      }
                                                  }
                                              ?>
                                        </td>
                                        
                                        <td>
                                              <?php  
                                                  if(isset($_POST['submit'])){
                                                      $sql_query3 = "SELECT salary FROM table_employee";       
                                                      $query3 = mysqli_query($conn , $sql_query3);
                                                      while($fetch_array = mysqli_fetch_array($query3)){
                                                            echo $fetch_array['salary'] . "</br>";
                                                      }
    
                                                  }
                                              ?>
                                        </td>
                                    </tr>

                                </table>



<!--search -->
        <?php 

          $conn= mysqli_connect('localhost' , 'root' , '' , 'tatheer_employee');
              if(isset($_POST['search'])){
                $search = $_POST['field'];
 
        ?>
            <table style="background-color:yellow; border:2px solid black; width:500px; margin-top:2px;">
                  <tr>
                      <td style="border:2px solid black;">
                            employee number
                      </td>
                      <td style="border:2px solid black;">
                            employee name
                      </td>
                      <td style="border:2px solid black;">
                            salary
                      </td>
                  </tr>
  
                  <tr>
                      <td>
                          <?php 
                                $sqls = "SELECT * from table_employee where employee_name like '%$search%' OR employee_number like '%$search%' OR salary like '%$search%'";
                                        $result = $conn->query($sqls);
                                            if ($result->num_rows > 0){
                                              while($fetch_assoc = $result->fetch_assoc() ){
                                                echo $fetch_assoc["employee_number"] . "</br>";
                                              }
                                            }
                                          //}
                          ?>
                      </td>

                      <td>
                          <?php 
                                //$conn= mysqli_connect('localhost' , 'root' , '' , 'tatheer_employee');
                                //if(isset($_POST['search'])){
                                //$search = $_POST['field'];
                                $sqls = "SELECT * from table_employee where employee_name like '%$search%' OR employee_number like '%$search%' OR salary like '%$search%'";
                                $result = $conn->query($sqls);
                          
                                if ($result->num_rows > 0){
                                  while($fetch_assoc = $result->fetch_assoc() ){
                                    echo $fetch_assoc["employee_name"] . "<br>"; 
                                  }
                                }
                                // }
                          ?>
                      </td>
                      
                      <td>
                          <?php 
                                //$conn= mysqli_connect('localhost' , 'root' , '' , 'tatheer_employee');
                                //if(isset($_POST['search'])){
                                //$search = $_POST['field'];
                                $sqls = "SELECT * from table_employee where employee_name like '%$search%' OR employee_number like '%$search%' OR salary like '%$search%'";
                                $result = $conn->query($sqls);
                                if ($result->num_rows > 0){
                                    while($fetch_assoc = $result->fetch_assoc() ){
                                        echo $fetch_assoc['salary'] ."<br>";
                                    }
                                //}
                                }
                                else{
                                  if($fetch_assoc = !$result->fetch_assoc() ){
                                    echo "no results found";
                                  }
                                }
                          ?>
                      </td>
                  </tr>
                  
                  <form method="POST" >
                        <input type="text" name="field" style="width:85px; margin-top:13px; margin-bottom:6px; padding:2px; margin-right:6px; margin-left:300px; ">
                        <input type="submit" value="search" name="search" style="width:50px; padding:0px; height:25px; margin-top:11px;">
                  </form>
                          <?php 
              }
                        ?>
             </table>
</body>


</HTML>



<!--
// var_dump("$_POST[names]" , "$_POST[num]");  
   //$sql_query1 = "SELECT * FROM table_employee";       
 //  $query1 = mysqli_query($conn , $sql_query1);
   //echo "<pre>";    
 //  var_dump(mysqli_fetch_all($query1));  





// $sql_query1 = "SELECT employee_number FROM table_employee";                                                    
  //$query1 = mysqli_query($conn , $sql_query1);
//  echo "<pre>";    
  //print_r(mysqli_fetch_all($query1));




/*
  $sql_query2 = "SELECT employee_name FROM table_employee";       
  $query2 = mysqli_query($conn , $sql_query2);
  echo "<pre>";    
  print_r(mysqli_fetch_all($query2));*/




/*
  $sql_query3 = "SELECT salary FROM table_employee";       
  $query3 = mysqli_query($conn , $sql_query3);
  echo "<pre>";    
  print_r(mysqli_fetch_all($query3));*/