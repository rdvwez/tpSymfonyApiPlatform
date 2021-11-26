// console.log('toot')
// import { get } from 'axios';

// get('http://127.0.0.1:8080/api/todos')
//     .then(function (response) {
//         // handle success
//         console.log(response);
//     })
//     .catch(function (error) {
//         // handle error
//         console.log(error);
//     })
//     .then(function () {
//         // always executed
//     });

// console.log(get)

// const getTodoList = (url) =>{
//     return new Promise((reolve, reject) =>{
//         const todoList = fetch(url)

//         if (todoList) {
//             reolve(todoList)
//         } else {
//             reject()
//         }

//     })
// }

// getTodoList('http://127.0.0.1:8080/api/todos').then((result) => {
//     console.log(result)
// }).catch(() => {
//     console.log("error")
// })
// let tasks
// fetch('http://127.0.0.1:8080/api/todos')
//     .then(response => response.json())
//     .then(tasks => {
//         // for (const task of tasks) {
//         //     console.log(task)
//         // }

//         console.log(tasks)

//         // tasks = data
//     })

const getTasks = async function () {
    try {
        let response = await fetch("http://127.0.0.1:8080/api/todos")
        if (response.ok) {
            let data = await response.json()
            // console.log(data["hydra:member"])

            for (let i = 0; i < data["hydra:member"].length; i++) {
                console.table(data["hydra:member"][i])
            }

        } else {
            console.log('retour du serveur :', response.status)
        }
    } catch (e) {
        console.log(e)
    }

}

getTasks()