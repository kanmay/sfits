var app=new Vue({
    el:'#app',
    data:{
        total:'',
        deposit:''

    },
    mounted:function(){
    
    },

    methods:{
        takeOrder(){
            alert(parseInt($('#total').val(),10)-parseInt($('#deposit').val(),10))
            
            $.post( "Controller/take_orders.php", {
                token:'take_orders', 
                ofrom:$('#ofrom').val(),
                phone:$('#phone').val(),
                item:$('#item').val(),
                iclass:$('#class').val(),
                size:$('#size').val(),
                type:$('#type').val(),
                pipin:$('#pipin').val(),
                qty:$('#qty').val(),
                description:$('#description').val(),
                total:$('#total').val(),
                deposit:$('#deposit').val(),
                balance:parseInt($('#total').val(),10)-parseInt($('#deposit').val(),10),

            })
             .done(function( data ) {
                if(data==='New record created successfully'){
                    $('#ofrom').val(''), 
                    $('#phone').val(''), 
                    $('#item').val(''),
                    $('#class').val(''),
                    $('#size').val(''),
                    $('#type').val(''),
                    $('#pipin').val(''),
                    $('#qty').val(''),
                    $('#description').val(''),
                    $('#total').val(0),
                    $('#deposit').val(0),
                    app.balance='0',
                    
                

                    $('#alert').css("visibility", "");
                }    
                
                alert( "Data Loaded: " + data );
            });
           
        },

        makeOrder(){
            $.post( "Controller/make_orders.php", { 
                token:'make_orders',
                oto:$('#oto').val(),
                item:$('#item').val(),
                iclass:$('#class').val(),
                size:$('#size').val(),
                type:$('#type').val(),
                pipin:$('#pipin').val(),
                qty:$('#qty').val(),
                description:$('#description').val(),
                
            })
             .done(function( data ) {
                if(data==='New record created successfully'){
                    $('#oto').val(''), 
                    $('#item').val(''),
                    $('#class').val(''),
                    $('#size').val(''),
                    $('#type').val(''),
                    $('#pipin').val(''),
                    $('#qty').val(''),
                    $('#description').val(''),
                   
                    
                

                    $('#alert').css("visibility", "");
                }    
                
                alert( "Data Loaded: " + data );
            });

        },

        delrow:function(msg){

            app.itemToDelete=msg;
            $('#'+app.itemToDelete).hide(500);
            $.get( "Controller/delete_rows.php", { 
                item: app.itemToDelete,
                 
            })
             .done(function( data ) {
               
                
                
            });

        }
    }
});