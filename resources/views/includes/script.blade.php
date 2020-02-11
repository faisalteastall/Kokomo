    <script src="{{ asset('public/assets/js/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('public/assets/js/vendor/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('public/assets/js/vendor/slick/slick.min.js')}}"></script>
    <script src="{{ asset('public/assets/js/vendor/scrollLock/jquery-scrollLock.min.js')}}"></script>
    <script src="{{ asset('public/assets/js/vendor/instafeed/instafeed.min.js')}}"></script>
    <script src="{{ asset('public/assets/js/vendor/countdown/jquery.countdown.min.js')}}"></script>
    <script src="{{ asset('public/assets/js/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{ asset('public/assets/js/vendor/ez-plus/jquery.ez-plus.min.js')}}"></script>
    <script src="{{ asset('public/assets/js/vendor/tocca/tocca.min.js')}}"></script>
    <script src="{{ asset('public/assets/js/vendor/bootstrap-tabcollapse/bootstrap-tabcollapse.min.js')}}"></script>
    <script src="{{ asset('public/assets/js/vendor/isotope/jquery.isotope.min.js')}}"></script>
    <script src="{{ asset('public/assets/js/vendor/fancybox/jquery.fancybox.min.js')}}"></script>
    <script src="{{ asset('public/assets/js/vendor/cookie/jquery.cookie.min.js')}}"></script>
    <script src="{{ asset('public/assets/js/vendor/bootstrap-select/bootstrap-select.min.js')}}"></script>
    <script src="{{ asset('public/assets/js/vendor/lazysizes/lazysizes.min.js')}}"></script>
    <script src="{{ asset('public/assets/js/vendor/lazysizes/ls.bgset.min.js')}}"></script>
    <script src="{{ asset('public/assets/js/vendor/form/jquery.form.min.js')}}"></script>
    <script src="{{ asset('public/assets/js/vendor/form/validator.min.js')}}"></script>
    <script src="{{ asset('public/assets/js/vendor/slider/slider.js')}}"></script>
    <script src="{{ asset('public/assets/js/app.js')}}"></script>    
    <script src="{{ asset('public/assets/development_js/header.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
     @if(session('success')) 
     <script type="text/javascript">
         swal('Deleted!','{{session("success")}}', 'success');
     </script>
     @endif()
    @if($title=='Collection Detail' || $title=='Cart' || $title=='Collection List' || $title == 'Saved Address')
    <?php if(isset($products->prdct_base_price)){
    $prdct_base_price=$products->prdct_base_price;
    $prd_id=$products->id;
        }
    else{
    $prdct_base_price='';
    $prd_id='';

    }
    ?>
    <script type="text/javascript">
    function removeItem(id)
    {
        swal({
        title: "Are you sure?",
        text: "Do you really want to delete this item from your cart list!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, remove it!",
        closeOnConfirm: false
        },
        function(){
          location.href='{{route("removecart")}}?id='+id;
        });
    }
     function priceChange(price,quantity,changeP='',base_price='',product_id='',key='',size=''){       
        if(base_price!='')
        {
          var prdct_price=base_price;
          var prdct_id=product_id;
        }
        else{
             prdct_price='{{$prdct_base_price}}';
             prdct_id='{{$prd_id}}';
        }      
        
        if(changeP!=""){
            if(base_price==''){
             var qut = parseInt($('.userSize_'+prdct_id+'.active').find('span').data('quantity'));
             var pricet = parseInt($('.userSize_'+prdct_id+'.active').find('span').data('price'));
             price=parseInt(pricet)+parseInt(prdct_price);  
             var span=$('#base_price'); 
             var qty_input= $('.qty-input').val();
             
             }
             else{
                qut=quantity;
                price=parseInt(base_price);
                span= $('span#'+key);
                qty_input= $('.'+ key).val()     
             }             
            if((changeP=='increase') && (qty_input!=qut))
            {
                            
                price=price*(parseInt(qty_input)+1);
                console.log(qty_input);
                console.log(qut);
                if(base_price!=''){
                 location.href="{{route('addTocart')}}?id="+prdct_id+"&&qty="+(parseInt(qty_input)+1)+"&&size="+size+"&&price="+price+"&&key="+key;
                   }
                //alert(span);
                                   
                 span.text(price);
               
                
                 
            }
            if((changeP=='decrease') && (qty_input!=1))
            {
               
                 price=price*(parseInt(qty_input)-1);                
                 span.text(price);
                  if(base_price!=''){
                 location.href="{{route('addTocart')}}?id="+prdct_id+"&&qty="+(parseInt(qty_input)-1)+"&&size="+size+"&&price="+price+"&&key="+key;
                   }
                 console.log(price);
                console.log(span);
            }
           
          
        }
        else{

        price=parseInt(price)+parseInt(prdct_price);       
        if(base_price!=''){
        $('#'+prdct_id).text(price);  
        }
        else{
         $('#base_price').text(price);
        } 
        $('.qty-input').attr('data-max',quantity);
        $('.qty-input').val('1');
        $('.qty-max').text(quantity);
           }
    }
    function addtobag(prdct_id="",size="")
        {
            var size=$('.userSize_'+prdct_id+'.active').find('span').text();
            if(prdct_id=='')
            {
               prdct_id='{{$prd_id}}';                
            
            }
            
            if($('.qty-input')[0]){
                
            var qty=$('.qty-input').val();
            var price=$('#base_price').text();
             }
             if(price==''){
                qty=1;
                price=$('#'+prdct_id).text();  
             }
             else{
                qty=1;
                // alert(prdct_id);
                price=$('#'+prdct_id).text();  
             }
             //alert(price);
           location.href="{{route('addTocart')}}?id="+prdct_id+"&&qty="+qty+"&&size="+size+"&&price="+price;
        }

    function coupon_radio(code)
    {
        //alert(code);
            $('#coupon_value').val(code);
      

    }
    function toggleDiv(id1,id2) {
      var x = document.getElementById(id1);
      var y = document.getElementById(id2);
      if (x.style.display === "none" || y.style.display === "block") {
          x.style.display = "block";
          y.style.display = "none";
      } else {
        x.style.display = "none";
        y.style.display = "block";
      }
     }

    function removeShipping(id)
    {
        swal({
        title: "Are you sure?",
        text: "Do you really want to delete this shipping address from your address list!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, remove it!",
        closeOnConfirm: false
        },
        function(){
          location.href='{{route("remove_shipping")}}?id='+id;
        });
    }

    function updateShipping(data)
    {
        $('#listAddress').toggle();
        $('#newform').toggle();
        data=$.parseJSON(data);
        console.log(data);
        $('input[name="first_name"]').val(data.first_name);
        $('input[name="last_name"]').val(data.last_name);
        $('input[name="pincode"]').val(data.pincode);
        $('input[name="street"]').val(data.street);
        $('input[name="landmark"]').val(data.landmark);
        $('input[name="city"]').val(data.city);
        $('input[name="state"]').val(data.state);
        $('input[name="primary_contact_number"]').val(data.primary_contact_number);
        $('input[name="alternate_contact_number"]').val(data.alternate_contact_number);
        $('#flag').val('update');
        $('#update_id').val(data.id);
        $('input[name="house_no"]').val(data.house_number);
       
       
    }
    $(document).ready(function()
        { 
            $(".list-options.size-swatch li").on("click", function() {
                // console.log();
            $(".list-options.size-swatch li."+$(this)[0].className).removeClass("active");
            $(this).addClass("active");
           console.log($(this).closest('span'));

        });

        $('#addtobag').on('click',function(){
                addtobag();
         })
        setTimeout(function() {
    $('.alert-danger').fadeOut('slow');
}, 10000);


    })    
    </script>
    @endif
    <script>
      $(document).ready(function(){
         $("#showbutton").click(function(){
            $("#showing").slideToggle("slow");
         });
         $('input[type=file]').change(function (){
                swal({
                    title: "Are you sure?",
                    text: "Do you really want to change your current profile image!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, change it!",
                    closeOnConfirm: false
                    },
                    function(){

                        $('#updateProfile').submit();
                      
                    });
             });          
 
      });
       var page = window.location.href;   
       $("#imgbtn").click(function() {
               $("input[id='my_file']").click();
             });
     $('.myaccountdetail a[href="' + page + '"]').css('font-weight','bold');
   </script>
     @if($errors->has('modal'))
   <script>
   $(document).ready(function()
        {
     $("#{{$errors->first('modal')}}").click();
      })
   </script>
     @endif