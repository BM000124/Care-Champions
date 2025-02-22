document.getElementById('searchButton').addEventListener('click', function() {
    var query = document.getElementById('searchInput').value;
    
    if (query) {
        fetchSearchResults(query);
    } else {
        alert("Please enter a search term.");
    }
});

function fetchSearchResults(query) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'search.php?query=' + encodeURIComponent(query), true);
    
    xhr.onload = function() {
        if (xhr.status === 200) {
            document.getElementById('result').style.display = 'block';
            document.getElementById('result').innerHTML = xhr.responseText;
        } else {
            alert('Error fetching data.');
        }
    };
    
    xhr.send();
}