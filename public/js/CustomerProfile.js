// JavaScript function to add a new row to the table
function addRow() {
     var table = document.getElementById("dataTable");
     var newRow = table.insertRow(table.rows.length);
     var cells = [];
     for (var i = 0; i < 4; i++) {
         cells.push(newRow.insertCell(i));
    }
    cells[0].innerHTML = '<input type="text" name="column1[]">';
    cells[1].innerHTML = '<input type="text" name="column2[]">';
    cells[2].innerHTML = '<input type="text" name="column3[]">';
    cells[3].innerHTML = '<input type="text" name="column4[]">';
}
