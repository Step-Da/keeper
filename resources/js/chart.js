axios.get('/api/chart/liner').then(response =>{
    printDoughnutChart(response.data);
}).catch(error =>{
    console.log(error);
});

axios.get('/api/chart/polar').then(response =>{
    printPolarChart(response.data)
}).catch(error =>{
    console.log(error);
});

/**
 * Функция для построения полярного графика
 * 
 * @param {array number} data Данные для построения графика
 */
function printPolarChart(data){
    new Chart(document.getElementById("polar-chart"), {
        type: 'polarArea',
        data: {
            labels: [
                "Всего проектов", 
                "Завершённые проекты", 
                "Незаконченные проекты"
            ],
            datasets: [
            {
                label: "Population (millions)",
                backgroundColor: [
                    "#c3c3ebf1", 
                    "#d0eddf",
                    "#edd0de"
                ],
                data: [
                    data['all'],
                    data['true'],
                    data['false'],
                ]
            }
          ]
        },
        options: {
          title: {
            display: true,
            text: 'Процесс выполнения программных задач'
          }
        }
    });
}

/**
 * Функция для построения линейного графика
 * 
 * @param {array number} data  Данные для построения графика
 */
function printDoughnutChart(data){
    new Chart(document.getElementById("doughnut-chart"), {
        type: 'horizontalBar',
        data: {
            labels: [
                "Всего", 
                "В процессе", 
                "Готовые"
            ],
            datasets: [
            {
              label: "Кол-во программных проектов",
              backgroundColor: [
                  "#ffd699", 
                  "#a8ffd2",
                  "#ff3856"
                ],
              data: [
                  data['all'],
                  data['developing'],
                  data['remove'],
                ]
            }
          ]
        },
        options: {
          legend: { display: false },
          title: {
            display: true,
            text: 'Разработка программных проектов в Keeper'
          }
        }
    }); 
}