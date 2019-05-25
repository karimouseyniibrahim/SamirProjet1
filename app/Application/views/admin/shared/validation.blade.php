<script type="text/javascript">
function openmodal(id,status,formation_id,name_id) {
    $('.modal-body #identifiant').val(id);
    $(".modal-body #"+name_id).val(formation_id);
    $(".modal-body #status").val(status);

    $('#modalstatus').modal('show');
}

$('#validateform').on('submit',function(){
   

}) ;
</script>