$(document).ready(function() {
    $('#categcontainer').hide();
$('#sub-categ').click(function(){
if($(this).find('option:selected').html() != 'Select'){
    $('#categcontainer').show(); 
}
else{
$('#categcontainer').hide();    
}
})



$.validator.addMethod('itemcodeval', function (value) { 
    return /^([a-zA-Z0-9]+)\S+$/g.test(value); 
}, 'Please enter a valid item code(no space allowed).');

$.validator.addMethod('itemnameval', function (value) { 
    return /^([a-zA-Z]+)\S+$/g.test(value); 
}, 'Please enter a valid item name(no space allowed).');

$("#validform").validate({
   
    rules: {
        maincateg: {
        itemnameval:true,
        required: true,   
       },
       subcateg: {	
        itemnameval:true,
        required:true,
       },
       itemcode:{
        itemcodeval:true,
        required:true,
       },
       itemname:{
        itemnameval:true,
        required:true,  
       },
       filename:{
        required:true,   
       }    
       },
       messages: {
          required: "Field Required",
       },
       
   });

$('#customFile').change(function(){
    var imagefile = $('#customFile').val();
    var fileextension = /(\.jpeg|\.jpg|\.png|\.gif|\.webp)$/i;
    if(!fileextension.exec(imagefile)){
        $(this).after('<label id="item-code-error" class="error" for="item-code">File extention not valid.</label>');
        $('#submit-btn').click(function(){
            console.log(fileextension.exec(imagefile));
            return false; 
        });
    }
});


$('#listtable').DataTable({
    columnDefs: [{
        targets: [ 2 ],
        orderable: false,

    }]
});

});