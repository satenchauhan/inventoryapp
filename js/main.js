$(document).ready(function(){
  //Fetch Categories========================================================
   fetch_category();
  	function fetch_category(){
  		$.ajax({
  			url: "./includes/process.php",
  			method : "POST",
  			data : {getCategory:1},
  			success : function(data){
          var maincat = "<option value='0'>Main Category</option>";
          var subcat = "<option  value=''>Select Category</option>";
  				$("#parent_cat").html(maincat+data);
          $("#select_cat_id").html(subcat+data);
  			}

  		});

  	} 
    //Fetch Brands=========================================================
    fetch_brand();
    function fetch_brand(){
      $.ajax({
        url: "./includes/process.php",
        method : "POST",
        data : {getBrand:1},
        success : function(data){
          var select = "<option  value=''>Select Brand</option>";
          $("#select_brand_id").html(select+data);
        }

      });

    }

// ===Add Category=========================================================
    $('#cat-form').on('submit', function(){
       if ($('#category_name').val() == "") {
           //$('#parent_cat').addClass("border-danger");
           $('#category_name').addClass("border-danger");
           $('#cat_error').html("<span class='text-danger'>Please enter category name ? ?</span>");
           //$('#p_error').html("<span class='text-danger'>Please select main category ? ?</span>");
       }else{
            $.ajax({
                url : "./includes/process.php",
                method : "POST",
                data : $("#cat-form").serialize(),
                success : function(data){
                        if(data == "Main category"){
                               $('#category_name').removeClass("border-danger");
                               $(".cat-footer").html("<div class='alert alert-success text-center w-100'><span class='text-success'>The main category has been added successfully !!</span></div>");
                               $('#category_name').val('');
                               fetch_category();

                        }else if(data == "Subcategory"){
                               $('#category_name').removeClass("border-danger");
                               $('.cat-footer').html("<div class='alert alert-success text-center w-100'><span style='color:green'><span class='text-success'>The subcategory has been added successfully</span></div>");
                        
                        }else{

                          alert(data);
                    }

                }

                 
            });

       }
    
    })  

 
//Add Brands================================================================
    $('#brand-form').on('submit', function(){
        if($('#brand-id').val() == ""){
           $('#brand-id').addClass('border-danger');
           $('#b-error').html("<span class='text-danger'>Please enter brand name ? ?</span>");

        }else{

          $.ajax({
              url: "./includes/process.php",
              method: "POST",
              data: $("#brand-form").serialize(),
              success: function(data){
                    if(data == "success"){
                      $("#brand_id").removeClass("border-danger")
                      $(".brand-footer").html("<span class='alert alert-success text-center w-100'>The brand has been added !!</span>");
                      $('#brand-id').val('');
                      fetch_brand();

                    }else{

                      alert(data);
                    }
                             
              }
              
           });
        }

    });


 //Add Products==================================================================     
    $('#product-form').on('submit', function(){
        if($('#product_id').val() == ""){
           $('#product_id').addClass('border-danger');
           $('#p_error').html("<span class='text-danger'>Please enter product name ? ?</span>");

        }else if($('#select_cat_id').val() == ""){
                 $('#select_cat_id').addClass('border-danger');
                 $('#cat-error').html("<span class='text-danger'>Please select main category or subcategory ? ?</span>");

        }else if($('#select_brand_id').val() == ""){
                 $('#select_brand_id').addClass('border-danger');
                 $('#br-error').html("<span class='text-danger'>Please select brand ? ?</span>");

        }else if($('#product_price_id').val() == ""){
                 $('#product_price_id').addClass('border-danger');
                 $('#pr-error').html("<span class='text-danger'>Please enter price ? ?</span>");

        }else if($('#quantity_id').val() == ""){
                 $('#quantity_id').addClass('border-danger');
                 $('#q-error').html("<span class='text-danger'>Please enter quantity available ? ?</span>");

        }else{

           $.ajax({
              url: "./includes/process.php",
              method: "POST",
              data: $("#product-form").serialize(),
              success: function(data){
                    if(data == "success"){
                      $("#product_id").removeClass("border-danger")
                      $(".modal-footer").html("<span class='alert alert-success text-center w-100'>The product has been added !!</span>");
                      $('#product_id').val('');
                      $('#select_cat_id').val('');
                      $('#select_brand_id').val('');
                      $('#product_price_id').val('');
                      $('#quantity_id').val('');

                    }else{

                      alert(data);
                    }
                              
              }
              
           });
        }

    });

    // Manage category list
    manage_category();
    function manage_category(){
        $.ajax({
            url: "./includes/process.php",
            method: "POST",
            data: {manage_category:1},
            success: function(data){
               $("#category-table").html(data);
            }
        })
    }
    
 });

