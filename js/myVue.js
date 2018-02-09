var app=new Vue({
    el:'#app',
    data:{

        sortItems:'',
        itemToDelete:'',
        total:'',
        deposit:''

    },
    mounted:function(){
        this.messages() //method1 will execute at pageload
    },

    methods:{
        messages(){
            axios.get('Controller/get_sort_items.php', {
                
              })
              .then(function (response) { //if success
               //if(response.status==200){
                   
                   app.sortItems=response.data;
                   console.log(JSON.stringify(response.data));
                   
                
                //}
              })
              .catch(function (error) {
                console.log(error); // if fail
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