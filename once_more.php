<?php  
 $connect = mysqli_connect("localhost", "root", "", "autodc_table_1");  

 /*
 if(isset($_POST["submit"]))  
 {  
      if(!empty($_POST["search"]))  
      {  
           $query = str_replace(" ", "+", $_POST["search"]);  
           header("location:once_more.php?search=" . $query);  
          }  
     }  */
     
     
     //submit button search

     /*
 if(isset($_POST['submit'])){
     $Li_Country=$_POST['Li_Country'];
     $Li_Local_Insurer_Code=$_POST['Li_Local_Insurer_Code'];
     $Vira_Ptf_Currency=$_POST['Vira_Ptf_Currency'];
     $Vira_Balance_Year_Ptf=$_POST['Vira_Balance_Year_Ptf'];
     $Vira_Portfolio_Quarter=$_POST['Vira_Portfolio_Quarter'];
     $Vira_Ptf_Currency_Code=$_POST['Vira_Ptf_Currency_Code'];

     

 }*/
 ?>
<!DOCTYPE html>
<html>

<head>
     <title>Initiate Request</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
     <style>table, th, td {
  border: 1px solid;
  padding: 15px;
},
label{
     padding: 5px; 
     margin:auto;
},
select{
     display: inline;
}
</style>

</head>

<body>
     <br /><br />
     <div class="container" style="width:500px;">
          <h2 align="center">Initiate Request</h2><br>
          
          
          
          <form method="post" style="padding: 15px;"  onsubmit="event.preventDefault();onFormSubmit();" autocomplete="off">


               <?php // start code for dropdown ?>

               <label>Select Country</label>
               <select name="Li_Country" id="Li_Country" style="padding: 7px;">
                    <option value=' ' selected="selected">Select</option>
                    <?Php
                    // Database connection
                    //$country =$_POST['country'];
                    //$sql="SELECT DISTINCT Li_Country FROM autodc_table_1 where country='".$country."' ORDER BY Li_Country";
                    $sql="SELECT DISTINCT Li_Country FROM autodc_table_1 ORDER BY Li_Country";
                    foreach($connect-> query($sql) as $row){
                         echo "<option value=$row[Li_Country]>$row[Li_Country]</option>";
                    }
                    ?>
               </select>
               <br>
               <br>
                       <?php //close code for dropdown ?>


               <?php // local code for dropdown ?>


               <label>Li Local Insurer Code:</label>

               <select name="Li_Local_Insurer_Code" id="Li_Local_Insurer_Code" style="padding: 7px;">
                    <option value=' ' selected>Select</option>
                    <?Php
                    // Database connection
                    $sql="SELECT DISTINCT Li_Local_Insurer_Code FROM autodc_table_1 WHERE Li_Local_Insurer_Code   ORDER BY Li_Local_Insurer_Code";
                    foreach($connect-> query($sql) as $row){
                         echo "<option value=$row[Li_Local_Insurer_Code]>$row[Li_Local_Insurer_Code]</option>";
                    }
                    ?>
               </select>
               <br>
               <br>

               <label>Vira Ptf Currency:</label>

               <select name="Vira_Ptf_Currency" id="Vira_Ptf_Currency" style="padding: 7px;">
                    <option value=' ' selected>Select</option>
                    <?Php
                    // Database connection
                    $sql="SELECT DISTINCT Vira_Ptf_Currency FROM autodc_table_1 ORDER BY Vira_Ptf_Currency";
                    foreach($connect-> query($sql) as $row){
                         echo "<option value=$row[Vira_Ptf_Currency]>$row[Vira_Ptf_Currency]</option>";
                    }
                    ?>
               </select>
               <br>
               <br>

               <label>Vira Balance Year Ptf:</label>

               <select name="Vira_Balance_Year_Ptf" id="Vira_Balance_Year_Ptf" style="padding: 7px;">
                    <option value=' ' selected>Select</option>
                    <?Php
                    // Database connection
                    $sql="SELECT DISTINCT Vira_Balance_Year_Ptf FROM autodc_table_1 ORDER BY Vira_Balance_Year_Ptf";
                    foreach($connect-> query($sql) as $row){
                         echo "<option value=$row[Vira_Balance_Year_Ptf]>$row[Vira_Balance_Year_Ptf]</option>";
                    }
                    ?>
               </select>
               <br>
               <br>

               <label>Vira Portfolio Quarter:</label>

               <select name="Vira_Portfolio_Quarter" id="Vira_Portfolio_Quarter" style="padding: 7px;">
                    <option value=' ' selected>Select</option>
                    <?Php
                    // Database connection
                    $sql="SELECT DISTINCT Vira_Portfolio_Quarter FROM autodc_table_1 ORDER BY Vira_Portfolio_Quarter";
                    foreach($connect-> query($sql) as $row){
                         echo "<option value=$row[Vira_Portfolio_Quarter]>$row[Vira_Portfolio_Quarter]</option>";
                    }
                    ?>
               </select>
               <br>
               <br>

               <label>Settlement Currency</label>

               <select name="Vira_Ptf_Currency_Code" id="Vira_Ptf_Currency_Code" style="padding: 7px;">
                    <option value=' ' selected>Select</option>
                    <?Php
                    // Database connection
                    $sql="SELECT DISTINCT Vira_Ptf_Currency_Code FROM autodc_table_1 ORDER BY Vira_Ptf_Currency_Code";
                    foreach($connect-> query($sql) as $row){
                         echo "<option value=$row[Vira_Ptf_Currency_Code]>$row[Vira_Ptf_Currency_Code]</option>";
                    }
                    ?>
               </select>
               <br>
               <br>

               <?php //close code for dropdown ?>











               <br>
               <div class="form-action-buttons">

                        <input type="submit" name="submit" class="btn btn-info" value="Submit"  />
                    </div>
         
         
         
          </form>
          <br /><br />
          <div class="table-responsive">
               <table class="table table-bordered">
                    <?php  
                     if(isset($_GET["search"]))  
                     {  
                          $condition = '';  
                          $query = explode(" ", $_GET["search"]);  
                          foreach($query as $text)  
                          {  
                               $condition .= "Li_Country LIKE '%".mysqli_real_escape_string($connect, $text)."%' OR ";  
                          }  
                          $condition = substr($condition, 0, -4);  
                          $sql_query = "SELECT * FROM autodc_table_1 WHERE " . $condition;  
                          $result = mysqli_query($connect, $sql_query);  
                          if(mysqli_num_rows($result) > 0)  
                          {  
                               while($row = mysqli_fetch_array($result))  
                               {  
                                    echo '<tr><td>'.$row["Li_Country"].'</td></tr>';  
                               }  
                          }  
                          else  
                          {  
                               echo '<label>Data not Found</label>';  
                          }  
                     }  

                     
                     ?>
               </table>
          </div>
     </div>

                     <hr>
     <h2 align="center">Initiate Request</h2><br /><br />

     <table style="margin-left: auto;margin-right: auto;"   id="record" class="list">
          <thead>
               <tr>

                    <th>Li_Country</th>
                    <th>Li_Local_Insurer_Code</th>
                    <th>Vira_Ptf_Currency</th>
                    <th>Vira_Balance_Year_Ptf</th>
                    <th>Vira_Portfolio_Quarter</th>
                    <th>Vira_Ptf_Currency_Code</th>


               </tr>
          </thead>
          <tbody>

          </tbody>
     </table>
     <br>
     <br>
     <hr>


<Script>
     $("#Li_Country").change(function(){
          var country = this.value;
          $.ajax({
               url:"once_more.php",
               type:"POST",
               data:{
                    country:country
               },
               cache:false,
               succcess:function(result){
                    $("#Li_Local_Insurer_Code").html(result);
               }

          });  
     });
</script>


 <script>
     function onFormSubmit(){
          var formData = readFormData();
          insertNewRecord(formData);
     }
     
     function readFormData() {
          
          var formData = {};
          formData["Li_Country"] =document.getElementById("Li_Country").value;
          formData["Li_Local_Insurer_Code"] =document.getElementById("Li_Local_Insurer_Code").value;
          formData["Vira_Ptf_Currency"] =document.getElementById("Vira_Ptf_Currency").value;
          formData["Vira_Balance_Year_Ptf"] =document.getElementById("Vira_Balance_Year_Ptf").value;
          formData["Vira_Portfolio_Quarter"] =document.getElementById("Vira_Portfolio_Quarter").value;
          formData["Vira_Ptf_Currency_Code"] =document.getElementById("Vira_Ptf_Currency_Code").value;
          return formData;
     }
     
     function insertNewRecord(data){
          var table = document.getElementById("record").getElementsByTagName('tbody')[0];
          var newRow = table.insertRow(table.length);
          cell1=newRow.insertCell(0);
          cell1.insertHTML =data.Li_Country;
          cell2=newRow.insertCell(1);
          cell2.insertHTML =data.Li_Local_Insurer_Code;
          cell3=newRow.insertCell(2);
          cell3.insertHTML =data.Vira_Ptf_Currency;
          cell4=newRow.insertCell(3);
          cell4.insertHTML =data.Vira_Balance_Year_Ptf;
          cell5=newRow.insertCell(4);
          cell5.insertHTML =data.Vira_Portfolio_Quarter;
          cell6=newRow.insertCell(5);
          cell6.insertHTML =data.Vira_Ptf_Currency_Code;
     }
     
 </script>

 </body >  
 </html >  
