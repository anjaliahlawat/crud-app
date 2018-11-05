<div>
   <h1 id="bank_details">Softlink Asia Pvt. Ltd. Bank Details</h1><br/>
   <form action="admin/backend_logic.php" method="POST">
   <table id="bank_details3">
   <?php
       include_once "dbh.inc.php";
       $sql = "SELECT * FROM bank_details";
       if (mysqli_query($conn, $sql))
       {

           $result = mysqli_query($conn, $sql);
           $resultcheck = mysqli_num_rows($result);
           if ($resultcheck < 1)
           {
               echo "<p>No details is available!</p>";
               echo "<a href='#'>Add Now!</a>";
               
           }
           else
           {
           	   $row = mysqli_fetch_assoc($result);

           	   echo "<tr>";
      	       echo "<td>Account name:</td>";
      	       echo "<td><input type='text' class='bank_text_fields' name='account_name' value=".$row['account_name']." readonly/></td>";
               echo "<td><input type='button' class='bank_details_btn' id='edit_bank_details' value='Edit'/><input type='submit' class='bank_details_btn' id='save_bank_details' name='save_bank_details' value='Save'/></td>";
      	       echo "</tr>";
      	       echo "<tr>";
      	       echo "<td>Current Account number:</td>";
      	       echo "<td><input type='text' class='bank_text_fields' name='curr_acc_no' value=".$row['curr_acc_no']." readonly/></td>";
               echo "<td><input type='submit' class='bank_details_btn' name='downloadpdf' id='downloadpdf' value='Download as PDF'/></td>";
      	       echo "</tr>";
               echo "<tr>";
      	       echo "<td>Bank name:</td>";
      	       echo "<td><input type='text' class='bank_text_fields' name='bank_name' value=".$row['bank_name']." readonly/></td>";
      	       echo "</tr>";
      	       echo "<tr>";
      	       echo "<td>Bank address:</td>";
      	       echo "<td><input type='text' class='bank_text_fields' name='bank_addrs' value=".$row['bank_addrs']." readonly/></td>";
      	       echo "</tr>";
      	       echo "<tr>";
      	       echo "<td>Country:</td>";
      	       echo "<td><input type='text' class='bank_text_fields' name='country' value=".$row['country']." readonly/></td>";
      	       echo "</tr>";
      	       echo "<tr>";
      	       echo "<td>RTGS/NEFT/IFSC CODE:</td>";
      	       echo "<td><input type='text' class='bank_text_fields' name='ifsc_code' value=".$row['ifsc_code']." readonly/></td>";
      	       echo "</tr>";
      	       echo "<tr>";
      	       echo "<td>SWIFT Code/ID:</td>";
      	       echo "<td><input type='text' class='bank_text_fields' name='swift_code' value=".$row['swift_code']." readonly/></td>";
      	       echo "</tr>";
      	       echo "<tr>";
      	       echo "<td>MICR Code:</td>";
      	       echo "<td><input type='text' class='bank_text_fields' name='micr_code' value=".$row['micr_code']." readonly/></td>";
      	       echo "</tr>";
      	       echo "<tr>";
      	       echo "<td>Branch Code:</td>";
      	       echo "<td><input type='text' class='bank_text_fields' name='branch_code' value=".$row['branch_code']." readonly/></td>";
      	       echo "</tr>";
      	       echo "<tr>";
      	       echo "<td>Tan:</td>";
      	       echo "<td><input type='text' class='bank_text_fields' name='tan' value=".$row['tan']." readonly/></td>";
      	       echo "</tr>";
      	       echo "<tr>";
      	       echo "<td>PAN:</td>";
      	       echo "<td><input type='text' class='bank_text_fields' name='pan' value=".$row['pan']." readonly/></td>";
      	       echo "</tr>";
      	       echo "<tr>";
      	       echo "<td>GSTIN:</td>";
      	       echo "<td><input type='text' class='bank_text_fields' name='gstin' value=".$row['gstin']." readonly/></td>";
      	       echo "</tr>";
      	       echo "<tr>";
      	       echo "<td>TIN no.:</td>";
      	       echo "<td><input type='text' class='bank_text_fields' name='tin_no' value=".$row['tin_no']." readonly/></td>";
      	       echo "</tr>";
      	       echo "<tr>";
      	       echo "<td>CIN:</td>";
      	       echo "<td><input type='text' class='bank_text_fields' name='cin' value=".$row['cin']." readonly/></td>";
      	       echo "</tr>";
      	       echo "<tr>";
      	       echo "<td>Date of Effect:</td>";
      	       echo "<td><input type='date' class='bank_text_fields' name='date_of_effect' value=".$row['date_of_effect']." readonly/></td>";
      	       echo "</tr>";
           }
       }
       else
       {
   	       echo "Error: " . $sql_in . "<br>" . mysqli_error($conn);
       }
   ?>
   </table>
   </form>
   </div>
