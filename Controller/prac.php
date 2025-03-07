<script type="text/javascript">

  $(document).ready(function(){

   $("#insert_data").on("submit", function(e){

       e.preventDefault;
       $.ajax({
        type:"POST",
        url:'',
        dataType:'json',
        cache: false,
        data:$(this).serialize(),
    }).done(function(result){
       (result.Code== 1) ? 
       showAlert(result.Message,'success') :
       showAlert(result.Message,'danger')
    }).fail(function(){
        showAlert('please try again later!','danger');
    }).always(function(){
        loadTable();
        $("#insert_data").trigger('reset');
        $("#close_click").trigger('click');
    });



   })



  });


  function showAlert(body,type){
    


    
  }




    </script>
