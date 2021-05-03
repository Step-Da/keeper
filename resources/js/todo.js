/**
 * Изменение статуса выполения глабальной задачт в базе данных
 * 
 * @param {number} todoId Id выбранной задачи
 * @param {boolean} newStatus Новый стутус задачи
 */
function changeStatusTodo(todoId, newStatus){
    axios.put('/api/todo/' + todoId, {
        status: newStatus
    }).then(response => {
        if(response.status == 200){
            console.log('The status of the selected todo has been changed');
        }
    }).catch(error =>{
        console.log(error);
    });
}

/**
 * Логика работы и изменения стутусов задачи в листе
 */
function todo() { 
    $('.todo-list .todo-item input').on('click', function() {
    if($(this).is(':checked')) { $(this).parent().parent().parent().toggleClass('complete'); } 
    else { $(this).parent().parent().parent().toggleClass('complete'); }
    changeStatusTodo($(this).val(), $(this).is(':checked'));
});

$('.todo-nav .all-task').on('click', function() {
    $('.todo-list').removeClass('only-active');
    $('.todo-list').removeClass('only-complete');
    $('.todo-nav li.active').removeClass('active');
    $(this).addClass('active');
   
});

$('.todo-nav .active-task').on( 'click', function() {
    $('.todo-list').removeClass('only-complete');
    $('.todo-list').addClass('only-active');
    $('.todo-nav li.active').removeClass('active');
    $(this).addClass('active');
    
});

$('.todo-nav .completed-task').on('click', function() {
    $('.todo-list').removeClass('only-active');
    $('.todo-list').addClass('only-complete');
    $('.todo-nav li.active').removeClass('active');
    $(this).addClass('active');

});

$('#uniform-all-complete input').on('click', function() {
    if($(this).is(':checked')) { $('.todo-item .checker span:not(.checked) input').click(); } 
    else { $('.todo-item .checker span.checked input').click(); }
});

// $('.remove-todo-item').click(function() {
//     $(this).parent().remove();
// });
};

todo();

/**
 * Запись новой задачи в базу данных
 * 
 * @param {string} todo Текст(содержание) новой задачи 
 * @param {number} user Id потльзователя, который создал задачу
 */
function dataBaseRecorderTodo(todo, user){
    axios.post('/api/todo/store',{
        name: todo,
        user_id: user
    }).then(response => {
        if(response.status == 201){
            console.log('New todo added');
        }
    }).catch(error => {
        console.log(error);
    });
}


$(".add-task").keypress(function (e) {
   
    if ((e.which == 13)&&(!$(this).val().length == 0)) {
        dataBaseRecorderTodo($(this).val(), document.getElementById('mirror-user-id').value);
        $('<div class="todo-item p-3.5 my-1.5 rounded-sm bg-indigo-100"><div class="checker"><span class=""><input type="checkbox"></span></div> <span>' + $(this).val() + '</span> <a href="javascript:void(0);" class="float-right remove-todo-item"><i class="icon-close"></i></a></div>').insertAfter('.todo-list .todo-item:last-child');
        $(this).val('');
    } 

    $(document).on('.todo-list .todo-item.added input').click(function() {
        if($(this).is(':checked')) { $(this).parent().parent().parent().toggleClass('complete'); } 
        else { $(this).parent().parent().parent().toggleClass('complete'); }
    });

    $('.todo-list .todo-item.added .remove-todo-item').click(function() {
        $(this).parent().remove();
    });
});