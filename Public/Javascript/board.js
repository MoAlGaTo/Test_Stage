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
        let newList = response.data.response;
        let i = 0;
        let tbody = document.getElementById('tbody');
        tbody.innerHTML = "";
        newList.forEach(element => {
            console.log(element);

            let tr = document.createElement('tr');
            let th = document.createElement('th');
            let td1 = document.createElement('td');
            let td2 = document.createElement('td');
            let td3 = document.createElement('td');
            let td4 = document.createElement('td');
            let td5 = document.createElement('td');

            tr.setAttribute('id', element.id);
            th.setAttribute('scope', 'row');

            th.innerHTML = ++i;
            td1.innerHTML = element.cart;
            td2.innerHTML = element.zone_product;
            td3.innerHTML = element.type_product;
            td4.innerHTML = element.quantity;
            td5.innerHTML = element.sav;

            tr.appendChild(th);
            tr.appendChild(td1);
            tr.appendChild(td2);
            tr.appendChild(td3);
            tr.appendChild(td4);
            tr.appendChild(td5);

            tbody.appendChild(tr);
        });
    })
    .catch(function (error) {
    console.log(error);
    })
}