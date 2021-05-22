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

/**
 * Удаление программного проекта из библиотеки
 */
$('.delete-project-button').on('click', function(){
    axios.delete('/api/project/' + this.id).then(response =>{
        if(response.status == 200){
            location.reload();
        }
    }).catch(error =>{
        console.log(error);
    });
});