$('.worker-clouse-task').on('click', function(){
    axios.put('/api/worker/simple/' + this.id).then(response =>{
		if(response.status == 200){
            history.back();
			console.log('Задача завершена');
		}
	}).catch(error => {
		console.log(error);
	});
});

$('#file').on('change', function(){
    document.getElementById("file-name").innerHTML  = document.getElementById('file').files[0].name;
})