<form class="client_form" action="admin/invoice_logic.php" method="POST">
<div id="invoice_div">
    <input type="radio" name="invoice_type" id="performa" value="performa"> Generate Performa Invoice
    <input type="radio" name="invoice_type" id="invoice_r" value="invoice"> Generate Invoice
</div>
    <table id="p_invoice_table">
	     <tr>
	     	<td><label><b>Service Provider</b></label></td>
	     </tr>
	     <tr>
	     	<td><label>GSTIN:</label></td>
	     	<td><input type='text' class='invoice_field' name='gstin_p'/></td>
	     	<td><input type='submit' class='invoice_btn' id='generate_invoice' name='generate_invoice' value='Generate'/></td>
	     </tr>
	     <tr>
	     	<td><label>Name:</label></td>
	     	<td><input type='text' class='invoice_field' name='name_p'/></td>
	     </tr>
	     <tr>
	     	<td><label>Address:</label></td>
	     	<td><input type='text' class='invoice_field' name='addrs_p'/></td>
	     </tr>
	     <tr>
	     	<td><label>State:</label></td>
	     	<td><input type='text' class='invoice_field' name='state_p'/></td>
	     </tr>
	     <tr>
	     	<td><label>Invoive No:</label></td>
	     	<td><input type='text' class='invoice_field' name='invoice_p'/></td>
	     </tr>
	     <tr>
	     	<td><label>Date of Invoice:</label></td>
	     	<td><input type='date' class='invoice_field' name='doi_p'/></td>
	     </tr>
	     <tr>
	     	<td><label>Code:</label></td>
	     	<td><input type='text' class='invoice_field' name='code_p'/></td>
	     </tr>
	     <tr>
	     	<td><label><b>Server Reciever</b></label></td>
	     </tr>
	     <tr>
	     	<td><label>GSTIN:</label></td>
	     	<td><input type='text' class='invoice_field' name='gstin_r'/></td>
	     </tr>
	     <tr>
	     	<td><label>Name:</label></td>
	     	<td><input type='text' class='invoice_field' name='name_r'/></td>
	     </tr>	     
	     <tr>
	     	<td><label>Address:</label></td>
	     	<td><input type='text' class='invoice_field' name='addrs_r'/></td>
	     </tr>
	     <tr>
	     	<td><label>State:</label></td>
	     	<td><input type='text' class='invoice_field' name='state_r'/></td>
	     </tr>
	     <tr>
	     	<td><label>Code:</label></td>
	     	<td><input type='text' class='invoice_field' name='code_r'/></td>
	     </tr>
	     <tr>
	     	<td><label><b>Services</b></label></td>
	     </tr>
	     <tr>
	     	<td><label>Description of Services:</label></td>
	     	<td></td>
	     </tr>
	     <tr>
	     	<td><label> Service No. 1:</label></td>
	     	<td><input type='text' class='invoice_field' name='desc1' placeholder="description"/></td>
	     	<td><input type='text' class='invoice_field' name='sac1' placeholder="SAC"/></td>
	     	<td><input type='text' class='invoice_field' name='amount1' placeholder="amount"/></td>
	     </tr>
	     <tr>
	     	<td><label> Service No. 2:</label></td>
	     	<td><input type='text' class='invoice_field' name='desc2' placeholder="description" /></td>
	     	<td><input type='text' class='invoice_field' name='sac2' placeholder="SAC"/></td>
	     	<td><input type='text' class='invoice_field' name='amount2' placeholder="amount"/></td>
	     </tr>
	     <tr>
	     	<td><label> Service No. 3:</label></td>
	     	<td><input type='text' class='invoice_field' name='desc3' placeholder="description" /></td>
	     	<td><input type='text' class='invoice_field' name='sac3' placeholder="SAC"/></td>
	     	<td><input type='text' class='invoice_field' name='amount3' placeholder="amount"/></td>
	     </tr>
	     <tr>
	     	<td><label> Service No. 4:</label></td>
	     	<td><input type='text' class='invoice_field' name='desc4' placeholder="description" /></td>
	     	<td><input type='text' class='invoice_field' name='sac4' placeholder="SAC"/></td>
	     	<td><input type='text' class='invoice_field' name='amount4' placeholder="amount"/></td>
	     </tr>
	     <tr>
	     	<td><label>Total Amount:</label></td>
	     	<td><input type='text' class='invoice_field' name='t_amount'/></td>
	     </tr>
	     <tr>
	     	<td><label>IGST @ 18%:</label></td>
	     	<td><input type='text' class='invoice_field' name='igst'/></td>
	     </tr>
	     <tr>
	     	<td><label>Total Invoice Value:</label></td>
	     	<td><input type='text' class='invoice_field' name='t_invoice_value'/></td>
	     </tr>
	     <tr>
	     <td><label>GST on Reverse Charge:</label></td>
	     	<td><input type='text' class='invoice_field' name='reverse_charge'/></td>
	     </tr>
    </table>
</form>
  