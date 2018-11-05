<div id="homepage">
 <form action="admin/backend_logic.php" method="POST">
  <p class="attnd_hd"><b>Attendance Log</b>
  <label id="date_today_label">Date:</label>
  <input type="date" name="date_today" class="Afield" id="date_today"/>
  <input type="submit" name="view_attnd" id="view_attnd" value="View All"/></p><br/><br/>
   <table class="attnd_table">
     <tr>
       <th>Sr. No. </th>
	     <th>Name</th>
	     <th>Mark</th>
	     <th>Time In</th>
       <th>Time Out</th>
     </tr>
      <?php
          include_once "dbh.inc.php";
          $sql1 = "SELECT user_id, user_name FROM users";
          $result1 = mysqli_query($conn, $sql1);
          $resultcheck = mysqli_num_rows($result1);
          if ($resultcheck < 1)
          {
             echo "<p>No Users</p>";
          }
          else
          {
             $serialno=1;
             $count = 0;
             while ($row = mysqli_fetch_assoc($result1))
             {
      ?>        
                <tr class="user_rows">
                  <td class="id" ><?php echo $serialno; ?>
                      <input type="hidden" value="<?php echo $row['user_id']; ?>" name="user_id[]"/>
                  </td>
                  <td class='user_name'><?php echo $row['user_name']; ?>
                     <input type="hidden" value="<?php echo $row['user_name']; ?>" name="user_name[]"/>
                  </td>
                  <td>
                     <input type='radio' class='attnd_field' name='mark[<?php echo $count; ?>]' value='present'> Present
                     <input type='radio' class='attnd_field' name='mark[<?php echo $count; ?>]' value='absent'> Absent
                     <input type='radio' class='attnd_field' name='mark[<?php echo $count; ?>]' value='leave'> On Leave
                  </td>
                  <td><input class='Afield' type='time' id='from' name='from[<?php echo $count; ?>]'/></td>
                  <td><input class='Afield' type='time' id='to' name='to[<?php echo $count; ?>]'/></td>
                </tr>
      <?php
        $count++;
        $serialno++;  
             }
        }
          mysqli_close($conn);
      ?>
   </table>
   <br/>
   <br/>
   <br/>
   <br/>
   <input type="submit" class ="attnd_btn" id="attnd_btn1" name="attnd_btn" value="Save">
   <input type="reset" class ="attnd_btn" id="attnd_btn2" name="attnd_btn2" value="Reset"><br/><br/><br/>
 </form>
</div>

