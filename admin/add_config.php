<form class="client_form" action="admin/backend_logic.php" method="POST">
<p class="client_hd">Add Configuration Of Server and WorkStation</p><br/><br/>
  <table class="config_table">
     <tr>
        <td><label> Institute Name:</label></td>
        <td><input class="Afield" type="text" name="client_name" id="institute_name"/><p id="test"></p> </td>
     </tr>
     <tr>
        <td><label> Software:</label></td>
        <td><input type="radio" name="config_soft" id="config_alice" value="alice"> Alice
        <input type="radio" name="config_soft" id="config_liberty" value="liberty"> Liberty </td>
     </tr>
   </table> 
   <table class="config_details" id="alice_table">
     <tr>
        <td><label> Alice Installation Date:</label></td>
        <td><input class="Afield" type="date" name="installation_date" /> </td>
     </tr>
     <tr>
        <td><label> Alice Version:</label></td>
        <td><input class="Afield" type="text" name="version" /></td>
     </tr>
     <tr>
        <td><label> No. of Nodes:</label></td>
        <td><input class="Afield" type="number" name="nodes" /></td>
     </tr>
     <tr>
        <td><label> Window Operating System:</label></td>
        <td><input class="Afield" type="text" name="os" /></td>
     </tr>
     <tr>
        <td><label> System(Processor):</label></td>
        <td><input class="Afield" type="text" name="system" /></td>
     </tr>
     <tr>
        <td><label> Installed Memory(RAM):</label></td>
        <td><input class="Afield" type="text" name="memory" /></td>
     </tr>
     <tr>
        <td><label> Operating System Type(32/64 Bit):</label></td>
        <td><input class="Afield" type="text" name="os_type" /></td>
     </tr>
     <tr>
        <td><label> Computer Name:</label></td>
        <td><input class="Afield" type="text" name="cmp_name" /></td>
     </tr>
     <tr>
        <td><label> Full Computer Name:</label></td>
        <td><input class="Afield" type="text" name="full_cmp_name" /></td>
     </tr>
     <tr>
        <td><label> Domain(If Yes, Name):</label></td>
        <td><input class="Afield" type="text" name="domain" /></td>
     </tr>
     <tr>
        <td><label> Workgroup(If Yes, Name):</label></td>
        <td><input class="Afield" type="text" name="workgroup" /></td>
     </tr>
     <tr>
        <td><label> IP(Internal/External):</label></td>
        <td><input class="Afield" type="text" name="ip" /></td>
     </tr>
     <tr>
        <td><label> Web Server(IIS):</label></td>
        <td><input class="Afield" type="text" name="webserver" /></td>
     </tr>
     <tr>
        <td><label> URL WEB OPAC:</label></td>
        <td><input class="Afield" type="text" name="url_web_opac" /></td>
     </tr>
     <tr>
        <td><label> WEB OPAC Location:</label></td>
        <td><input class="Afield" type="text" name="opac_loc" /></td>
     </tr>
     <tr>
        <td><label> OASIS + Database Location:</label></td>
        <td><input class="Afield" type="text" name="db_loc" /></td>
     </tr>
   
   <tr><td><label style="font-size: 20px;font-weight: bold;"> Hard Disk Details</label></td></tr>
     <tr>
        <td><label> Drive Name Type:</label></td>
        <td><input class="Afield" type="text" name="drive_name_type" /></td>
     </tr>
     <tr>
        <td><label> Free Space:</label></td>
        <td><input class="Afield" type="text" name="free_space" /></td>
     </tr>
     <tr>
        <td><label> Total Space:</label></td>
        <td><input class="Afield" type="text" name="total_space" /></td>
     </tr>
  
   <tr><td><label style="font-size: 20px;font-weight: bold;"> No. of Work Stations</label></td></tr>      
      <tr>
        <td><label> Window Operating System:</label></td>
        <td><input class="Afield" type="text" name="client_os" /></td>
     </tr>
     <tr>
        <td><label> System(Processor):</label></td>
        <td><input class="Afield" type="text" name="client_system" /></td>
     </tr>
     <tr>
        <td><label> Installed Memory(RAM):</label></td>
        <td><input class="Afield" type="text" name="client_memory" /></td>
     </tr>
     <tr>
        <td><label> System Type:</label></td>
        <td><input class="Afield" type="text" name="client_system_type" /></td>
     </tr>
     <tr>
        <td><label> Remarks:</label></td>
        <td><input class="Afield" type="text" name="remarks" /></td>
     </tr>

   </table>
   <table class="config_table" id="liberty_table">
     <tr>
        <td><label> Liberty and SQL Server Installation Date:</label></td>
        <td><input class="Afield" type="date" name="l_installation_date" /> </td>
     </tr>
     <tr>
        <td><label> Liberty Version:</label></td>
        <td><input class="Afield" type="text" name="l_version" /></td>
     </tr>
     <tr>
        <td><label> Database:</label></td>
        <td><input class="Afield" type="text" name="db_name" /></td>
     </tr>
          <tr>
        <td><label> Window Operating System:</label></td>
        <td><input class="Afield" type="text" name="l_os" /></td>
     </tr>
     <tr>
        <td><label> System(Processor):</label></td>
        <td><input class="Afield" type="text" name="l_system" /></td>
     </tr>
     <tr>
        <td><label> Installed Memory(RAM):</label></td>
        <td><input class="Afield" type="text" name="l_memory" /></td>
     </tr>
     <tr>
        <td><label> Operating System Type(32/64 Bit):</label></td>
        <td><input class="Afield" type="text" name="l_os_type" /></td>
     </tr>
     <tr>
        <td><label> Hard Disk:</label></td>
        <td><input class="Afield" type="text" name="hard_disk" /></td>
     </tr>
     <tr>
        <td><label> Computer Name:</label></td>
        <td><input class="Afield" type="text" name="l_cmp_name" /></td>
     </tr>
     <tr>
        <td><label> Full Computer Name:</label></td>
        <td><input class="Afield" type="text" name="l_full_cmp_name" /></td>
     </tr>
     <tr>
        <td><label> Workgroup:</label></td>
        <td><input class="Afield" type="text" name="l_workgroup" /></td>
     </tr>
     <tr>
        <td><label> IP(Internal):</label></td>
        <td><input class="Afield" type="text" name="ip_int" /></td>
     </tr>
     <tr>
        <td><label> IP(External):</label></td>
        <td><input class="Afield" type="text" name="ip_ext" /></td>
     </tr>
     <tr>
        <td><label> Web Server:</label></td>
        <td><input class="Afield" type="text" name="lwebserver" /></td>
     </tr>
     <tr>
        <td><label> URL Report Server(Internal):</label></td>
        <td><input class="Afield" type="text" name="url_int" /></td>
     </tr>
     <tr>
        <td><label> URL Report Server(External):</label></td>
        <td><input class="Afield" type="text" name="url_ext" /></td>
     </tr>
     <tr>
        <td><label> URL Liberty(Internal):</label></td>
        <td><input class="Afield" type="text" name="l_url_int" /></td>
     </tr>
     <tr>
        <td><label> URL Liberty(External):</label></td>
        <td><input class="Afield" type="text" name="l_url_ext" /></td>
     </tr>
     <tr>
        <td><label> Database Location:</label></td>
        <td><input class="Afield" type="text" name="l_db_loc" /></td>
     </tr>
     <tr>
        <td><label> Liberty Server Location:</label></td>
        <td><input class="Afield" type="text" name="l_server_loc" /></td>
     </tr>
     <tr><td><label style="font-size: 20px;font-weight: bold;"> Hard Disk</label></td></tr>
     <tr>
        <td><label> C:/Fixed Drive:</label></td>
        <td><input class="Afield" type="text" name="c_used" placeholder="memory used" /></td>
        <td><input class="Afield" type="text" name="c_available" placeholder="memory available" /></td>
     </tr>
     <tr>
        <td><label> D:/Fixed Drive:</label></td>
        <td><input class="Afield" type="text" name="d_used" placeholder="memory used" /></td>
        <td><input class="Afield" type="text" name="d_available" placeholder="memory available" /></td>
     </tr>
   </table>
   <br/>
      <input type="submit" class="form_btn" id="form_btn1_10" name="submit_form10" value="Save">
      <input type="reset" class="form_btn" id="form_btn2_10" value="Reset">
</form>
   
    

