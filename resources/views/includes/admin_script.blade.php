<script src="{{asset('public/admin-assets/js/vendors.min.js')}}"></script>
<script src="{{asset('public/admin-assets/js/plugins.min.js')}}"></script>
<script src="{{asset('public/admin-assets/js/search.min.js')}}"></script>
<script src="{{asset('public/admin-assets/js/custom/custom-script.min.js')}}"></script>
<script src="{{asset('public/admin-assets/js/scripts/customizer.min.js')}}"></script>
<script src="{{asset('public/admin-assets/js/scripts/form-layouts.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
<script type="text/javascript" src="{{asset('public/admin-assets/js/image-uploader.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
 
 @if(session('success')) 
 <script type="text/javascript">
     swal('{{session("success")}}','', 'success');
 </script>
 @endif()

@if($title=='Edit Product')
<script type="text/javascript">
Dropzone.autoDiscover = false;
 $(function () { 
console.log();
  $('.input-images').imageUploader({
    preloaded: JSON.parse("{{$img_array}}".replace(/&quot;/g,'"')), // more images here


   });
  $("input:checkbox:not(:checked)").each(function () {
     $(this).parent().closest('div').parent('div').find('input[name="quantity[]"]').val("");
     $(this).parent().closest('div').parent('div').find('input[name="price[]"]').val("");
  })
 
$(':checkbox').change(function() {
    $(this).parent().closest('div').parent('div').find('input[name="quantity[]"]').val("");
    $(this).parent().closest('div').parent('div').find('input[name="price[]"]').val("")
    console.log();
});

})
    
</script>
@else

<script>

 Dropzone.autoDiscover = false;
 $(function () { 

  $('.input-images').imageUploader({
    preloaded: '',
   });
 


})
 </script>
 @endif
 <script>


    var page = window.location.href;   
    $('.sidenav li a[href="' + page + '"]').addClass('active');
   
    var room =1 ;
    function education_fields(rooms=1) {
        if(rooms!=1){
        room=rooms;
    }
        room++;

       // console.log($('.btn-outline-primary').prev('div').attr('id'));
        var objTo = document.getElementById('education_fields')
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "form-group removeclass" + room);
        var rdiv = 'removeclass' + room;
        divtest.innerHTML = '<div class="input-field col s12"><input id="message5" class="materialize-textarea" name="description[]" type="text" value={{old("description.'+room+'")}} ><label for="message">Description</label><div class="input-group-append"> <button style="position: absolute;float: right;top: 5px;right: 14px;" class="btn btn-danger" type="button" onclick="remove_education_fields(' + room + ');"> <i class="material-icons">clear</i> </button></div></div></row>';
        $('.btn-outline-primary').prev('div').append(divtest)
    }
    function remove_education_fields(rid) {
        $('.removeclass' + rid).remove();
    }

    function removefunction(param,url_link,status){       
        swal({
        title: "Are you sure?",
        text: "Do you really want to "+status+" this "+param+" from your "+param+" list!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, "+status+" it!",
        closeOnConfirm: false
        },
        function(){
          location.href=url_link;
        }

        );

    }
    
</script>