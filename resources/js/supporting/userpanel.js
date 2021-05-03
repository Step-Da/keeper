/**
 * Удаление аккаунта пользователя на странице user page
 */
$('.delete-user-target').on('click', function(){
    axios.delete('/api/user/' + $(this).val()).then(response =>{
        if(response.status == 200){
            console.log('the selected user account has been deleted');
        }
    }).catch(error =>{
        console.log(error);
    });
});