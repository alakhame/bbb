jQuery(document).ready(function ($) {
    $("#list").jqGrid({
        url: "example.php",
        datatype: "xml",
        mtype: "GET",
        colNames: ["numero de confer", "conference ", "chef de conference ",  "date ", "joindre"],
        colModel: [
            { name: "invid", width: 50 },
            { name: "invdate", width: 90 },
            { name: "amount", width: 80, align: "right" },
            { name: "tax", width: 80, align: "right" },
            { name: "total", width: 80, align: "right" },
            
        ],
        pager: "#pager",
        rowNum: 10,
        rowList: [10, 20, 30],
        sortname: "invid",
        sortorder: "desc",
        viewrecords: true,
        gridview: true,
        autoencode: true,
        caption: "My first grid"
    }); 
}); 