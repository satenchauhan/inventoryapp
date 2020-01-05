$(document).ready(function(){
    // Manage category list====================================================
        manage_category_list(1);
        function manage_category_list(pn){
            $.ajax({
                url: "./includes/process.php",
                method: "POST",
                data: {manage_category:1,pageno:pn},
                success: function(data){
                   $("#category-table").html(data);
                    
                }
            })
        }
//====Pagination
        $("body").delegate(".page-link","click",function(){
            var pn = $(this).attr("pn");
            manage_category_list(pn);
        });

        $("body").delegate(".del_cat","click", function(){
            var del_id = $(this).attr("del_id");
            // alert(del_id);
            if(confirm("Are you sure ? You want to delete this ?")){
                 $.ajax({
                    url: "./includes/process.php",
                    method: "POST",
                    data: {delete_category:1, id:del_id},
                    success: function(data){
                        if(data == "Main_Category"){
                            //alert("Sorry ! This category is belong to subcategory");
                            $(".show-msg").html("<div class='alert alert-danger text-center w-100'><span style='color:red'>This main category is belong to subcategory ! You can not delete ! First delete subcategory !!</span></div>");
                        }else if(data == "Category_Deleted"){
                            $(".show-msg").html("<div class='alert alert-success text-center w-100'><span style='color:green'>The main category has been deleted successfully !!</span></div>");
                            //alert("Category deleted successfully");
                            manage_category_list(1);
                        }else if(data == "Deleted"){
                            $(".show-msg").html("<div class='alert alert-success text-center w-100'><span style='color:green'>The subcategory has been deleted successfully !!</span></div>");
                            //alert("Deleted successfully");
                        }else{

                        }
                        
                    }
                 })
            }else{
                alert("No");
            }
        })

// Fetch category
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
    // 
        $("body").delegate(".edit_cat","click", function(){
            var edit_id = $(this).attr("edit_id");
            //alert(edit_id);
            $.ajax({
                url: "./includes/process.php",
                method: "POST",
                dataType: "json",
                data: {updateCategory:1,id:edit_id},
                success: function(data){
                    //alert(data);
                    //alert(data['category_name']);
                    //console.log(data);
                    $("#cat_id").val(data["cat_id"]);
                    $("#update_category_id").val(data["category_name"]);
                    $("#parent_cat").val(data["parent_cat"]);
                }
            })
        })
        $("#update-cat-form").on("submit",function(){
            if ($('#update_category_id').val() == "") {
               //$('#parent_cat').addClass("border-danger");
                $('#update_category_id').addClass("border-danger");
                $('#cat_error').html("<span class='text-danger'>Please enter category name ? ?</span>");
               //$('#p_error').html("<span class='text-danger'>Please select main category ? ?</span>");
           }else{
                $.ajax({
                    url : "./includes/process.php",
                    method : "POST",
                    data : $("#update-cat-form").serialize(),
                    success : function(data){
                        $(".update-cat-footer").html("<div class='alert alert-success text-center w-100'><span style='color:green'>The main category has been updated !!</span></div>");
                        window.location.href = "";
                    }
                     
                });

           }
        })
// Manage brand list================================================================================
        manage_brand_list(1);
        function manage_brand_list(pn){
            $.ajax({
                url: "./includes/process.php",
                method: "POST",
                data: {manage_brand:1,pageno:pn},
                success: function(data){
                   $("#brand-table").html(data);
                    
                }
            })
        }
        $("body").delegate(".page-link","click",function(){
            var pn = $(this).attr("pn");
            manage_brand_list(pn);
        });

        $("body").delegate(".del_brand","click", function(){
            var del_id = $(this).attr("del_id");
            // alert(del_id);
            if(confirm("Are you sure ? You want to delete this ?")){
                 $.ajax({
                    url: "./includes/process.php",
                    method: "POST",
                    data: {delete_brand:1, id:del_id},
                    success: function(data){
                        if(data == "Deleted"){
                           $(".show-msg").html("<div class='alert alert-success text-center w-100'><span style='color:green'>The brand has been deleted successfully !!</span></div>");
                            manage_brand_list(1);
                        }
                        
                    }
                 })
            }
        })
        // Update brand
        $("body").delegate(".edit_brand","click", function(){
            var edit_id = $(this).attr("edit_id");
            //alert(edit_id);
            $.ajax({
                url: "./includes/process.php",
                method: "POST",
                dataType: "json",
                data: {updateBrand:1,id:edit_id},
                success: function(data){
                    //alert(data);
                    //alert(data['category_name']);
                    //console.log(data);
                    $("#brand_id").val(data["brand_id"]);
                    $("#update_brand_id").val(data["brand_name"]);
                    
                }
            })
        })
        $("#update_brand_form").on("submit",function(){
            if ($('#update_brand_id').val() == "") {
               //$('#parent_cat').addClass("border-danger");
               $('#update_brand_id').addClass("border-danger");
               $('#b_error').html("<span class='text-danger'>Please enter category name ? ?</span>");
               //$('#p_error').html("<span class='text-danger'>Please select main category ? ?</span>");
           }else{
                $.ajax({
                    url : "./includes/process.php",
                    method : "POST",
                    data : $("#update_brand_form").serialize(),
                    success : function(data){
                        $(".update-brand-footer").html("<span class='alert alert-success text-center w-100'>The brand has been updated !!</span>");
                        //window.location.href = "";
                        manage_brand_list(1);
                    }
                     
                });

           }
        })
// Manage product list=====================================================================
        manage_product_list(1);
        function manage_product_list(pn){
            $.ajax({
                url: "./includes/process.php",
                method: "POST",
                data: {manage_product:1,pageno:pn},
                success: function(data){
                   $("#products-table").html(data);
                    
                }
            })
        }
        $("body").delegate(".page-link","click",function(){
            var pn = $(this).attr("pn");
            manage_product_list(pn);
        });

        $("body").delegate(".del_product","click", function(){
            var del_id = $(this).attr("del_id");
            // alert(del_id);
            if(confirm("Are you sure ? You want to delete this ?")){
                 $.ajax({
                    url: "./includes/process.php",
                    method: "POST",
                    data: {delete_product:1, id:del_id},
                    success: function(data){
                        if(data == "Deleted"){
                           $(".show-msg").html("<div class='alert alert-success text-center w-100'><span style='color:green'>The product has been deleted successfully !!</span></div>");
                            manage_product_list(1);
                        }
                        
                    }
                 })
            }
        })
        // Update brand
        $("body").delegate(".edit_product","click", function(){
            var edit_id = $(this).attr("edit_id");
            //alert(edit_id);
            $.ajax({
                url: "./includes/process.php",
                method: "POST",
                dataType: "json",
                data: {updateProduct:1,id:edit_id},
                success: function(data){
                    $("#p_id").val(data["p_id"]);
                    $("#update_product_id").val(data["product_name"]);
                    $("#select_cat_id").val(data["cat_id"]);
                    $("#select_brand_id").val(data["brand_id"]);
                    $("#product_price_id").val(data["product_price"]);
                    $("#quantity_id").val(data["product_stock"]);
                    $("#date_id").val(data["created_at"]);
                           
                }
            })
        })
        $("#update_product_form").on("submit",function(){
            if ($('#update_product_id').val() == "") {
                $('#update_product_id').addClass("border-danger");
                $('#p_error').html("<span class='text-danger'>Please enter product name ? ?</span>");
            }else if($('#product_price_id').val() == ""){
                $('#product_price_id').addClass("border-danger");
                $('#pr-error').html("<span class='text-danger'>Please enter product price ? ?</span>");
            }else if($('#quantity_id').val() == ""){
                $('#quantity_id').addClass("border-danger");
                $('#q-error').html("<span class='text-danger'>Please enter product stock ? ?</span>");
            }else{
                $.ajax({
                    url : "./includes/process.php",
                    method : "POST",
                    data : $("#update_product_form").serialize(),
                    success : function(data){
                        //alert(data);
                        if(data == "Updated"){
                            $(".show-msg").html("<div class='alert alert-success text-success text-center w-100'><span>The product has been updated !!</span>");
                            //window.location.href = "";
                            manage_product_list(1);  
                        }else{
                            $(".show-msg").html("<div class='alert alert-danger text-danger text-center w-100'><span>The product has been updated !!</span>");
                        }
   
                    }
                     
                });
            }

        })

 });

