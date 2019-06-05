        $('#section_id').on('change',function(){
            var section=$(this).val();

            if (section!='') {
                $.get('/site/locaux/'+section,function(res){
                    var json=JSON.parse(res);
                    var out='';
                    $.each(json,function(key,value){
                        out+='<option value="'+key+'">'+value+'</option>'
                    });
                    $('#local_id').html(out);
                    $('#local_id').selectpicker('refresh');                     
                }); 
            }
        });   