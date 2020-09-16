function get_filter(element) {
    
    let minQuantity = [0, 0, 5, 10, 15];
    let maxQuantity = [0, 5, 10, 15, 1000];

    let filter = null;
    let filterMin = null;
    let filterMax = null;

    let reqInfo = element.options[element.selectedIndex].id;

    filter = element.value;
    if (reqInfo === 'quantity') {
        filterMin = minQuantity[filter];
        filterMax = maxQuantity[filter];
    }

    let sorter = document.getElementById('sort').value;


    axios.post('http://localhost:8080/Test_Stage/Controller/get_request_board.php', {
        req_info: reqInfo,
        sorter: sorter,
        filter: filter,
        filter_min: filterMin,
        filter_max: filterMax
    })
    .then(function (response) {
        console.log(response);
    })
    .catch(function (error) {
    console.log(error);
    })
}