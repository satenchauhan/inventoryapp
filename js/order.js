$(document).ready(function(){

  //alert("Order");
  addNewRow();
    $("#add").click(function(){
    	addNewRow();

    })


  	function addNewRow(){
  		$.ajax({
  			url : "./includes/process.php",
  			method : "POST",
  			data : {FetchNewOrderItem : 1},
  			success : function(data){
  				$("#invoice_item").append(data);
          var n = 1;
          $(".number").each(function(){
              $(this).html(n++);
          })
  			}
  		})
  	}

  	$("#remove").click(function(){
  		$("#invoice_item").children("tr:last").remove();
      calculate(0,0);
  	})

  	$("#invoice_item").delegate(".p_id","change", function(){
  		var pid = $(this).val();
  		var tr = $(this).parent().parent();
  		$(".overlay").show();
  		$.ajax({
  			url : "./includes/process.php",
  			method : "POST",
        dataType : "json",
  			data : {get_price_qty:1, id:pid},
  			success : function(data){
  				tr.find(".total_qty").val(data['product_stock']);
          tr.find(".pro_name").val(data['product_name']);
          tr.find(".qty").val(1);
          tr.find(".price").val(data['product_price']);
          tr.find(".amt").html( tr.find(".qty").val() * tr.find(".price").val());
          calculate(0,0);
  			}
  		})

  	})

    $("#invoice_item").delegate(".qty","keyup", function(){
        var qty = $(this);
        var tr = $(this).parent().parent();
        //alert(tr.find(".total_qty").val());
        if(isNaN(qty.val())){
           alert("Please enter a valid quantity");
           qty.val(1);

        }else{
            if((qty.val() -0) > (tr.find(".total_qty").val() - 0)) {
                 alert("Sorry ! This much of qunatity is not available");
                 qty.val(1);

            }else{
                tr.find(".amt").html(qty.val() * tr.find(".price").val());
                calculate(0,0);
            }
        }
    })

    function calculate(dis,paid){
      var sub_total = 0;
      var gst = 0;
      var net_total = 0; 
      var discount = dis;
      var paid_amt = paid;
      var due = 0;
      $(".amt").each(function(){
          sub_total = sub_total + ($(this).html() * 1);

      })
      gst = 0.18 * sub_total;
      net_total = gst + sub_total
      net_total = net_total - discount;
      due = net_total - paid_amt;
      $("#sub_total").val(sub_total);
      $("#gst").val(gst);
      $("#discount").val(discount);
      $("#net_total").val(net_total);
      //$("#paid")
      $("#due").val(due);
    }
    
    $("#discount").keyup(function(){
        var discount = $(this).val();
         calculate(discount,0);
    })

    $("#paid").keyup(function(){
       var paid = $(this).val();
       var discount = $("#discount").val();
       calculate(discount,paid);
    })

    // Order store in database
    $("#order_form").click(function(){
       if ($('#customer_name').val() == ""){
           $('#customer_name').addClass("border-danger");
           $('#c_error').html("<span class='text-danger'>Please enter customer name ? </span>");

        }else if($('#product').val() == ""){
           $('#product').addClass("border-danger");
           $('#pr_error').html("<span class='text-danger'>Please select product name ? </span>");

        }else if($('#discount').val() == ""){
           $('#discount').addClass("border-danger");
           $('#d_error').html("<span class='text-danger'>Please enter discount amount ? </span>");

        }else if($('#paid').val() == ""){
           $('#paid').addClass("border-danger");
           $('#paid_error').html("<span class='text-danger'>Please enter paid amount ? </span>");

        }else{

            var invoice = $("#order-form-data").serialize();
            $.ajax({
                url : "./includes/process.php",
                method : "POST",
                data : $("#order-form-data").serialize(),
                success : function(data){
                     if(data == "Order_Saved"){
                      $("#order-form-data").trigger("reset");
                        if(confirm("Do you want to print invoice ?")) {
                          window.location.href = "../includes/invoice_bill.php?"+invoice;
                        }
                        //$(".order-footer").html("<div class='alert alert-success text-center w-100'><span style='color:green'>The order has been completed</span></div>");
                     }else{
                         
                         alert("Error");
                     }
                  
                }
            })
        }
      
    })
    
});

