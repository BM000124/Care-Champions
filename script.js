document.getElementById("doctorSearchForm").addEventListener("submit", function(event) {
    event.preventDefault();

    let specialization = document.getElementById("specialization").value;
    let location = document.getElementById("location").value;

    // Simple AJAX call to fetch doctors
    fetch("search_doctors.php?specialization=" + specialization + "&location=" + location)
        .then(response => response.json())
        .then(data => {
            let doctorResults = document.getElementById("doctorResults");
            doctorResults.innerHTML = "";
            data.forEach(doctor => {
                doctorResults.innerHTML += <p>${doctor.name} - ${doctor.specialization}</p>;
            });
        })
        .catch(error => console.log(error));
});