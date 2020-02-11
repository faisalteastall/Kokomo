function showmodal(id1,id2)
{
//	$('#'+id1).modal('hide');
	$('#'+id2).modal('toggle');
	//$('#'+id2).modal('toggle');
	$('#'+id2).on('hidden.bs.modal', function(){
  //remove the backdrop
 $('#'+id2+'.modal-backdrop').remove();
})

   // $('#'+id1).modal('hide');
   // $('#'+id2).modal('show');
}
