$(() => {

    // submit handler
    const orders = event => {
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

    // get request
    const fetchData = (url, params) => {
        $.get(url, params)
            .done(response => {
                jsonToArray(JSON.parse(response));
            })
            .fail(error => {
                console.log('Error !', error);
            });
    }

    const jsonToArray = ordersJson => {
        let ordersArr = [];
        for (let key in ordersJson) {
            ordersArr.push(Object.values(ordersJson[key]));
        }

        arrayToTable(ordersArr);
    }

    const arrayToTable = arr => {
        let number = 1; 
        $('#ordersTable tbody').empty(); // clean the past result

        // loop on the result
        arr.forEach(element => {

            // create new row
            let tr = $('<tr>');
            let th = $('<th>');
            let td0 = $('<td>');
            let td1 = $('<td>');
            let td2 = $('<td>');

            // add data to the row
            th.text(number);
            number++;
            td0.text(element[0]);
            td1.text(element[1]);
            td2.text(element[2]);

            // push the new row to   table
            tr.append(th, td0, td1, td2);
            tr.appendTo('#ordersTable tbody');
        });
    } // end of arrayToTable func

	$('#byDates').submit(orders);

});
