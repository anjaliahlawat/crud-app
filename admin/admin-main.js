
$(document).ready(function(){
    //add module page
      $("#alice").click(function(){
         $("#mod_alice").css("display", "block");
         $("#mod_liberty").css("display", "none");
      });
      
      $("#liberty").click(function(){
         $("#mod_liberty").css("display", "block");
         $("#mod_alice").css("display", "none");
      }); 
     
     // add client page
      $("#ds_yes").click(function(){
   	     $(".ds_class").css("display", "block"); 
      }); 

      $("#excel").click(function(){
      	 $("#excel_files").css("display", "block");
      });

      $("#afw").click(function(){
      	 $("#excel_files").css("display", "none");
      });

      $("#ds_no").click(function(){
   	     $(".ds_class").css("display", "none"); 
           $("#excel_files").css("display", "none");
      }); 

      $("#de_yes").click(function(){
      	 $(".de_class").css("display", "block"); 
      });

      $("#de_no").click(function(){
   	     $(".de_class").css("display", "none"); 
      }); 

      // add contact details page
      $("#b2").click(function(){
           $(".def_page").css("display", "none");
      });
      $("#add_more").click(function(){
           $("#add2").css("display", "block");
           $("#add_more").css("display", "none");
      });
      $("#add_more2").click(function(){
           $("#add3").css("display", "block");
           $("#add_more2").css("display", "none");
           $("#cancel2").css("display", "none");
      });
      
      $("#cancel2").click(function(){
          $("#add2").css("display", "none");
          $("#add_more").css("display", "block");
      });

      $("#cancel3").click(function(){
          $("#add3").css("display", "none");
          $("#add_more2").css("display", "block");
          $("#cancel2").css("display", "block");
      });

      //view client details page

      $("select.view_select").change(function(){
        let selectedtype = $("#view2").val(); 
        
        if (selectedtype =='clients')
        {
           $("#show_clients").css("display", "block");
           $("#show_products").css("display", "none");
           $("#show_suppliers").css("display", "none");
           $("#show_bd_details").css("display", "none");
        }
        else if(selectedtype =='products')
        {
           $("#show_products").css("display", "block");
           $("#show_clients").css("display", "none");
           $("#show_suppliers").css("display", "none");
           $("#show_bd_details").css("display", "none");
        }
        else if(selectedtype=='suppliers')
        {
           $("#show_suppliers").css("display", "block");
           $("#show_clients").css("display", "none");
           $("#show_products").css("display", "none");
           $("#show_bd_details").css("display", "none");
        }
        else if(selectedtype=='bd_details')
        {
           $("#show_bd_details").css("display", "block");
           $("#show_suppliers").css("display", "none");
           $("#show_clients").css("display", "none");
           $("#show_products").css("display", "none");
        }
      }); 

      //bank details page
      $("#edit_bank_details").click(function()
      {
          $(".bank_text_fields").attr("readonly", false);
          $("#save_bank_details").css("display", "block");
          $("#edit_bank_details").css("display", "none");
          $("#downloadpdf").css("display", "none");
      });
      $("#save_bank_details").click(function()
      {
          $(".bank_text_fields").attr("readonly", true);
          $("#save_bank_details").css("display", "none");
          $("#edit_bank_details").css("display", "block");
          $("#downloadpdf").css("display", "block");
      });
       
      //config of software details page
      $("#config_alice").click(function()
      {
          $("#alice_table").css("display", "block");
          $("#liberty_table").css("display", "none");
          
      });
      $("#config_liberty").click(function()
      {
          $("#alice_table").css("display", "none");
          $("#liberty_table").css("display", "block");
      
      });

      //performa-invoice 
      $("#performa").click(function()
      {
          $("#p_invoice_table").css("display", "block");
          $("#invoice_table").css("display", "none");
      });
      $("#invoice").click(function()
      {
          $("#p_invoice_table").css("display", "none");
          $("#invoice_table").css("display", "block");
      });

      // view modules details
      $("#view_full_details1").click(function()
      {
          $("#show_clients").css("display", "none");
          $("#view1").css("display", "none");
          $("#view2").css("display", "none");
      });
      $("select.btn_for_table").change(function(){
        let selectedtype1 = $( "#table_choice" ).val(); 
        
        if (selectedtype1 =='modules')
        {
           $("#mod_table").css("display", "block");
           $("#amc_table").css("display", "none");
           $("#rec_table").css("display", "none");
           $("#config_table").css("display", "none");
           $("#con_table").css("display", "none");
           $("#de_table").css("display", "none");
           $("#ds_table").css("display", "none");
           $("#show_full_details").css("display", "none");
        }
        else if(selectedtype1 =='amc')
        {
           $("#mod_table").css("display", "none");
           $("#amc_table").css("display", "block");
           $("#rec_table").css("display", "none");
           $("#config_table").css("display", "none");
           $("#con_table").css("display", "none");
           $("#de_table").css("display", "none");
           $("#ds_table").css("display", "none");
           $("#show_full_details").css("display", "none"); 
        }
        else if(selectedtype1 =='records')
        {
           $("#rec_table").css("display", "block");
           $("#mod_table").css("display", "none");
           $("#amc_table").css("display", "none");
           $("#config_table").css("display", "none");
           $("#con_table").css("display", "none");
           $("#de_table").css("display", "none");
           $("#ds_table").css("display", "none");
           $("#show_full_details").css("display", "none"); 
        }
        else if(selectedtype1 =='config')
        {
           $("#config_table").css("display", "block");
           $("#rec_table").css("display", "none");
           $("#mod_table").css("display", "none");
           $("#amc_table").css("display", "none");
           $("#con_table").css("display", "none");
           $("#de_table").css("display", "none");
           $("#ds_table").css("display", "none");
           $("#show_full_details").css("display", "none"); 
        }
        else if(selectedtype1 =='contact')
        {
           $("#con_table").css("display", "block");
           $("#config_table").css("display", "none");
           $("#rec_table").css("display", "none");
           $("#mod_table").css("display", "none");
           $("#amc_table").css("display", "none");
           $("#de_table").css("display", "none");
           $("#ds_table").css("display", "none");
           $("#show_full_details").css("display", "none"); 
        }
        else if(selectedtype1 =='ds')
        {
           $("#ds_table").css("display", "block");
           $("#de_table").css("display", "none");
           $("#con_table").css("display", "none");
           $("#config_table").css("display", "none");
           $("#rec_table").css("display", "none");
           $("#mod_table").css("display", "none");
           $("#amc_table").css("display", "none");
           $("#show_full_details").css("display", "none"); 
        }
        else if(selectedtype1 =='de')
        {
           $("#de_table").css("display", "block");
           $("#ds_table").css("display", "none");
           $("#con_table").css("display", "none");
           $("#config_table").css("display", "none");
           $("#rec_table").css("display", "none");
           $("#mod_table").css("display", "none");
           $("#amc_table").css("display", "none");
           $("#show_full_details").css("display", "none"); 
        }
      });
      $("#main_table_btn_edit").click(function()
      {
          $("#main_table_btn_save").css("display", "block");
          $("#main_table_btn_del").css("display", "none");
          $("#main_table_btn_edit").css("display", "none");
          $(".main_table_textfields").attr("readonly", false);
      });  
       $("#config_table_btn_edit").click(function()
      {
          $(".config_table_textfields").attr("readonly", false);
          $("#config_table_btn_edit").css("display", "none");
          $("#config_table_btn_save").css("display", "block");
      });
      $("#ds_table_btn_add").click(function()
      {
         $(".ds_tr").css("display", "block");
         $("#ds_table_btn_add").css("display", "none");
         $("#error_msg").css("display", "none");
      });
  });

//view for clients, products and suppliers
function myFunction() {
  // Declare variables
  var input, filter, table, selectedtype, tr, td, i;
  selectedtype = document.getElementById("view2");
  input = document.getElementById("view1");
  filter = input.value.toUpperCase();
  if ( selectedtype.value =='clients')
  {
     table = document.getElementById("show_clients");
  }
     
  else if(selectedtype.value =='products')
  {
     table = document.getElementById("show_products");
  }
  else if(selectedtype.value =='suppliers')
  {
     table = document.getElementById("show_suppliers");
  }
  else if(selectedtype.value =='bd_details')
  {
     table = document.getElementById("show_bd_details");
  }
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

//to load usernames into php file



 