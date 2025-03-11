<script type="text/javascript">

 $(document).ready(function(){
    $("#insert_data").on("submit",function(e){
        e.preventDefault();
        $.ajax({
         type:"POST",
         url:"",
         cache: false,
         dataType:"json",
         data: $(this).serialize(),
        }).done(function(result){
            // Ternary applications -> Code, Data and Message

            (result.Code ==1) ? showAlert(result.Message,'success'): showAlert(result.Message,'danger');

        }).fail(function(result){
            showAlert('Data already exists!','danger');
        }).always(function(){
            loadTable();
            $('#form_id').trigger('reset');
            $('#close_btn_id').trigger('click');

        });
    })
});



function showAlert(){
    var alert = $('div[role="alert"]');
    $(alert).css('display','inline-block');
    $(alert).css('margin','3%');
    $(alert).find('strong').html(msg_body);
    $(alert).find('p').html(msg_body);
    $(alert).removeAttr('class');
    $(alert).addClass('alert alert-' + msg_type);
    $(alert).show();


}








        })
    })
 })
  




    </script>
