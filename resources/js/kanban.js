const list_items = document.querySelectorAll('.list-item');
const lists = document.querySelectorAll('.list');

let draggedItem = null;
let mirrorItem = null;
let mirrorGroup = null;

for (let i = 0; i < list_items.length; i++) {
	const item = list_items[i];
    
	item.addEventListener('dragstart', function () {
		draggedItem = item;
        mirrorItem = item.id;
		setTimeout(function () {
			item.style.display = 'none';
		}, 0)
	});

	item.addEventListener('dragend', function () { 
        console.log('Элемент: ' + mirrorItem + ' В группе: ' + mirrorGroup)
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

$('#kanban-group-create').on('click', function(){
	axios.post('/api/group/store', {
		name: $('#group-name').val(),
		project_id: $('#project-id').text()
	}).then(response => {
		if(response.status == 201){
			console.log('A new task group has been created');
			location.reload();
		}
	}).catch(error => {
		console.log(error);
	});
});

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
			console.log('ok');
		}
	}).catch(error => {
		console.log(error);
	});
});