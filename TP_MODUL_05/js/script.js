document.addEventListener("DOMContentLoaded", function () {
  // Menambahkan event click pada tombol untuk memanggil fungsi loadTasks
  const showTasksBtn = document.getElementById("show-tasks");
  showTasksBtn.addEventListener("click", loadTasks);
});

function loadTasks() {
  // Membaca file JSON yang telah dibuat
  fetch("js/tasks.json")
    .then(response => response.json())
    .then(data => {
      displayTasks(data.tasks);
    })
    .catch(error => {
      console.error("Terjadi kesalahan saat memuat data:", error);
    });
}

function displayTasks(tasks) {
  /*
    Dari data JSON yang diterima dari parameter (berbentuk array),
    lakukan looping setiap task-nya untuk ditampilkan pada tabel.
  */

  const tableBody = document.getElementById("task-list");

  tableBody.innerHTML = "";

  tasks.forEach(function (task) {
    const row = document.createElement("tr");

    const taskCell = document.createElement("td");
    taskCell.textContent = task.text;
    const statusCell = document.createElement("td");
    statusCell.textContent = task.completed ? "Completed" : "Not Completed";
    statusCell.style.color = task.completed ? "green" : "red";

    row.appendChild(taskCell);
    row.appendChild(statusCell);

    tableBody.appendChild(row);
  });
}
