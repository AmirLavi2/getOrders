$(() => {

    const orders = event => {
        // console.log('orders func');
        event.preventDefault();

        let startDate = $('#startDate').val();
        let endDate = $('#endDate').val();

        url = 'getOrders.php';
        let params = {
            startDate,
            endDate
        };

        fetchData(url, params);
    }

    const fetchData = (url, params) => {
        // console.log('fetchData func');

        $.get(url, params)
            .done(response => {
                jsonToArray(JSON.parse(response));
            })
            .fail(error => {
                console.log('Error !', error);
            });
    }

    const jsonToArray = ordersJson => {
        // console.log('jsonToArray func');

        let ordersArr = [];
        for (let key in ordersJson) {
            ordersArr.push(Object.values(ordersJson[key]));
        }

        arrayToTable(ordersArr);
    }

    
    const arrayToTable = arr => {
        // console.log('arrayToTable func');

        let number = 1; 
        arr.forEach(element => {

            // create new row
            let tr = $('<tr>');
            let td0 = $('<td>');
            let td1 = $('<td>');
            let td2 = $('<td>');
            let td3 = $('<td>');

            // add data to the row
            td0.text(number);
            number++;

            td1.text(element[0]);
            td2.text(element[1]);
            td3.text(element[2]);

            // push the new row to   table
            tr.append(td0, td1, td2, td3);
            tr.appendTo('#ordersTable tbody');
        });

    }

    $('#byDates').submit(orders);

});