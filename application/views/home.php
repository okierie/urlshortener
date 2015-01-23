<script src="<?php echo base_url();?>public/jquery.js"></script>
<script>
    $(document).ready(function (){
        $("#hasil").hide();
        $("#send").click(function (){
            shortit();
        });
    });
    function shortit(){
        var url = $("#url").val();
        $.ajax({
            url     : "<?php echo base_url();?>okierieshortener",
            data    : "url="+url,
            type    : "post",
            dataType: "json",
            cache   : false,
            success : function (data){
                 $("#hasil").hide();
                if (data.valid == "true"){
                    $("#hasil").show({
                        complete    : function (){
                            $("#urlhasil").val("<?php echo base_url();?>"+data.shortened);
                        }
                    });                            
                }
                else{
                    alert("URL ERROR");
                }                
            },
	    error	: function (a,b){
		alert(a.responseText);
		}
        });
    }
</script>

<h1>okierie url shortener</h1>
<!--<form method="post" action="<?php echo base_url();?>okierieshortener">-->
    <textarea id="url" name="url" cols="100"></textarea><input type="button" value="Short It!" id="send"></input>
<!--</form>-->
<div id="hasil">
    <h4>shortened url:</h4>
    <input readonly="" size="100" type="text" id="urlhasil" >
</div>
