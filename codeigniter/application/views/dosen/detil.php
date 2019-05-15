<?php
echo validation_errors();
echo form_open_multipart("dosen/show/{$m->nip}");
echo form_hidden('old_key', $m->nip);
echo form_input('nip',$m->nip);
echo bs_form_input('nama',$m->nama);
echo form_upload('foto');
echo form_submit('','Simpan');
echo form_close();
?>
<button>Send an HTTP POST request to a page and get the result back</button>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
	
    $("button").click(function(){
				let namanya = $('input[name="nama"]').val();
        $.post("<?php echo site_url("dosen/ajax");?>",
        {
          name: "Donald Duck",
          city: namanya
        },
        function(data,status){
            alert("Data: " + data + "\nStatus: " + status);
        });
    });
});
</script>