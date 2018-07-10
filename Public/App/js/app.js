/**
 * Customers
 */

Customer={
    delete:function(id){
        swal(
            {
                type:'question',
                title:'Delete',
                text:'Are you sure you want to delete this customer?',
                showConfirmButton:true,
                showCancelButton:true,
                confirmButtonText:'Yes'
            }
        ).then((result)=>{
            if(result.value){
                Helpers.deleteJson(deleteEndpoint+id,function(d){
                    swal({
                        type:'success',
                        title:'Success',
                        text:'The customer has successfully been deleted'
                    });
                },function(d){
                    let msg='';
                    if (d.status===404){
                        msg='An error occurred submitting the data.'
                    }else if(typeof d === "object"){
                        msg="An error occurred while processing your request. Please try again later."
                    }else{
                        msg=d;
                    }
                    swal({
                        type:'warning',
                        title:'An error has occurred.',
                        text:msg
                    });
                });
            }
        });
    },
    edit:function(id){
        if(id){
            $.each(customers,function(i,j){
                if(j.id==id){
                    $('#id').val(id);
                    $('#email').val(j.email);
                    $('#fname').val(j.first_name);
                    $('#mname').val(j.middle_name);
                    $('#lname').val(j.last_name);
                    $('#editCustomer').modal('toggle');
                }
            });
        }
    },
    update:function(){
        let id=$('#id').val(),
            email=$('#email').val(),
            firstname=$('#fname').val(),
            middlename=$('#mname').val(),
            lastname=$('#lname').val();

        let payload={
            'id':id,
            'email':email,
            'first_name':firstname,
            'middle_name':middlename,
            'last_name':lastname
        };
        swal(
            {
                type:'question',
                title:'Confirm',
                text :'Are you sure you want to make this update?',
                showConfirmButton:true,
                showCancelButton:true
            }
        ).then((result)=>{
            if(result.value){
                Helpers.postJson(editEndpoint,payload,function(d){
                    console.log(d);
                },function(e){
                    console.log(e)
                });
            }
        });
    }
};

Helpers={
    postJson:function (endpoint,payload,onSuccess,onError){
    $.ajax(
        {
            url: endpoint,
            data:payload,
            type:"POST",
            success:onSuccess,
            error:onError
        }
    )
},

    deleteJson:function (endpoint,onSuccess,onError){
    $.ajax(
        {
            url: endpoint,
            type:"POST",
            success:onSuccess,
            error:onError
        }
    )
},

    updateJson:function(endpoint,payload,onSuccess,onError){
        $.ajax(
            {
                url: endpoint,
                type:"POST",
                data:payload,
                success:onSuccess,
                error:onError
            }
        )
    }
};