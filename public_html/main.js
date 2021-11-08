
    var url = 'http://localhost/API_TEST/public_html/api/user';

    fetch(url)
        .then(response => response.json())
        .then(data => console.log(data))
        .catch(error => console.log(error.message));