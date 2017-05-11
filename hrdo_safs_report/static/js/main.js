$(document).ready(() => {
  getCommonData();
  $("#queryOption").change(() => {
    console.log("Query Select option changed");
    getCommonData();
  });
});


function getCommonData() {
  let data = $("#queryOption").find(":selected").val();
  console.log("Value of query", data);
  $.ajax({
    url: "/query/",
    method: "GET",
    data: { "n": data },
  }).done((result) => {
    createTable(result, "tableCommon");
  }).fail((err) => {
    console.log(err);
  });
}

function createTable(data, tableId) {
  console.log("Creating Table");
  console.log(data);

  table_html = "<thead><tr>";
  for(column of data.cols) {
    table_html += "<th>" + column + "</th>";
  }
  table_html += "</tr></thead>";

  for(row of data.rows) {
    table_html += "<tbody><tr>";
    for(data of row) {
      table_html += "<td>" + data + "</td>";
    }
    table_html += "</tbody></tr>";
  }

  $("#"+tableId).html(table_html);
}
