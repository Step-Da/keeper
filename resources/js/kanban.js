const list_items = document.querySelectorAll('.list-item');
const lists = document.querySelectorAll('.list');

let draggedItem = null; // Объект, который перемещает пользователь
let mirrorTask = null; // Идентификатор перемещенной проектной задачи
let mirrorGroup = null; // Идентификатор группы, в котрую поместили проектную задачу

for (let i = 0; i < list_items.length; i++) {
	const item = list_items[i];
    
	item.addEventListener('dragstart', function () {
		draggedItem = item;
        mirrorTask = item.id;
		setTimeout(function () {
			item.style.display = 'none';
		}, 0)
	});

	item.addEventListener('dragend', function () { 
		сhangingGroupOnMove(mirrorTask, mirrorGroup);
		setTimeout(function () {
			draggedItem.style.display = 'block';
			draggedItem = null;
		}, 0);
	})

	for (let j = 0; j < lists.length; j ++) {
		const list = lists[j];
        
		list.addEventListener('dragover', function (e) {
			e.preventDefault();
		});
		
		list.addEventListener('dragenter', function (e) {
			e.preventDefault();
			this.style.backgroundColor = 'rgba(0, 0, 0, 0.2)';
		});

		list.addEventListener('dragleave', function (e) {
			this.style.backgroundColor = 'rgba(0, 0, 0, 0.1)';
		});

		list.addEventListener('drop', function (e) {
            mirrorGroup = this.id;
			this.append(draggedItem);
			this.style.backgroundColor = 'rgba(0, 0, 0, 0.1)';
		});
	} 
}

/**
 * Функция для отслеживания перемещения проектных задач пользователям по группам Kanban page
 * 
 * @param {number} task Идентификатор перемещенной проектной задачи
 * @param {number} group Идентификатор группы, в которую перемещена проектная задача
 */
function сhangingGroupOnMove(task, group){
	axios.put('/api/task/move/task/'+ task + '/group/' + group).then(response =>{
		if(response.status == 200){
			console.log('Задача: ' + task + ' В группе: ' + group);
		}
	}).catch(error => {
		console.log(error);
	});
}

/**
 * Создание новой группы для Kanban page
 */
$('#kanban-group-create').on('click', function(){
	var field = document.getElementById('error-alter');
	axios.post('/api/group/store', {
		name: $('#group-name').val(),
		project: $('#project').text(),
	}).then(response => {
		field.classList.add('hidden');
		if(response.status == 201){
			location.reload();
			console.log('A new task group has been created');
		}
	}).catch(errors => {
		field.classList.remove('hidden');
		$.each(errors.response.data.errors, function(index, value) {
			field.innerHTML = value;
		}); 
	});
});

/**
 * Создание новой проектной задачи
 */
$('#kanban-task-create').on('click', function(){
	axios.post('/api/task/store', {
		name: $('#name').val(),
		description: $('#description').val(),
		type: $('#type').val(),
		level: $('#lavel').val(),
		endpoint: $('#endpoint').val(),
		worker: $('#worker').val(),
		group: $('#group').val(),
	}).then(response => {
		if(response.status == 201){
			location.reload();
			console.log('New project record created');
		}
	}).catch(error => {
		console.log(error);
	});
});

/**
 * Удаление логической группы 
 */
$('.delete-group-button').on('click', function(){
	axios.delete('/api/group/' + this.id).then(response =>{
		if(response.status == 200){
			location.reload();
		}
	}).catch(error =>{
		console.log(error);
	});
});

/**
 * Удаление проектной задачи
 */
$('.delete-task-button').on('click', function(){
	axios.delete('/api/task/' + this.id).then(response =>{
		if(response.status == 200){
			location.reload();
		}
	}).catch(error =>{
		console.log(error);
	});
})