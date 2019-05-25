<script type="text/javascript">

function viewlightbox(e,id,data) {
    var d=[];
    //alert(j)
   // delete j["medias_id"];
    $.each(data, function(index, value){
        d.push({
                src:value.src,
                 thumb:"",
                 subHtml:""
                 });        

    });
    lightGallery(document.getElementById(''+id+''),  {
        dynamic: true,
        dynamicEl: d
    })        
    }
    function modal(data) {
        swal({
            html:true,
        title: "{{trans('medias.details')}}",
        text:  data ,
        icon: "warning",
        dangerMode: true,
        });

    }

</script>