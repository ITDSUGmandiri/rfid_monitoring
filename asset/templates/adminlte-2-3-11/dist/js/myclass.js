function send_msg_complete(base_url, nama_pasien, phone_pasien){

  $.ajax({
    type: "POST",
    url: base_url,
    cache: false,    
    data: {
      //lalamove_shareLink : lalamove_shareLink, 
      phone_pasien : phone_pasien, 
      nama_pasien : nama_pasien
    },
    success: function(data)
    {       
    
      try
      {  

        var obj = jQuery.parseJSON(data);
        status = obj['status'];
        data_notif = obj['data_notif'];
        msg = obj['msg'];

        if (status == 'success'){
          alert(data_notif);
        }
        else //if (status == 'error')
        {
          alert('Send notif wa gagal dikirim !!');
        }

        return true;

      }
      catch(e){  
        alert('Exception while request..'+e.message);
      }  
                          
    },
    error: function(){      
      alert('Error while request sharelink to whatsapp..');
    }
                                
  });

}